<?php
    session_start();
    $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };

    $req = "SELECT pwd FROM Users WHERE username=\"" . $_SESSION['username'] . "\";";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
    $data = mysqli_fetch_row($result);

    if ($_SESSION['userType'] != "admin" && !(password_verify($_POST["oldpwd"],$data[0]))) {
        $_SESSION['wrongPwd'] = true;
        print_r("mauvais mdp".$_POST["pwd"]);  
        header('Location: modifInfos.php');
    } else {
        $username = "\"" . $_SESSION["username"] . "\"";
        $pwd = "\"" .password_hash($_POST["pwd"],PASSWORD_DEFAULT) . "\"";
        print_r($pwd);
        if ($_POST["userType"] != "") {
            $userType = "\"" . $_POST["userType"] . "\"";
        } else {
            $userType = "\"student\"";
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

        $req = "UPDATE Users SET pwd = " . $pwd . ", userType = " . $userType . ", lastName =" . $lastName . ", firstName = " . $firstName . ", workplace = " . $workplace . ", studyLvl = " . $studyLvl . ", phone = " . $phone . ", mail = " . $mail . ", startDate = " . $startDate . ", endDate = " . $endDate . " WHERE username =" . $username . ";";
        $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
        $data = mysqli_fetch_row($result);
        mysqli_close($cnx);
        header('Location: ../index.php');
    }
?>