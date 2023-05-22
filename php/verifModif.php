<?php
    session_start();
    $cnx = mysqli_connect("localhost","dkd","dkdAchilleMael0","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };
    
    $username = "\"" . $_SESSION["username"] . "\"";
    $pwd = "\"" . $_POST["pwd"] . "\"";
    if ($_POST["userType"] != "") {
        $userType = "\"" . $_POST["userType"] . "\"";
    } else {
        $userType = "\"student\"";
    }

    if ($_POST["lastName"] != "") {
        $lastName = "\"" . $_POST["lastName"] . "\"";
    } else {
        $lastName = "NULL";
    }

    if ($_POST["firstName"] != "") {
        $firstName = "\"" . $_POST["firstName"] . "\"";
    } else {
        $firstName = "NULL";
    }

    if ($_POST["workplace"] != "") {
        $workplace = "\"" . $_POST["workplace"] . "\"";
    } else {
        $workplace = "NULL";
    }

    if ($_POST["studyLvl"] != "none") {
        $studyLvl = "\"" . $_POST["studyLvl"] . "\"";
    } else {
        $studyLvl = "NULL";
    }

    if ($_POST["phone"] != "") {
        $phone = "\"" . $_POST["phone"] . "\"";
    } else {
        $phone = "NULL";
    }

    if ($_POST["mail"] != "") {
        $mail = "\"" . $_POST["mail"] . "\"";
    } else {
        $mail = "NULL";
    }

    if ($_POST["startDate"] != "") {
        $startDate = "\"" . $_POST["startDate"] . "\"";
    } else {
        $startDate = "NULL";
    }

    if ($_POST["endDate"] != "") {
        $endDate = "\"" . $_POST["endDate"] . "\"";
    } else {
        $endDate = "NULL";
    }

    $req = "UPDATE Users SET pwd = " . $pwd . ", userType = " . $userType . ", lastName =" . $lastName . ", firstName = " . $firstName . ", workplace = " . $workplace . ", studyLvl = " . $studyLvl . ", phone = " . $phone . ", mail = " . $mail . ", startDate = " . $startDate . ", endDate = " . $endDate . " WHERE username =" . $username . ";";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);
    header('Location: connexion.php');
?>