<?php
    session_start();
    $_SESSION["hasWorked"] = "ok";
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }
    $challengeName = $_POST["challengeName"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $associateManager = $_POST["associateManager"];

    if (strtotime($endDate) < strtotime($startDate) || strtotime($startDate) < time()) {
        $_SESSION["hasWorked"] = "pbTime";
        header('Location: /php/creationDataChallenge.php');
    }

    if ($_SESSION["hasWorked"] == "ok") {

        $req = "INSERT INTO DataChallenges VALUES (\"" . $challengeName . "\",\"" . $startDate . "\",\"" . $endDate . "\",\"" . $associateManager . "\");";
        $result = mysqli_query($cnx, $req);
        if (!$result){
            erreurRequete(mysqli_errno($cnx));
        }
        mysqli_close($cnx);
        if ($_SESSION["hasWorked"] == "ok") {

            $_SESSION['temporary'] = $challengeName;
            header('Location: modifDataChallenge.php');
        }
    }

    function erreurRequete(int $numeroErreur)
    {
        $_SESSION["hasWorked"] = "pbName";
        header('Location: /php/creationDataChallenge.php');
    }
?>
