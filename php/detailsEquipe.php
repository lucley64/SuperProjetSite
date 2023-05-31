<!DOCTYPE html>
<html lang="en">
<?php
    $idEquipe = $_GET["id"];
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }
    
    $req = "SELECT e.nomEquipe, e.dataChallenge, e.capitaine, e.githubLink, e.score FROM Equipe e WHERE e.id = " . $idEquipe . ";";
    $result = mysqli_query($cnx, $req) or die('Pb req: ' . $req);
    $donneesEquipe = mysqli_fetch_row($result);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Détails équipe</title>
    <style>
        div#principal {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: max-content;
        }

        div#actu {
            grid-column: 1;
        }

        div#finit {
            grid-column: 2;
        }

        h2#titre {
            grid-row: 1;
            grid-column: 1/3;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $connexion = new PDO("mysql:host=localhost;dbname=datas", "thatachallenge", "thatachallenge123");
    $today = date("Y-m-d");
    ?>
    <img class="background" src="/src/pyrenees.jpg" alt="pyr">
    <div id="sidebarr">
        <?php
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
            <h2 id="titre"><?php echo("L'Equipe " . $donneesEquipe[0]) ?></h2>
            <div id="actu">

                <?php
                    $req = "SELECT u.username FROM Participe p JOIN Users u ON u.username = p.idUser WHERE p.idEquipe = " . $idEquipe . ";";
                    $result = mysqli_query($cnx, $req) or die('Pb req: ' . $req);

                    echo('<h3>Liste des membres :</h3>');
                    echo('<ul>');

                    while ($data = mysqli_fetch_row($result)) {
                        if ($_SESSION["username"] == $donneesEquipe[2]) {
                            if ($data[0] == $donneesEquipe[2]) {
                                echo("<li><p>" . $data[0] . "⭐<a title='Supprimer cette équipe' href='/php/verifSupprimerEquipe.php?user=" . $data[0] . "&equipe=" . $idEquipe . "'><button style=\"font-size: 30px\">❌</button></a> </p></li>");
                            } else {
                                echo("<li><p>" . $data[0] . "<a title='Retirer cet utilisateur' href='/php/verifSupprimerEquipe.php?user=" . $data[0] . "&equipe=" . $idEquipe . "'><button style=\"font-size: 30px\">👋</button></a> </p></li>");
                            }
                        } else {
                            if ($data[0] == $donneesEquipe[2]) {
                                echo("<li><p>" . $data[0] . "⭐</p></li>");
                            } else if ($data[0] != $_SESSION["username"]){
                                echo("<li><p>" . $data[0] . "</p></li>");
                            } else {
                                echo("<li><p>" . $data[0] . "<a title='Quitter cette équipe' href='/php/verifSupprimerEquipe.php?user=" . $data[0] . "&equipe=" . $idEquipe . "'><button style=\"font-size: 30px\">🚪</button></a> </p></li>");
                            }
                        }
                    }
                    echo('</ul>');
                    mysqli_close($cnx);
                ?>
            </div>
            <div id="finit">
                <h3>Data challenge auquel l'équipe est inscrite :</h3>
                <ul>
                    <?php
                    echo("<a href='/php/infoDataChallenge.php?challenge=" . $donneesEquipe[1] . "'>" . $donneesEquipe[1] . "</a>"); 
                    ?>
                </ul>

                <h3>Score actuel : <?php echo($donneesEquipe[4]) ?></h3>
            </div>
        </div>
    </div>
</body>

</html>