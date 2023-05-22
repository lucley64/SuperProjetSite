<?php
    session_start();
    $cnx = mysqli_connect("localhost","dkd","dkdAchilleMael0","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };

    $req = "INSERT INTO Users VALUES (\"" . $_POST["username"] . "\",\"" . $_POST["pwd"] . "\",\"student\",\"" . $_POST["lastName"] . "\",\"" . $_POST["firstName"] . "\",\"" . $_POST["workplace"] . "\",\"" . $_POST["studyLvl"] . "\",\"" . $_POST["phone"] . "\",\"" . $_POST["mail"] . "\", NULL, NULL);";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);
    header('Location: connexion.php');
?>