<?php
    session_start();
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }

    $_SESSION["hasWorked"] = "okDelete";
    $req = "DELETE FROM Users WHERE username=\"" . $_POST['userSuppression'] . "\";";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    mysqli_close($cnx);
    header('Location: /php/suppression.php');
?>