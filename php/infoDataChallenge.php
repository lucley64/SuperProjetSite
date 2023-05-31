<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Info</title>
</head>

<body>
    <?php
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
            <?php
            if (isset($_GET["challenge"])) {
                $connexion = new PDO("mysql:host=localhost;dbname=datas", "thatachallenge", "thatachallenge123");
                $res = $connexion->query("SELECT * FROM `DataChallenges` WHERE `challengeName` = '$_GET[challenge]'");
                $val = $res->fetch();
                if ($val) {
                    echo "<h1> Détails du challenge $val[challengeName] </h1>";
                    $dateDeb = date_create($val["startDate"]);
                    $dateFin = date_create($val["endDate"]);

                    echo $dateFin < date_create() ? "<h3> Data chalenge finit </h3>" : "";

                    echo "<p> Commence le " . date_format($dateDeb, "d/m/Y") . "</p>";
                    echo "<p> Prend fin le " . date_format($dateFin, "d/m/Y") . "</p>";

                    if ($dateFin < date_create()) {
                        $res2 = $connexion->query(
                            "SELECT * FROM `Equipe` JOIN `DataChallenges` ON `Equipe`.`dataChallenge` = `DataChallenges`.`challengeName` WHERE `DataChallenges`.`challengeName` = '$_GET[challenge]' ORDER BY `Equipe`.`score` DESC LIMIT 3");
                        $val2 = $res2->fetchAll();
                        echo "<h3> Top 3 : </h3>";
                        echo "<p> #1 : <a href=\"/php/detailEquipe.php?id=" . $val2[0]["id"] . "\"> " . $val2[0]["nomEquipe"] . "</a></p>";
                        echo "<p> #2 : <a href=\"/php/detailEquipe.php?id=" . $val2[1]["id"] . "\"> " . $val2[1]["nomEquipe"] . "</a> </p>";
                        echo "<p> #3 : <a href=\"/php/detailEquipe.php?id=" . $val2[2]["id"] . "\"> " . $val2[2]["nomEquipe"] . "</a>  </p>";
                    }
                } else {
                    echo "<h1> Erreur aucun challenge ne corespond au nom de $_GET[challenge] </h1>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>