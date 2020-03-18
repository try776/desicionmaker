<?php
sessionCheck()
?>
<?php

$db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
if(isset($_POST['submit'])){
        $f_abstimmungID = trim($_POST['idabstimmung']);
        $f_comment = trim($_POST['comment']);
        $f_datetime = date('Y-m-d h:i:s');
        $f_userid = $_SESSION['userid'];
        $sql = $db->prepare(
            "INSERT INTO kommentar (Abstimmung_ID, User_ID, created_at, comment) VALUES (?, ?, ?, ?)");
            $sql->bind_param('iiss',$f_abstimmungID, $f_userid, $f_datetime, $f_comment,);
            $sql->execute();
            $db->close();
            header('Location: userhome');
            exit;
    }
?>