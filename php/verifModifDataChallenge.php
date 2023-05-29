<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

    $challengeName = "\"" . $_POST["selectDataChallenge"] . "\"";

$req = "SELECT * FROM DataChallenges WHERE challengeName = " . $challengeName . ";";
$result = mysqli_query($cnx, $req) or die($mess . $req);
$data = mysqli_fetch_row($result);

if ($_POST["newChallengeName"] != "") {
    $newChallengeName = "\"" . $_POST["newChallengeName"] . "\"";
} else {
    $newChallengeName = $challengeName;
}

if ($_POST["startDate"] != "") {
    $startDate = "\"" . $_POST["startDate"] . "\"";
} else {
    $startDate = "\"" . $data[1] . "\"";
}

if ($_POST["endDate"] != "") {
    $endDate = "\"" . $_POST["endDate"] . "\"";
} else {
    $endDate = "\"" . $data[2] . "\"";
}

$req = "UPDATE DataChallenges SET challengeName = " . $newChallengeName . ", startDate = " . $startDate . ", endDate = " . $endDate . " WHERE challengeName =" . $challengeName . ";";
$result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
$data = mysqli_fetch_row($result);
mysqli_close($cnx);
header('Location: ../index.php');
