<?php
    session_start();
    $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };

    $req = "INSERT INTO Users VALUES (\"" . $_POST["username"] . "\",\"" . $_POST["pwd"] . "\",\"student\",\"" . $_POST["lastName"] . "\",\"" . $_POST["firstName"] . "\",\"" . $_POST["workplace"] . "\",\"" . $_POST["studyLvl"] . "\",\"" . $_POST["phone"] . "\",\"" . $_POST["mail"] . "\", NULL, NULL);";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.mysqli_error($cnx));
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);
    header('Location: ../index.php');
?>