<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$ressourceName = "\"" . $_POST["ressourceProject"] . "\"";

if ($_POST["fichier"] != "") {
    $fichier = "\"" . $_POST["fichier"] . "\"";
} else {
    $fichier = "NULL";
}

if ($_SESSION["temporary"] != "") {
    $dataChallengeId = "\"" . $_SESSION["temporary"] . "\"";
} else {
    $dataChallengeId = "NULL";
}

if ($_POST["projectId"] != "" || $_POST["dataChallengeId"] != "none") {
    $projectId = "\"" . $_POST["projectId"] . "\"";
} else {
    $projectId = "NULL";
}

$req = "INSERT INTO Ressources VALUES (" . $fichier . ", " . $dataChallengeId . ", " . $projectId . ");";
$result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
mysqli_close($cnx);
header('Location: ./modifDataChallenge.php');
