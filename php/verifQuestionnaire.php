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
        $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);;
    }
    mysqli_close($cnx);

    header('Location: /index.php');

?>