<?php 

session_start();

$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

$requete = "Select * from Messages";
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
    echo "<div class='messageEnvoye' id='messagenum" . $id . "'>";
    echo $cle . ": Message de " . $donnees[$cle]["expediteur"] . " adressé à ". $donnees[$cle]["destinataire"]."   Sujet:" . $donnees[$cle]["sujet"] . " Message:" . $donnees[$cle]["messages"];
    echo "</div>";
}



?>