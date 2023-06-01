<?php
    session_start();
    error_reporting(E_ALL);
ini_set('display_errors', 'On');
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }

    $_SESSION["hasWorked"] = "ok";

    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $associateDataChallenge = $_POST["associateDataChallenge"];
    $questionNumber = $_POST["questionNumber"];


    if (strtotime($endDate) < strtotime($startDate)) { //} || strtotime($startDate) < time()) {
        $_SESSION["hasWorked"] = "pbTime";
        header('Location: /php/creationForm.php');
    }

    if ($questionNumber < 1) {
        $_SESSION["hasWorked"] = "pbQuestion";
        header('Location: /php/creationForm.php');
    }

    if ($_SESSION["hasWorked"] == "ok") {
        $req = "INSERT INTO Questionnaire (startDate, endDate, dataChallenge) VALUES (\"" . $startDate . "\",\"" . $endDate . "\",\"" . $associateDataChallenge . "\");";
        $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);


        $req = "SELECT id FROM Questionnaire ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
        $data = mysqli_fetch_row($result);
        $idQuestionnaire = $data[0];

        $i = 0;
        while ($i < $questionNumber) {
            $i++;
            $content = $_POST["question" . $i . ""];
            $req = "INSERT INTO Question (questionnaire,content) VALUES (\"" . $idQuestionnaire . "\",\"" . $content . "\");";
            $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
        }

        $req = "SELECT u.username FROM Users u JOIN Equipe e ON u.username = e.capitaine WHERE e.dataChallenge = \"" . $_POST["associateDataChallenge"] . "\";";
        $result2 = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
        $lien = "/php/questionnaire.php?id=" . $idQuestionnaire;
        $message = "Vous avez un nouveau formulaire à remplir,  <a href='" . $lien . "'>cliquez ici.</a>";
        $sujet = "Questionnaire du data Challenge " . $_POST["associateDataChallenge"];
        while ($result2 && $data = mysqli_fetch_row($result2)) {
            $req = "INSERT INTO Messages (expediteur, destinataire, messages, sujet) VALUES (\"" . $_SESSION["username"] . "\",\"" . $data[0] . "\",\"" . $message . "\",\"" . $sujet . "\");";
            $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
        }

        mysqli_close($cnx);

        header('Location: /php/creationForm.php');
    }
