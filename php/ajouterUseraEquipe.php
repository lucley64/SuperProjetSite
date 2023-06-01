<?php 
session_start();

$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

$req="Select idEquipeARejoindre from Messages where idMessage="."'".$_POST["idmessage"]."';";

$idEquipe=$mysqli->query($req);
$idEquipe=$idEquipe->fetch_assoc();
$idEquipe=$idEquipe["idEquipeARejoindre"];
var_dump($_SESSION["username"]);
$req = "INSERT INTO Participe (idEquipe,idUser) VALUES (\"" . $idEquipe . "\",\"" . $_SESSION["username"] . "\");";
$mysqli->query($req) or erreurRequete($mysqli->errno);
/*supprimer le message*/
$req ="Delete from Messages where idMessage=".$_POST["idmessage"].";";
$mysqli->query($req);

function erreurRequete($num){
    switch ($num) {
        case 1062:
            echo "vous etes déjà dans l'equipe";
            break;       
        default:
            echo "erreur inconnue";
            break;
    }
}

?>