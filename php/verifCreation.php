<?php
    session_start();
    $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $hashpwd=password_hash($pwd,PASSWORD_DEFAULT);
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

    if ($_POST["studyLvl"]!="none") { 
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
    /*cas ou la personne n'a pas rentré de niveau d'études*/
    if ($studyLvl=="NULL"){
        $_SESSION["ErreurCreation"]=true;
        header('Location: creation.php');
    }else{
        $_SESSION["ErreurCreation"]=false;
        $req = "INSERT INTO Users VALUES (\"" . $username . "\",\"" . $hashpwd . "\",\"" . $userType . "\",\"" . $lastName . "\",\"" . $firstName . "\",\"" . $workplace . "\",\"" . $studyLvl . "\",\"" . $phone . "\",\"" . $mail . "\", NULL, NULL);";
        $_SESSION["utilisateurDouble"]=false;
        $result = mysqli_query($cnx,$req) or ErreurRequete(mysqli_errno($cnx));
        $data = mysqli_fetch_row($result);
        mysqli_close($cnx);
        header('Location: connexion.php');

    }

    function ErreurRequete($numeroErreur){
        /*cas ou l'utilisateur rentré existe déjà*/
        if($numeroErreur==1062){
            $_SESSION["utilisateurDouble"]=true;
            header('Location: creation.php');
        }
        /*a faire: cas ou une valeur a trop de caractères*/

    }
    
?>