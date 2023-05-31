<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Actualités</title>
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
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');
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
            <h2 id="titre">Actualités</h2>
            <div id="actu">


                <?php
                $query = $connexion->query("SELECT * FROM `DataChallenges` WHERE `endDate` > '$today'");
                $res = $query->fetchAll();

                $encours = "";
                $bientot = "";

                foreach ($res as $key => $value) {
                    $date = date_create($value['startDate']);
                    if ($date < date_create()) {
                        $encours = $encours . "<li><a href=\"/php/infoDataChallenge.php?challenge=$value[challengeName]\">Data challenge $value[challengeName]</a></li>";
                    } else {
                        $bientot = $bientot . "<li><a href=\"/php/infoDataChallenge.php?challenge=$value[challengeName]\">Data challenge $value[challengeName], Commence le $value[startDate]</a></li>";
                    }
                }
                echo ($encours == "" && $bientot == "") ? "<p>Aucun data challenge n'est en cours ou à venir</p>" : "";
                echo $encours == "" ? "" : "<p>Data challenges en cours : </p> <ul> $encours </ul>";
                echo $bientot == "" ? "" : "<p>Data challenges à venir : </p> <ul> $bientot </ul>";



                ?>
            </div>
            <div id="finit">
                <p>Resultats des trois dernier data challenges</p>
                <ul>

                    <?php
                    $query2 = $connexion->query("SELECT * FROM `DataChallenges` WHERE `endDate` < '$today' ORDER BY `endDate` LIMIT 3");

                    $res2 = $query2->fetchAll();

                    foreach ($res2 as $key => $value) {
                        echo "<li> <a href=\"/php/infoDataChallenge.php?challenge=$value[challengeName]\">Data challenge $value[challengeName]</a> </li>";
                    }


                    ?>
                </ul>

            </div>
        </div>
    </div>
</body>

</html>