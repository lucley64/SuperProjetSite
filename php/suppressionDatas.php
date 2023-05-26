<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginsignin.css">
    <script type="text/javascript" src="../js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Suppression data challenge & project data</title>
</head>

<body <?php
        if ($_SESSION['successDeleteDataChallenge']) {
            $_SESSION['successDeleteDataChallenge'] = false;
            echo('onload="alertSuccessDeleteDataChallenge();"');
        }
        if ($_SESSION['successDeleteProjectData']) {
            $_SESSION['successDeleteProjectData'] = false;
            echo('onload="alertSuccessDeleteProjectData();"');
        }
    ?>> 
    
    <div id="containerCreation" style="top:5;">
        <button onclick="window.location='/index.php'" class="nav">Retour</button>
        <h1>Supprimer un Data Challenge</h1>
        <form action="verifSuppressionDataChallenge.php" method="post" id="creation">

            <label for="selectDataChallenge"> Sélectionnez un Data Challenge
                <select name="selectDataChallenge" id="selectDataChallenge" required>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno($cnx)) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT challengeName FROM DataChallenges;";
                        $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
                        mysqli_close($cnx);
                        while ($data = mysqli_fetch_row($result)) {
                            echo('
                            <option value="' . $data[0] .'">' . $data[0] . '</option>
                            ');
                        }
                    ?>
                </select>
            </label>

            <input type="submit" value="Supprimer le data challenge">
        </form>

        <h1>Supprimer un Projet Data</h1>
        <form action="verifSuppressionProjectData.php" method="post" id="creation">
            <label for="selectProject"> Sélectionnez un projet
                <select name="selectProject" id="selectProject"required>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno($cnx)) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT nom FROM ProjectData;";
                        $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
                        mysqli_close($cnx);
                        while ($data = mysqli_fetch_row($result)) {
                            echo('
                            <option value="' . $data[0] .'">' . $data[0] . '</option>
                            ');
                        }
                    ?>
                </select>
            </label>
            <input type="submit" value="Supprimer le Project Data">
        </form>
    </div>

</body>
</html>