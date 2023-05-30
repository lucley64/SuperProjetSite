<?php 
session_start();

$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

$req="Select idEquipeARejoindre from Messages where idMessage="."'".$_POST["idmessage"]."';";

$idEquipe=$mysqli->query($req);
//print_r($_POST["idmessage"]);
$idEquipe=$idEquipe->fetch_assoc();
$idEquipe=$idEquipe["idEquipeARejoindre"];
var_dump($_SESSION["username"]);
$req = "INSERT INTO Participe (idEquipe,idUser) VALUES (\"" . $idEquipe . "\",\"" . $_SESSION["username"] . "\");";
