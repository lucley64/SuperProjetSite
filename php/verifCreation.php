<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
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

if ($_POST["studyLvl"] != "none") {
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

$splash = "\",\"";
$req = "INSERT INTO Users VALUES (\"" . $username . $splash . $hashpwd . $splash . $userType . $splash . $lastName . $splash . $firstName . $splash . $workplace . $splash . $studyLvl . $splash . $phone . $splash . $mail . "\", NULL, NULL);";
$_SESSION["utilisateurDouble"] = false;
$result = mysqli_query($cnx, $req);
if (!$result) {
    erreurRequete(mysqli_errno($cnx));
}
mysqli_close($cnx);

if ($_SESSION["connected"] == true && $_SESSION["userType"] == "admin") {
   header('Location: creationAdmin.php');
} else {
    header('Location: connexion.php');
}


function erreurRequete($numeroErreur)
{
    /*cas ou l'utilisateur rentré existe déjà*/
    if ($numeroErreur == 1062) {
        $_SESSION["utilisateurDouble"] = true;
        header('Location: creation.php');
    }
    /*a faire: cas ou une valeur a trop de caractères*/
}