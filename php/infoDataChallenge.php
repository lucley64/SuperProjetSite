<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/tablo.css">
    <!-- <link rel="stylesheet" href="/css/test2.css"> -->
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
                    echo "<h2> Challenge $val[challengeName] </h2>";
                    $dateDeb = date_create($val["startDate"]);
                    $dateFin = date_create($val["endDate"]);

                    echo $dateFin < date_create() ? "<h3> Data chalenge fini </h3>" : "";

                    $res3 = $connexion->query("SELECT * FROM `ProjectData` WHERE `dataChallengeId` = '$_GET[challenge]'");
                    $val3 = $res3->fetchAll();

                    echo "<h3> Projets data associés : </h3>";

                    if (isset($val3[0])) {
                        echo "<table>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Nom</th>";
                        echo "<th>Détails</th>";
                        echo "<th>Image</th>";
                        echo "<th>Date de début</th>";
                        echo "<th>Date de fin</th>";
                        echo "<th>Equipes inscrites</th>";
                        echo "<th>Ressources</th>";
                        echo "<th>Email</th>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach ($val3 as $key => $value) {
                            echo "<tr>";
                            echo "<td>$value[nom]</td>";
                            echo "<td>$value[details]</td>";
                            echo "<td><img src='$value[img]' height='500px' width='500px'></img></td>";

                            echo "<td> " . date_format($dateDeb, "d/m/Y") . "</td>";
                            echo "<td> " . date_format($dateFin, "d/m/Y") . "</td>";

                            echo "<td>";
                            echo "<ul>";

                            $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
                            if (mysqli_connect_errno()) {
                                echo mysqli_connect_error();
                            }

                            $req = "SELECT nomEquipe, id FROM Equipe WHERE dataChallenge = \"" . $val["challengeName"] . "\";";
                            $result = mysqli_query($cnx, $req) or die('Pb req: ' . $req);
                            while ($data = mysqli_fetch_row($result)) {
                            echo "<li> <a href='/php/detailsEquipe.php?id=" . $data[1] . "'>" . $data[0] . "</a> </li>";

                            }

                            mysqli_close($cnx);
                            echo "</ul>";
                            echo "</td>";

                            $res4 = $connexion->query(
                                "SELECT `Ressources`.* FROM `ProjectData` " .
                                    "JOIN `Ressources` ON `ProjectData`.`nom` = `Ressources`.`projectId` " .
                                    "WHERE `dataChallengeId` = '$_GET[challenge]' AND `nom` = '$value[nom]'"
                            );
                            $val4 = $res4->fetchAll();
                            echo "<td>";
                            echo "<ul>";
                            if (isset($val4[0])){
                                foreach ($val4 as $key2 => $value2) {
                                    echo "<li> <a href='$value2[content]'> $value2[content]</a></li>";
                                }
                            } else {
                                echo "aucune ressource";
                            }
                            echo "</ul>";
                            echo "</td>";
                            echo "<td>$value[mail]</td>";

                            echo "</tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "<p> Aucune ressource disponible </p>";
                    }


                    
                    $res2 = $connexion->query(
                        "SELECT * FROM `Equipe` JOIN `DataChallenges` ON `Equipe`.`dataChallenge` = `DataChallenges`.`challengeName` WHERE `DataChallenges`.`challengeName` = '$_GET[challenge]' ORDER BY `Equipe`.`score` DESC LIMIT 3"
                    );
                    $val2 = $res2->fetchAll();
                    echo isset($val2[0]) ? "<h3> Classement des 3 équipes avec le meilleur score: </h3>" : "";
                    echo isset($val2[0]) ? "<p> #1 : <a href=\"/php/detailsEquipe.php?id=" . $val2[0]["id"] . "\"> " . $val2[0]["nomEquipe"] . "</a></p>" : "";
                    echo isset($val2[1]) ? "<p> #2 : <a href=\"/php/detailsEquipe.php?id=" . $val2[1]["id"] . "\"> " . $val2[1]["nomEquipe"] . "</a> </p>" : "";
                    echo isset($val2[2]) ? "<p> #3 : <a href=\"/php/detailsEquipe.php?id=" . $val2[2]["id"] . "\"> " . $val2[2]["nomEquipe"] . "</a>  </p>" : "";
                
                } else {
                    echo "<h1> Erreur aucun challenge ne corespond au nom de $_GET[challenge] </h1>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>