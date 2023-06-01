<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$_SESSION["hasWorked"] = "ok";

$selectEquipe = $_POST["selectEquipe"];
$selectUser = $_POST["selectUser"];

$req = "SELECT idUser FROM Participe WHERE idEquipe = " . $selectEquipe . ";";
$result=mysqli_query($cnx, $req)or die('Pb req : ' . $req);

while ($data = mysqli_fetch_row($result)) {
    if ($data[0] == $selectUser) {
        $_SESSION["hasWorked"] = "pb";
        header('Location: /php/ajoutEquipeUser.php');
    }
}

/*
$req="Select username from Users where username='".$selectUser."'";
$result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
while ($data = mysqli_fetch_row($result)) {
    $mailUser=$data[0];
}*/

if ($_SESSION["hasWorked"] == "ok") {
    $result=mysqli_query($cnx,"Select nomEquipe, dataChallenge from Equipe WHERE id = " . $selectEquipe . ";")or die('Pb req : ' . $req);
    $data = mysqli_fetch_row($result);
    $nomEquipe=$data[0];
    $_SESSION["dataChallenge"] = $data[1];


    $idmax = mysqli_query($cnx,"Select max(idMessage) from Messages;")or die('Pb req : ' . $req);
    $idmax = mysqli_fetch_assoc($idmax);
    $idmax = $idmax["max(idMessage)"] + 1;

$message="Bonjour, vous avez été invité à rejoindre l'équipe suivante:".$nomEquipe.". Souhaitez vous rejoindre l'equipe? <br> <input  onclick='ajouterUseraequipe(this)' type='button' value='Rejoindre l équipe'>";

    $req='INSERT INTO Messages Values(' . '"' . $idmax . '"' . ',' . '"' . $_SESSION["username"] . '"' . ',' . '"' . $selectUser . '"' . ',' . '"' . $message . '"' . ',' . '"' . "Invitation a une équipe" . '",' .'"'.$selectEquipe.'"'.');';
    echo $req;
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . mysqli_error($cnx));
    mysqli_close($cnx);

    header('Location: /php/ajoutEquipeUser.php');
}
?>

