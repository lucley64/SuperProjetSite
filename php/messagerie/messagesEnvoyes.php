<?php
session_start();

$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

$requete = "Select * from Messages where expediteur='" . $_SESSION["username"] . "' ORDER BY idMessage DESC;";
$res = $mysqli->query($requete);
/*on stoque dans le tableau donnees les resultat de la requete*/
if ($res == true) {
    $donnees = array();

    while ($colonne = $res->fetch_assoc()) {
        $donnees[] = $colonne;
    }
}
foreach ($donnees as $cle => $val) {
    $id = $donnees[$cle]['idMessage'];
    echo "<span class=destinataire>Message envoyé à " . $donnees[$cle]["destinataire"] . " </span>  <div class='messageEnvoye' id='messageEnvoye" . $id . "'>";
    echo "Sujet:<span class=sujet>" . $donnees[$cle]["sujet"] . "</span> <br>Message:<br><span class=Message>" . $donnees[$cle]["messages"]."</span>";
    echo "</div>";
}
