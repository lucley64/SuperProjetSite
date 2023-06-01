<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
$_SESSION["hasWorked"] = "okModif";
$req = "SELECT pwd FROM Users WHERE username=\"" . $_SESSION['username'] . "\";";
$result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
$data = mysqli_fetch_row($result);

if ($_SESSION['userType'] != "admin" && !(password_verify($_POST["oldpwd"], $data[0]))) {
    $_SESSION['wrongPwd'] = true;
    $_SESSION["hasWorked"] = "nothing";
    header('Location: modifInfos.php');
} else {
    $username = "\"" . $_SESSION["username"] . "\"";
    $pwd = "\"" . password_hash($_POST["pwd"], PASSWORD_DEFAULT) . "\"";

    if ($_POST["pwd"] != "") {
        $pwd = "\"" . password_hash($_POST["pwd"], PASSWORD_DEFAULT) . "\"";
    } else {
        $pwd = "\"" . password_hash($_POST["oldpwd"], PASSWORD_DEFAULT) . "\"";
    }

    if ($_POST["lastName"] != "") {
        $lastName = "\"" . $_POST["lastName"] . "\"";
    } else {
        $lastName = "NULL";
    }

    if ($_POST["firstName"] != "") {
        $firstName = "\"" . $_POST["firstName"] . "\"";
    } else {
        $firstName = "NULL";
    }

    if ($_POST["workplace"] != "") {
        $workplace = "\"" . $_POST["workplace"] . "\"";
    } else {
        $workplace = "NULL";
    }

    if ($_POST["studyLvl"] != "none") {
        $studyLvl = "\"" . $_POST["studyLvl"] . "\"";
    } else {
        $studyLvl = "NULL";
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

    $req = "UPDATE Users SET pwd = " . $pwd . ", lastName =" . $lastName . ", firstName = " . $firstName . ", workplace = " . $workplace . ", studyLvl = " . $studyLvl . ", phone = " . $phone . ", mail = " . $mail . ", startDate = " . $startDate . ", endDate = " . $endDate . " WHERE username =" . $username . ";";
    $result = mysqli_query($cnx, $req);
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);

    if ($_SESSION['userType'] != "admin") {
        header('Location: /php/modifInfos.php');
    } else {
        header('Location: /php/suppression.php');
    }
    
}
