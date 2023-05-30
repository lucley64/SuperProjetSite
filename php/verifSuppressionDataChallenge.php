<?php
    session_start();
    $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };

    $req = "DELETE FROM DataChallenges WHERE challengeName=\"" . $_POST['selectDataChallenge'] . "\";";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
    mysqli_close($cnx);
    $_SESSION['successDeleteDataChallenge'] = true;
    header('Location: suppressionDatas.php');
?>