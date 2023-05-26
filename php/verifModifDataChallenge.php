<?php
    session_start();
    $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };

    $challengeName = "\"" . $_POST["selectDataChallenge"] . "\"";
    $newChallengeName = "\"" . $_POST["newChallengeName"] . "\"";

    if ($_POST["startDate"] != "") {
        $startDate = "\"" . $_POST["startDate"] . "\"";
    } else {
        $startDate = "NULL";
    }

    if ($_POST["endDate"] != "") {
        $endDate = "\"" . $_POST["endDate"] . "\"";
    } else {
        $endDate = "NULL";
    }

    $req = "UPDATE DataChallenges SET challengeName = " . $newChallengeName . ", startDate = " . $startDate . ", endDate = " . $endDate . " WHERE challengeName =" . $challengeName . ";";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);
    header('Location: ../index.php');

?>