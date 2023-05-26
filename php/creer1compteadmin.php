<?php
$hashpwd = password_hash("admin", PASSWORD_DEFAULT);
$username="admin";
$splash = "\",\"";
$req = "INSERT INTO Users VALUES (\"" . 'admin' . $splash . $hashpwd . $splash . "admin" . $splash . "NULL" . $splash . "NULL" . $splash . "NULL" . $splash . "" . $splash . "NULL" . $splash . "admin@admin.admin"  . "\", NULL, NULL);";

$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}
$mysqli->query($req)or die("Erreur envoi message" . $mysqli->error);


?>