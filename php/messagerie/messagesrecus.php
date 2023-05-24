<?php
session_start();

$mysqli=new mysqli("localhost","thatachallenge","thatachallenge123","datas");

if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

$requete="Select * from Messages where destinataire='" .$_SESSION["username"]."'";
$res=$mysqli->query($requete);
/*on stoque dans le tableau donnees les resultat de la requete*/
if($res==true){
    $donnees=array();

    while($colonne=$res->fetch_assoc()){
        $donnees[]=$colonne;
    }
    //print_r($donnees);
}
foreach ($donnees as $cle=>$val){
    $id=$donnees[$cle]['idMessage'];
    echo "<div class='messageRecu' id='message".$id."'>";
    echo $cle.": Message de ".$donnees[$cle]["expediteur"]."   Sujet:".$donnees[$cle]["sujet"]. " Message:".$donnees[$cle]["messages"];
    echo "</div>";
}
?>

