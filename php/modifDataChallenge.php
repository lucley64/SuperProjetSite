<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/test.css">
    <script type="text/javascript" src="../js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modification de Data Challenge</title>
</head>

<body <?php
        session_start();
        if ($_SESSION['hasWorked'] == "okChallenge") {
            echo 'onload="alertValidModifChallenge();"';
        } else if ($_SESSION['hasWorked'] == "pbTime") {
            echo 'onload="alertErrorTime();"';
        } else if ($_SESSION['hasWorked'] == "pbName") {
            echo 'onload="alertErrorName();"';
        } else if ($_SESSION['hasWorked'] == "okProjectCreate") {
            echo 'onload="alertValidCreateProject();"';
        } else if ($_SESSION['hasWorked'] == "okProjectModif") {
            echo 'onload="alertValidModifProject();"';
        } else if ($_SESSION['hasWorked'] == "okRessources") {
            echo 'onload="alertValidAddRessources();"';
        } else if ($_SESSION['hasWorked'] == "pbRessources") {
            echo 'onload="alertErrorAddRessources();"';
        } 
        $_SESSION['hasWorked'] = "nothing";
        ?>>

    <img class="background" src="../src/pyrenees.jpg" alt="pyrenees">
    <div id="sidebar">
        <?php
        include "sidebar.php";
        ?>
    </div>
    <div id="head">
        <?php
        include "header.php";
        ?>
    </div>

    <div id="container" style="top:5;">
        <h1>Modifier le Data Challenge</h1>
        <form action="verifModifDataChallenge.php" method="post" id="creation">

            <label for="selectDataChallenge"> Sélectionnez un Data Challenge
                <select name="selectDataChallenge" id="selectDataChallenge" required>
                    <?php
                    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
                    if (mysqli_connect_errno()) {
                        echo mysqli_connect_error();
                    };
                    $req = "SELECT challengeName FROM DataChallenges;";
                    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
                    mysqli_close($cnx);
                    while ($data = mysqli_fetch_row($result)) {
                        echo ('
                            <option value="' . $data[0] . '">' . $data[0] . '</option>
                            ');
                    }
                    ?>
                </select>
            </label>

            <label for="newChallengeName"> Nouveau nom du data challenge
                <input type="text" name="newChallengeName" id="newChallengeName" placeholder="Entrez le nouveau nom du data Challenge à modifier">
            </label>

            <label for="startDate"> Start Date
                <input type="date" name="startDate" id="startDate" placeholder="Entrez la date de départ">
            </label>

            <label for="endDate"> End Date
                <input type="date" name="endDate" id="endDate" placeholder="Entrez la date de fin">
            </label>

            <input type="submit" value="Mettre à jour le data challenge">
        </form>

        <h1>Modifier/Creer Projet Data</h1>
        <form action="verifModifProjectData.php" method="post" id="creation">
            <label for="associateDataChallenge"> Sélectionnez le data challenge associé
                <select name="associateDataChallenge" id="associateDataChallenge" required>
                    <?php
                    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
                    if (mysqli_connect_errno()) {
                        echo mysqli_connect_error();
                    };
                    $req = "SELECT challengeName FROM DataChallenges;";
                    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
                    mysqli_close($cnx);
                    while ($data = mysqli_fetch_row($result)) {
                        echo ('
                            <option value="' . $data[0] . '">' . $data[0] . '</option>
                            ');
                    }
                    ?>
                </select>
            </label>
            <label for="selectProject"> Sélectionnez un projet
                <select name="selectProject" id="selectProject" required>
                    <option value="creation">Créer un nouveau projet</option>
                    <?php
                    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
                    if (mysqli_connect_errno()) {
                        echo mysqli_connect_error();
                    }
                    $req = "SELECT nom, dataChallengeId FROM ProjectData;";
                    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
                    mysqli_close($cnx);
                    while ($data = mysqli_fetch_row($result)) {
                        echo '
                            <option value="' . $data[0] . '">' . $data[0] . ' - ' . $data[1] . '</option>
                            ';
                    }
                    ?>
                </select>
            </label>
            <label for="projectName"> Nom du projet
                <input type="text" name="projectName" id="projectName" placeholder="Entrez le nom du projet Data">
            </label>

            <label for="details"> Détails
                <input type="text" name="details" id="details" placeholder="Entrez une brève description du projet">
            </label>

            <label for="img"> Image
                <input type="text" name="img" id="img" placeholder="Sélectionnez un image">
            </label>

            <label for="phone"> Téléphone
                <input type="text" multiple name="phone" id="phone" placeholder="Entrez le numero de telephone du porteur de projet">
            </label>

            <label for="mail"> Mail
                <input type="email" name="mail" id="mail" placeholder="Entrez le mail du porteur de projet">
            </label>

            <input type="submit" value="Valider">
        </form>

        <h1>Ajouter des ressources</h1>
        <form action="verifCreationRessource.php" method="post" id="creation">

            <label for="projectId"> Sélectionnez un projet
                <select name="projectId" id="projectId">
                    <?php
                    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
                    if (mysqli_connect_errno()) {
                        echo mysqli_connect_error();
                    }
                    $req = "SELECT nom FROM ProjectData;";
                    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
                    mysqli_close($cnx);
                    while ($data = mysqli_fetch_row($result)) {
                        echo '
                            <option value="' . $data[0] . '">' . $data[0] . '</option>
                            ';
                    }
                    ?>
                </select>
            </label>

            <label for="fichier"> Ressource
                <input type="text" name="fichier" id="fichier" placeholder="Rentrez le lien d'un fichier">
            </label>

            <input type="submit" value="Ajouter la ressource">
        </form>
    </div>

    <?php
    $_SESSION['temporary'] = NULL;
    ?>
</body>

</html>