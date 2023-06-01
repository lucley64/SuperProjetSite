<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/tablo.css">
    <link rel="stylesheet" href="/css/actu.css">
    <title>Info</title>
</head>

<body>
    <?php
    session_start();
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
            <h2 id="titre"> Vos data challenges </h2>
            <div id="actu">
                <?php
                $today = date("Y-m-d");
                $connexion = new PDO("mysql:host=localhost;dbname=datas", "thatachallenge", "thatachallenge123");
                $res = $connexion->query(
                    "SELECT `DataChallenges`.* FROM `DataChallenges`
                    JOIN `Equipe` ON `Equipe`.`dataChallenge` = `DataChallenges`.`challengeName`
                    JOIN `Participe` ON `Participe`.`idEquipe` = `Equipe`.`id`
                    WHERE `Participe`.`idUser` ='$_SESSION[username]'
                    AND `endDate` > '$today'"
                );
                $encours = "";
                $bientot = "";

                foreach ($res as $key => $value) {
                    $date = date_create($value['startDate']);
                    if ($date < date_create()) {
                        $encours = $encours . "<tr onclick=\"window.location.href='/php/infoDataChallenge.php?challenge=$value[challengeName]'\"><td><a href=\"/php/infoDataChallenge.php?challenge=$value[challengeName]\">Data challenge $value[challengeName]</a></td></tr>";
                    } else {
                        $bientot = $bientot . "<tr onclick=\"window.location.href='/php/infoDataChallenge.php?challenge=$value[challengeName]'\"><td><a href=\"/php/infoDataChallenge.php?challenge=$value[challengeName]\">Data challenge $value[challengeName], Commence le $value[startDate]</a></td></tr>";
                    }
                }
                echo ($encours == "" && $bientot == "") ? "<p>Aucun data challenge n'est en cours ou à venir</p>" : "";
                echo $encours == "" ? "" : "<p>Data challenges en cours : </p> <table><tbody> $encours </tbody></table>";
                echo $bientot == "" ? "" : "<p>Data challenges à venir : </p> <table><tbody> $bientot </tbody></table>";



                ?>
            </div>
            <div id="finit">
                <p>Resultats des trois dernier data challenges</p>
                <table>
                    <tbody>

                        <?php
                        $query2 = $connexion->query(
                            "SELECT * FROM `DataChallenges`
                            JOIN `Equipe` ON `Equipe`.`dataChallenge` = `DataChallenges`.`challengeName`
                            JOIN `Participe` ON `Participe`.`idEquipe` = `Equipe`.`id`
                            WHERE `Participe`.`idUser` ='$_SESSION[username]'
                            AND `endDate` < '$today'
                            ORDER BY `endDate` LIMIT 3"
                        );

                        $res2 = $query2->fetchAll();

                        foreach ($res2 as $key => $value) {
                            echo "<tr onclick=\"window.location.href='/php/infoDataChallenge.php?challenge=$value[challengeName]'\"><td><a href=\"/php/infoDataChallenge.php?challenge=$value[challengeName]\">Data challenge $value[challengeName]</a></td></tr>";
                        }


                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>