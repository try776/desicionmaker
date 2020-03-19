<?php
function get_topics()
{
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT id_thema, titel from thema";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option " . "value='" . $row['id_thema'] . "'>" . $row['titel'] . "</option>";
        }
	}
	$db->close();
}

function feedCardLister()
{
    require 'feed_w_cards.php';
}

function write_account()
{
    if (isset($_POST['submit'])) {
        $f_username = ($_POST['username']);
        $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
        $query = "Select count(*) AS anzahl from user where Username = '$f_username'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        $anzahl = $row['anzahl'];
        if ($anzahl > 0) {
            echo 'Der Benutzername existiert Bereits';
        } else {
            $f_pw = hash('sha256', ($_POST['pw']));
            $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
            $sql = $db->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
            $sql->bind_param('ss', $f_username, $f_pw);
            $sql->execute();
            $db->close();
            header('Location: userhome');
            } 
        }
}

function get_percentage($idabst)
{
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT COUNT(*) AS anzahl FROM abstimmung_user where Abstimmung_ID = '$idabst'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $anzahl = $row['anzahl'];
    return $anzahl;
    $db->close();
}

function get_number_vote_user()
{
    $userid = $_SESSION['userid'];
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT COUNT(*) AS anzahl FROM abstimmung_user where User_ID = '$userid'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $anzahl = $row['anzahl'];
    echo $anzahl;
    $db->close();
}

function get_number_vote_user_pro()
{
    $userid = $_SESSION['userid'];
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT COUNT(*) AS anzahl FROM abstimmung_user where User_ID = '$userid' and Bewertung = 1";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $anzahl = $row['anzahl'];
    echo $anzahl;
    $db->close();
}
function get_number_vote_user_con()
{
    $userid = $_SESSION['userid'];
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT COUNT(*) AS anzahl FROM abstimmung_user where User_ID = '$userid' and Bewertung = 0";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $anzahl = $row['anzahl'];
    echo $anzahl;
    $db->close();
}
function get_number_comment_user()
{
    $userid = $_SESSION['userid'];
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT COUNT(*) AS anzahl FROM kommentar where User_ID = $userid";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $anzahl = $row['anzahl'];
    echo $anzahl;
    $db->close();
}

function selectData()
{
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT id_thema, titel from thema";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "<option " . "value='" . $row['id_thema'] . "'>" . $row['titel'] . "</option>";
        }
    }
}


function sessionCheck()
{
    $inactive = 10;
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
        session_destroy();
        header("Location: login");
    }
    $_SESSION['timeout'] = time();
    if (!isset($_SESSION['login'])) {
        header("Location: login");
        exit;
    }
}

function voteCounter()
{
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT COUNT(*) FROM user";
    $result = $db->query($sql);
    return ($result->num_rows);
    $db->close();
}


function write_vote()
{
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    if (isset($_POST['submit'])) {
        $v_idabstimmung = $_POST['idabstimmung'];
        $v_userid = ($_SESSION['userid']);
        $v_vote = ($_POST['submit']);
        //$v_placholder = 3;
        $sql = $db->prepare("INSERT INTO abstimmung_user ( Abstimmung_ID, User_ID, Bewertung) VALUES (?, ?, ?)");
        $sql->bind_param('iii', $v_idabstimmung, $v_userid, $v_vote);
        $sql->execute();
        $db->close();
        header('Location: userhome');
    }
    else{
    header('Location: impressum');}
}

function loginCheck(){

    if (!isset( $_SESSION['login'])){
        echo ("<li><a href=\"login\">Login</a></li>");
    } else {
        echo ("<li><a href=\"session_destroy\">Logout</a></li>");
    }
}

function showComment($abstimmmungid)
{
    $db = new mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT comment from kommentar where Abstimmung_ID = '$abstimmmungid'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $comment = $row['comment'];
            return "<p>$comment</p> <br>";
        }
    }
}
function changePassword()
{
    if (isset($_POST['submit'])) {
            $p_userid = ($_SESSION['userid']);
            $p_pw = hash('sha256', ($_POST['pw']));
            $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
            $sql = $db->prepare("Update user set password='$p_pw' where unsername='$p_userid'");
            $sql->bind_param('ss', $f_username, $f_pw);
            $sql->execute();
            $db->close();
            header('Location: userhome');
            } 
        }

?>
;