<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$selectEquipe = $_POST["selectEquipe"];
$selectUser = $_POST["selectUser"];

$req = "INSERT INTO Participe (idEquipe,idUser) VALUES (\"" . $selectEquipe . "\",\"" . $selectUser . "\");";
$result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
mysqli_close($cnx);

header('Location: /index.php');
?>