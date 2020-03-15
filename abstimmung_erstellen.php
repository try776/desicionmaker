<?php
sessionCheck()
?>
<?php
$_SESSION['themaid'] = $_POST['themaid'];
$_SESSION['titel'] = $_POST['titel'];
$_SESSION['beschreibung'] = $_POST['beschreibung'];

$db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
if(isset($_POST['submit'])){
        $f_themaID = trim($_POST['themaid']);
        $f_titel = trim($_POST['titel']);
        $f_beschreibung = trim($_POST['beschreibung']);
        $f_datetime = date('Y-m-d h:i:s');
        $f_userid = $_SESSION['userid'];
        $sql = $db->prepare(
            "INSERT INTO abstimmung (Thema_ID, Titel, Beschreibung, created_at, User_ID) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param('isssi',$f_themaID, $f_titel, $f_beschreibung, $f_datetime, $f_userid);
            $sql->execute();
            $db->close();
    }
header('Location: abstimmung_review');
?>