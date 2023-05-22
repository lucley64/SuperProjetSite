<?php
/*ce script est à executer une fois avec sudo pour creer un utilisateur thatachallenge avec tous les droits*/
$mysqli = new mysqli("localhost", "root", "");
if ($mysqli->connect_error) {
    die("La connexion a échoué : " . $mysqli->connect_error);
}

$requete="Create user 'thatachallenge'@'localhost' identified by 'thatachallenge123'; ";

$mysqli->query("SET GLOBAL validate_password.policy = 0;");

$resultat=$mysqli->query($requete);

if (!$resultat) {
    echo "Erreur d'exécution lors de la creation de l'utilisateur: " . $mysqli->error;
}
$resultat=$mysqli->query("GRANT ALL PRIVILEGES ON *.* TO 'thatachallenge'@'localhost';");

if (!$resultat) {
    echo "Erreur l'utilisateur crée n'a pas eu tout les droits" . $mysqli->error;
}
?>