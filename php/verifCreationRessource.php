<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$_SESSION["hasWorked"] = "okRessources";

$ressourceName = "\"" . $_POST["ressourceProject"] . "\"";

if ($_POST["fichier"] != "") {
    $fichier = "\"" . $_POST["fichier"] . "\"";
} else {
    $fichier = "NULL";
}

if ($_POST["projectId"] != "" || $_POST["dataChallengeId"] != "none") {
    $projectId = "\"" . $_POST["projectId"] . "\"";
} else {
    $projectId = "NULL";
}

$req = "INSERT INTO Ressources VALUES (" . $fichier . ", " . $projectId . ");";
$result = mysqli_query($cnx, $req);
if (!$result){
    erreurRequete(mysqli_errno($cnx));
}
mysqli_close($cnx);
header('Location: ./modifDataChallenge.php');

function erreurRequete(int $numeroErreur)
        {
            $_SESSION["hasWorked"] = "pbRessources";
            header('Location: /php/modifDataChallenge.php');
        }
?>