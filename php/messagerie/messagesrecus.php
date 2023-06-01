<?php
session_start();

$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

$requete = "Select * from Messages where destinataire='" . $_SESSION["username"] . "' ORDER BY idMessage DESC;";
$res = $mysqli->query($requete);
/*on stoque dans le tableau donnees les resultat de la requete*/
if ($res) {
    $donnees = array();

    while ($colonne = $res->fetch_assoc()) {
        $donnees[] = $colonne;
    }
}
foreach ($donnees as $cle => $val) {
    $id = $donnees[$cle]['idMessage'];
    echo "<span class=expediteur>Message de " . $donnees[$cle]["expediteur"] ."</span> <div class='messageRecu' id='message" . $id . "'>";
    echo "Sujet:<span class=sujet>" . $donnees[$cle]["sujet"] . "</span> <br>Message:<br><span class=Message>" . $donnees[$cle]["messages"]."</span>";
    echo "</div>";
}
