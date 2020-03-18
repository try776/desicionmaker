<?php
function password_check()
{
    $password_hash = hash('sha256', ($_POST['pw']));
    $username = ($_POST['username']);
    $_POST['pass'] = $password_hash;
    if (isset($_POST['submit'])) {
        $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
        $result = $db->query("SELECT * FROM user WHERE username = '$username'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['Password'] === $_POST['pass']) {
                    $_SESSION['login'] = true;
                    $_SESSION['userid'] =  $row['ID_User'];
                    echo "Login erfolgreich";
                    header('Location: userhome');
                    exit;
                } else {
                    $db->close();
                    echo "passwort nicht korrekt";
                    header('Location: login');
                    exit;
                }
            }
        } else {
            $db->close();
            echo "passwort nicht korrekt";
            header('Location: login');
            exit;
        }
    } else {
        $db->close();
        echo "Login fehlgeschlagen";
        header('Location: login');
        exit;
    }
    $db->close();
}
?>
<?php
password_check();
?>