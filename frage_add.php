<?php

$_SESSION['username'] = $_POST['username'];

$_SESSION['frage'] = $_POST['frage'];


$_SESSION['produkt'] = $_POST['produkt'];


$_SESSION['email'] = $_POST['email'];


$_SESSION['username'] = $_POST['username'];

$db = new Mysqli("localhost", "tester", "welcome$20", "forms");

if(isset($_POST['submit'])){
    $data_missing = array();

    if(empty($_POST['produkt'])){
        $data_missing[] = 'produkt';

    } else {
        $f_produkt = trim($_POST['produkt']);
    }
    if(empty($_POST['frage'])){
        $data_missing[] = 'frage';

    } else {
        $f_frage = trim($_POST['frage']);
    }
    if(empty($_POST['username'])){
        $data_missing[] = 'Username';

    } else {
        $f_username = trim($_POST['username']);
    }
    if(empty($_POST['email'])){
        $data_missing[] = 'Email';

    } else {
        $f_email = trim($_POST['email']);
    }

    if(empty($data_missing)){
        $sql = $db->prepare(
            "INSERT INTO frage (produkt, frage, username, email) VALUES (?, ?, ?, ?)");
        
            $sql->bind_param('ssss', $f_produkt, $f_frage, $f_username, $f_email);
        
            $sql->execute();
    }

}

header('Location: erfolgreich');
