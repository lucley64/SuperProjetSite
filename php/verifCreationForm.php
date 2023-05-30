<?php
    session_start();
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }

    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $associateDataChallenge = $_POST["associateDataChallenge"];
    $questionNumber = $_POST["questionNumber"];


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

    $req = "SELECT u.mail FROM Users u JOIN Equipe e ON u.username = e.capitaine WHERE e.dataChallenge = \"" . $_POST["associateDataChallenge"] . "\";";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    $lien = "/php/questionnaire.php?id=" . $idQuestionnaire;
    $message = "Vous avez un nouveau formulaire à remplir, cliquez <a href='" . $lien . "'>ici.</a>";
    $sujet = "Questionnaire du data Challenge " . $_POST["associateDataChallenge"];
    while ($data = mysqli_fetch_row($result)) {
        $req = "INSERT INTO Messages (expediteur, destinataire, messages, sujet) VALUES (\"" . $_SESSION["username"] . "\",\"" . $data[0] . "\",\"" . $message . "\",\"" . $sujet . "\");";
        $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    }

    mysqli_close($cnx);

    header('Location: /index.php');

?>