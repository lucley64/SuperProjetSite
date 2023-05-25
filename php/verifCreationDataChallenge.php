<?php
    session_start();
    $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };
    $challengeName = $_POST["challengeName"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    $req = "INSERT INTO DataChallenges VALUES (\"" . $challengeName . "\",\"" . $startDate . "\",\"" . $endDate . "\");";
    $_SESSION["utilisateurDouble"]=false;
    $result = mysqli_query($cnx,$req) or ErreurRequete(mysqli_errno($cnx));
    $data = mysqli_fetch_row($result);
    mysqli_close($cnx);

    $_SESSION['temporary'] = $challengeName;
    header('Location: modifDataChallenge.php');

    function ErreurRequete($numeroErreur){
        /*cas ou l'utilisateur rentré existe déjà*/
        if($numeroErreur==1062){
            $_SESSION["challengeDouble"]=true;
            header('Location: creation.php');
        }
        /*a faire: cas ou une valeur a trop de caractères*/

    }
    
?>