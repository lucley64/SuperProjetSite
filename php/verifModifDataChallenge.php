<?php
    session_start();
    $_SESSION["hasWorked"] = "okChallenge";
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }

    if (strtotime($endDate) < strtotime($startDate) || strtotime($startDate) < time()) {
        $_SESSION["hasWorked"] = "pbTime";
        header('Location: /php/creationDataChallenge.php');
    }

    if ($_SESSION["hasWorked"] == "okChallenge") {

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
        $result = mysqli_query($cnx, $req);
        if (!$result){
            erreurRequete(mysqli_errno($cnx));
        }
        $data = mysqli_fetch_row($result);
        mysqli_close($cnx);
        header('Location: ../index.php');

        function erreurRequete(int $numeroErreur)
        {
            $_SESSION["hasWorked"] = "pbName";
            header('Location: /php/creationDataChallenge.php');
        }
    }
?>