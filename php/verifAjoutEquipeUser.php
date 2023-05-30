<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$selectEquipe = $_POST["selectEquipe"];
$selectUser = $_POST["selectUser"];

$req="Select mail from Users where username='".$selectUser."'";
$result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
while ($data = mysqli_fetch_row($result)) {
    $mailUser=$data[0];
}


$nomEquipe=mysqli_query($cnx,"Select nomEquipe from Equipe;")or die('Pb req : ' . $req);
$nomEquipe = mysqli_fetch_assoc($nomEquipe);
$nomEquipe=$nomEquipe["nomEquipe"];

$idmax = mysqli_query($cnx,"Select max(idMessage) from Messages;")or die('Pb req : ' . $req);
$idmax = mysqli_fetch_assoc($idmax);
$idmax = $idmax["max(idMessage)"] + 1;

$message="Bonjour, vous avez été invité à rejoindre l'équipe suivante:".$nomEquipe.". Si vous voulez rejoindre cette équipe, cliquez sur le bouton suivant: <br> <input  onclick='ajouterUseraequipe(this)' type='button' value='Rejoindre l équipe'>";

$req='INSERT INTO Messages Values(' . '"' . $idmax . '"' . ',' . '"' . $_SESSION["mail"] . '"' . ',' . '"' . $mailUser . '"' . ',' . '"' . $message . '"' . ',' . '"' . "Invitation a une équipe" . '",' .'"'.$selectEquipe.'"'.');';
print_r($req);
$result = mysqli_query($cnx, $req) or die('Pb req : ' . mysqli_error($cnx));
mysqli_close($cnx);

header('Location: /index.php');
?>

