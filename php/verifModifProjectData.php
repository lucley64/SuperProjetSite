<?php
 
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$mess = 'Pb req : ';
$projectName = "\"" . $_POST["selectProject"] . "\"";


if ($_POST['selectProject'] == "creation") {
    $_SESSION["hasWorked"] = "okProjectCreate";

    $newProjectName = "\"" . $_POST["projectName"] . "\"";

    $associateDataChallenge = "\"" . $_POST["associateDataChallenge"] . "\"";

    if ($_POST["details"] != "") {
        $details = "\"" . $_POST["details"] . "\"";
    } else {
        $details = "NULL";
    }

    if ($_POST["img"] != "") {
        $img = "\"" . $_POST["img"] . "\"";
    } else { 
        $img = "NULL";
    }

    if ($_POST["phone"] != "") {
        $phone = "\"" . $_POST["phone"] . "\"";
    } else { 
        $phone = "NULL";
    }

    if ($_POST["mail"] != "") {
        $mail = "\"" . $_POST["mail"] . "\"";
    } else {
        $mail = "NULL";
    }

    $req = "INSERT INTO ProjectData VALUES (" . $newProjectName . ", " . $associateDataChallenge . ", " . $details . ", " . $img . ", " . $phone . ", " . $mail . ");";
    $result = mysqli_query($cnx, $req);
    if (!$result){
        erreurRequete(mysqli_errno($cnx));
    }
    mysqli_close($cnx);
    header('Location: /php/modifDataChallenge.php');
} else {

    $_SESSION["hasWorked"] = "okProjectModif";

    $req = "SELECT * FROM ProjectData WHERE nom = " . $projectName . ";";
    $result = mysqli_query($cnx, $req) or die($mess . $req);
    $data = mysqli_fetch_row($result);

    if ($_POST["projectName"] != "") {
        $newProjectName = "\"" . $_POST["projectName"] . "\"";
    } else {
        $newProjectName = "\"" . $data[0] . "\"";
    }

    if ($_POST["details"] != "") {
        $details = "\"" . $_POST["details"] . "\"";
    } else {
        $details = "\"" . $data[2] . "\"";
    }

    if ($_POST["img"] != "") {
        $img = "\"" . $_POST["img"] . "\"";
    } else {
        $img = "\"" . $data[3] . "\"";
    }

    if ($_POST["phone"] != "") {
        $phone = "\"" . $_POST["phone"] . "\"";
    } else {
        $phone = "\"" . $data[4] . "\"";
    }

    if ($_POST["mail"] != "") {
        $mail = "\"" . $_POST["mail"] . "\"";
    } else {
        $mail = "\"" . $data[5] . "\"";
    }

    $req = "SELECT nom FROM ProjectData;";
    $result = mysqli_query($cnx, $req);

    if ($_POST["projectName"] != "") {
        while ($data = mysqli_fetch_row($result)) {
            if ($data[0] == $_POST["projectName"]) {
                erreurRequete(1062);
            }
        }
    }

    if ($_SESSION["hasWorked"] = "okProjectModif") {

        $req = "UPDATE ProjectData SET nom = " . $newProjectName . ", details = " . $details . ", img = " . $img . ", phone = " . $phone . ", mail = " . $mail . " WHERE nom = " . $projectName . ";";
        $result = mysqli_query($cnx, $req);
        if (!$result){
            erreurRequete(mysqli_errno($cnx));
        }
        mysqli_close($cnx);
        header('Location: ./modifDataChallenge.php');
    }
}

function erreurRequete(int $numeroErreur)
        {
            $_SESSION["hasWorked"] = "pbName";
            header('Location: /php/modifDataChallenge.php');
        }
?>
