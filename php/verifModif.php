<?php
    session_start();
    $cnx = mysqli_connect("localhost","dkd","dkdAchilleMael0","datas");
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
        $studyLvl = $_POST["studyLvl"];
    } else {
        $studyLvl = "NULL";
    }

    if (isset($_POST["phone"])) {
        $phone = $_POST["phone"];
    } else {
        $phone = "NULL";
    }

    if (isset($_POST["mail"])) {
        $mail = $_POST["mail"];
    } else {
        $mail = "NULL";
    }

    if (isset($_POST["startDate"])) {
        $startDate = $_POST["startDate"];
    } else {
        $startDate = "NULL";
    }

    if (isset($_POST["startDate"])) {
        $endDate = $_POST["startDate"];
    } else {
        $endDate = "NULL";
    }

    $req = "UPDATE Users SET username =\"" . $username . "\", pwd = \"" . $pwd . "\", userType = \"" . $userType . "\", lastName =\"" . $lastName . "\", firstName = \"" . $firstName . "\", workplace = \"" . $workplace . "\", studyLvl = \"" . $studyLvl . "\", phone = \"" . $phone . "\", mail = \"" . $mail . "\", startDate = $staer, NULL);";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);
    header('Location: connexion.php');
?>