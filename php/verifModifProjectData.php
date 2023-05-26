<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$mess = 'Pb req : ';
$projectName = "\"" . $_POST["selectProject"] . "\"";


if ($_POST['selectProject'] == "creation") {

    $newProjectName = "\"" . $_POST["projectName"] . "\"";

    $associateDatachallenge = "\"" . $_POST["associateDatachallenge"] . "\"";

    if ($_POST["details"] != "") {
        $details = "\"" . $_POST["details"] . "\"";
    } else {
        $details = "NULL";
    }

    $file = $_FILES['img'];
    if ($file['error'] == UPLOAD_ERR_OK && $file['error'] != UPLOAD_ERR_NO_FILE && $_FILES['img'] != NULL) {
        chmod('../data/ressources/projectImg/', 0777);
        $img = "\"" . $file['name'] . "\"";
        $destination = '../data/ressources/projectImg/fichier_de_merde.jpg';// . $file['name'];
        move_uploaded_file($file['tmp_name'], $destination);
    } else {
        $img = "'ca a pas marche'";
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

    $req = "INSERT INTO ProjectData VALUES (" . $newProjectName . ", " . $associateDatachallenge . ", " . $details . ", " . $img . ", " . $phone . ", " . $mail . ");";
    $result = mysqli_query($cnx, $req) or die($mess . $req);
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);
    header('Location: ./modifDataChallenge.php');
} else {

    $req = "SELECT * FROM ProjectData WHERE nom = " . $projectName . ";";
    $result = mysqli_query($cnx, $req) or die($mess . $req);
    $data = mysqli_fetch_row($result);

    $newProjectName = "\"" . $_POST["projectName"] . "\"";

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

    $req = "UPDATE ProjectData SET nom = " . $newProjectName . ", details = " . $details . ", img = " . $img . ", phone = " . $phone . ", mail = " . $mail . " WHERE nom = " . $projectName . ";";
    $result = mysqli_query($cnx, $req) or die($mess . $req);
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);
    header('Location: ./modifDataChallenge.php');
}
