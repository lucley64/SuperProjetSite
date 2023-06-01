<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/mesEquipes.css">
    <title>Etudiant</title>
</head>

<body>
    <img class="background" src="/src/pyrenees.jpg" alt="pyr">
    <div id="sidebarr">
        <?php
        session_start();
        if ($_SESSION["userType"] != "student") {
            header('Location: /index.php');
        }
        include "sidebar.php";
        ?>
    </div>
    <div id="head">
        <?php
        include "header.php";
        ?>

    </div>
    <div id="contenupage">
        <div id="principal" class="principal">
            <div id=Equipes>
                <h1 id="mesEquipes">Mes équipes</h1>
                <?php
                $req="Select nomEquipe from Equipe where id=ANY(Select idEquipe from Participe where idUser='".$_SESSION["username"]."');";
                $mysqli = new mysqli("localhost", "thatachallenge", "thatachallenge123", "datas");
                if ($mysqli->connect_error) {
                    die("La connexion a échoué: " . $mysqli->connect_error);
                }
                $res=$mysqli->query($req) or die("erreur: ".$mysqli->error);
                $donnees=array();
                while ($colonne = $res->fetch_assoc()) {
                    $donnees[] = $colonne;
                }
                if(empty($donnees)){
                    echo "Vous n'etes pas encore inscrit dans une équipe :(";
                }else{

                
                    for ($i=0; $i < count($donnees); $i++) { 
                        foreach ($donnees[$i] as $cle => $val) {                      
                            echo "<div id=".$val."\"' class=nomequipe>".$val."</div> <br> 
                            <div class='membres'>Autres membres de l'équipe: ";
                            $req='Select idUser from Participe where idEquipe=any(Select id from Equipe where nomEquipe="'.$val.'");';
                            
                            $res=$mysqli->query($req) or die("erreurfct: ".$mysqli->error);
                            $donnees2=array();
                            while ($colonne = $res->fetch_assoc()) {
                                $donnees2[] = $colonne;
                            }
                            foreach($donnees2 as $elt){
                                echo "<b>".$elt["idUser"]."</b> ";
                            }
                            echo "</div>";
                            
                            echo "<div class='datachallenges'> DataChallenge de l'equipe: ";
                            $req="Select dataChallenge from Equipe where nomEquipe='".$val."';";
                            $res=$mysqli->query($req) or die("erreurfct: ".$mysqli->error);
                            while ($colonne= $res->fetch_assoc()) {
                                foreach($colonne as $elt){
                                    echo "<b>".$elt."</b> ";
                                }
                            }
                            
                            echo "</div>";


                        }
                        
                    }
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>