<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
    session_start();
    $_SESSION["hasWorked"] = "okChallenge";
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }

    $challengeName = "\"" . $_POST["selectDataChallenge"] . "\"";

    $req = "SELECT startDate, endDate FROM DataChallenges WHERE challengeName = " . $challengeName . ";";
    $result = mysqli_query($cnx, $req);
    $data = mysqli_fetch_row($result);

    if ($_POST["startDate"] != "") {
        $data[0] = $_POST["startDate"];
    }

    if ($_POST["endDate"] != "") {
        $data[1] = $_POST["endDate"];
    }

    if (strtotime($data[1]) < strtotime($data[0]) || strtotime($data[0]) < time()) {
        $_SESSION["hasWorked"] = "pbTime";
        header('Location: /php/modifDataChallenge.php');
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

        $req = "SELECT challengeName FROM DataChallenges;";
        $result = mysqli_query($cnx, $req);

        function erreurRequete(int $numeroErreur) {
            $_SESSION["hasWorked"] = "pbName";
            header('Location: /php/modifDataChallenge.php');
        }
        
        if ($_POST["newChallengeName"] != "") {
            while ($data = mysqli_fetch_row($result)) {
                if ($data[0] == $_POST["newChallengeName"]) {
                    erreurRequete(1062);
                }
            }
        }

        if ($_SESSION["hasWorked"] == "okChallenge") {

            $req = "UPDATE DataChallenges SET challengeName = " . $newChallengeName . ", startDate = " . $startDate . ", endDate = " . $endDate . " WHERE challengeName =" . $challengeName . ";";
            $result = mysqli_query($cnx, $req) ;
            $data = mysqli_fetch_row($result);
            mysqli_close($cnx);
            header('Location: /php/modifDataChallenge.php');

        }
        
    }
?>