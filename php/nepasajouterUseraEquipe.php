<?php 
session_start();

$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

/*supprimer le message*/
$req ="Delete from Messages where idMessage=".$_POST["idmessage"].";";
$mysqli->query($req);

?>