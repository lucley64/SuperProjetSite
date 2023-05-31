<?php 

session_start();
$mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

$requete = "SELECT m.idMessage, m.expediteur, m.destinataire, m.messages, m.sujet FROM Messages m JOIN Users u1 ON m.expediteur = u1.username JOIN Users u2 ON m.destinataire = u2.username JOIN Participe p1 ON u1.username = p1.idUser JOIN Participe p2 ON u2.username = p2.idUser JOIN Equipe e ON p1.idEquipe = e.id JOIN DataChallenges dc ON e.dataChallenge = dc.challengeName WHERE p1.idEquipe = p2.idEquipe AND dc.gestionnaire='".$_SESSION["username"]."';";
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
    echo $donnees[$cle]["idMessage"] . ": Message de " . $donnees[$cle]["expediteur"] . " adressé à ". $donnees[$cle]["destinataire"]."   Sujet:" . $donnees[$cle]["sujet"] . " Message:" . $donnees[$cle]["messages"];
    echo "</div>";
}



?>