<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$req = "SELECT * FROM Users WHERE username=\"" . $_POST['login'] . "\";";
$result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
$data = mysqli_fetch_row($result);
mysqli_close($cnx);
if (password_verify($_POST['mdp'], $data[1])) {
    $_SESSION['username'] = $data[0];
    $_SESSION['pwd'] = $data[1];
    $_SESSION['userType'] = $data[2];
    $_SESSION['lastName'] = $data[3];
    $_SESSION['firstName'] = $data[4];
    $_SESSION['workplace'] = $data[5];
    $_SESSION['studyLvl'] = $data[6];
    $_SESSION['phone'] = $data[7];
    $_SESSION['mail'] = $data[8];
    $_SESSION['startDate'] = $data[9];
    $_SESSION['endDate'] = $data[10];
    $_SESSION['connected'] = true;
    $_SESSION['wrongPwd'] = false;
    if ($_SESSION["userType"] == "student") {
        header('Location: /accueilStudent.php');
    } else if($_SESSION["userType"] == "manager") {
        header('Location: /php/accueilManager.php');
    } else {
        header('Location: /php/accueilAdmin.php');
    }
    header('Location: ../index.php');
} else {
    $_SESSION['wrongPwd'] = true;
    header('Location: connexion.php');
}