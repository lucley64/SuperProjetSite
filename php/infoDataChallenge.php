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
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
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

                    echo "<p> Commence le " . date_format($dateDeb, "d/m/Y") . "</p>";
                    echo "<p> Prend fin le " . date_format($dateFin, "d/m/Y") . "</p>";
                } else {
                    echo "<h1> Erreur aucun challenge ne corespond au nom de $_GET[challenge] </h1>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>