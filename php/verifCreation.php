<?php
    session_start();
    $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    if (isset($_POST["userType"])) {
        $userType = $_POST["userType"];
    } else {
        $userType = "student";
    }

    if (isset($_POST["lastName"])) {
        $lastName = $_POST["lastName"];
    } else {
        $lastName = "NULL";
    }

    if (isset($_POST["firstName"])) {
        $firstName = $_POST["firstName"];
    } else {
        $firstName = "NULL";
    }

    if (isset($_POST["workplace"])) {
        $workplace = $_POST["workplace"];
    } else {
        $workplace = "NULL";
    }

    if (isset($_POST["studyLvl"])) {
        $userType = $_POST["studyLvl"];
    } else {
        $userType = "NULL";
    }

    if (isset($_POST["phone"])) {
        $userType = $_POST["phone"];
    } else {
        $userType = "NULL";
    }

    if (isset($_POST["mail"])) {
        $userType = $_POST["mail"];
    } else {
        $userType = "NULL";
    }

    $req = "INSERT INTO Users VALUES (\"" . $username . "\",\"" . $pwd . "\",\"" . $userType . "\",\"" . $lastName . "\",\"" . $firstName . "\",\"" . $workplace . "\",\"" . $studyLvl . "\",\"" . $phone . "\",\"" . $mail . "\", NULL, NULL);";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.mysqli_error($cnx));
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);
    header('Location: connexion.php');
?>