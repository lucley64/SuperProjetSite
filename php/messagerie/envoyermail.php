<?php session_start();

print_r($_POST);
print_r($_SESSION);

$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}
$destinataire = $_POST["destinataire"];
$emmeteur = $_SESSION["mail"];
$sujet = $_POST["sujet"];
$message = $_POST["message"];


$idmax = $mysqli->query("Select max(idMessage) from Messages;");
$idmax = $idmax->fetch_assoc();
$idmax = $idmax["max(idMessage)"] + 1;


$requete = 'INSERT INTO Messages Values(' . '"' . $idmax . '"' . ',' . '"' . $emmeteur . '"' . ',' . '"' . $destinataire . '"' . ',' . '"' . $message . '"' . ',' . '"' . $sujet . '"' . ');';



echo $requete;
$messageenvoye = $mysqli->query($requete) or die("Erreur envoi message" . $mysqli->error);

header("Location:../messagerie.php");
