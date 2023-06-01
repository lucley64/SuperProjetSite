<!DOCTYPE html>
<?php
    session_start();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <script type="text/javascript" src="../js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>That'a Challenge</title>
</head>

<body <?php
        if ($_SESSION['hasWorked'] == "okReponse") {
            echo 'onload="alertValidAnswer();"';
        } else if ($_SESSION["hasWorked"] == "pbDroits"){
            echo 'onload="alertErrorRights();"';
        } else if ($_SESSION['hasWorked'] == "pbOutOfTime"){
            echo('onload="alertOutOfTime();"');
        } else if ($_SESSION["hasWorked"] == "pbAnswered") {
            echo('onload="alertAlreadyAnswered();"');
        } else if ($_SESSION["hasWorked"] == "okDelete") {
            echo('onload="alertValidTeamDelete();"');
        }
        $_SESSION['hasWorked'] = "nothing";
        ?>>
    <img class="background" src="/src/pyrenees.jpg" alt="pyr">
    <div id="sidebarr">
        <?php
        include "php/sidebar.php";
        ?>
    </div>
    <div id="head">
        <?php
        include "php/header.php";
        ?>

    </div>

    <div id="contenupage">


        <div id="principal" class="principal">
            <h2>Participez à des challenges avec l'association IA Pau</h2>

            <p>L'association IA Pau propose de nombreux data challenges et data battles, inscrivez vous sur "That'a challenge" pour pouvoir gérer tous vos projets et en découvrir d'autres. Avec des prix allant jusqu'a 3 000€!</p>
            <img src="/src/imageAccueil.jpeg" alt="image accueil">
        </div>

    </div>
</body>

</html>