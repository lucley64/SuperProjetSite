<?php
    session_start();
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }
    $idQuestionnaire = $_GET["id"];
    $nbReponse = $_POST["nbReponse"];
    $req = "SELECT e.id FROM Equipe e JOIN Questionnaire q ON e.dataChallenge = q.dataChallenge WHERE e.capitaine = \"" . $_SESSION["username"] . "\";";
    $result = mysqli_query($cnx, $req);
    $data = mysqli_fetch_row($result);

    for ($i=0; $i < $nbReponse; $i++) {
        $req = "INSERT INTO Reponse (content, question, idEquipe) VALUES (\"" . $_POST["question" . $i] . "\",\"" .  $_POST["questionId" . $i] . "\",\"" .  $data[0] . "\");";
        $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    }

    $req = "SELECT dataChallenge FROM Questionnaire WHERE id = " . $idQuestionnaire . ";";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    $dataChallenge = mysqli_fetch_row($result);

    $lien = "/php/correctionQuestionnaire.php?idQuestionnaire=" . $idQuestionnaire . "&idEquipe=" . $data[0];
    $message = "Vous avez recu une reponse de formulaire,  <a href='" . $lien . "'>cliquez ici</a> pour la noter";
    $sujet = "Reponse Questionnaire du data Challenge " . $dataChallenge[0];

    $req = "SELECT u.mail FROM Users u JOIN DataChallenges d ON u.username = d.gestionnaire WHERE d.challengeName = \"" . $dataChallenge[0] . "\";";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    $data = mysqli_fetch_row($result);

    $req = "INSERT INTO Messages (expediteur, destinataire, messages, sujet) VALUES (\"" . $_SESSION["username"] . "\",\"" . $data[0] . "\",\"" . $message . "\",\"" . $sujet . "\");";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);

    mysqli_close($cnx);

    header('Location: /index.php');

?>