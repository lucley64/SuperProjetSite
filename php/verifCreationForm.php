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

mysqli_close($cnx);

header('Location: /index.php');

?>