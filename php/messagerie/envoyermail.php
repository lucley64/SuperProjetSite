<?php session_start();


$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}
$destinataire = $_POST["destinataire"];
$emmeteur = $_SESSION["username"];
$sujet = $_POST["sujet"];
$message = $_POST["message"];


$idmax = $mysqli->query("Select max(idMessage) from Messages;");
$idmax = $idmax->fetch_assoc();
$idmax = $idmax["max(idMessage)"] + 1;


$requete = 'INSERT INTO Messages (idmessage, expediteur,destinataire,messages,sujet) Values(' . '"' . $idmax . '"' . ',' . '"' . $emmeteur . '"' . ',' . '"' . $destinataire . '"' . ',' . '"' . $message . '"' . ',' . '"' . $sujet . '"' . ');';



//echo $requete;
$messageenvoye = $mysqli->query($requete) or die(erreurEnvoiMessage($mysqli->errno,$mysqli->error));

header("Location:../messagerie.php");

function erreurEnvoiMessage($num,$erreur){
    switch ($num) {
        case 1452:
            # cas ou l'utilisateur rentré n'existe pas
            echo "Le destinataire rentré n'existe pas, veuillez un rentrer un destinataire valide";
            echo "<br> <a href='/php/messagerie.php'>Revenir a la messagerie</a>";
            break;
        
        default:
            # autre erreur
            echo "erreur inconnue: ".$erreur;
            break;
    }
    
}
