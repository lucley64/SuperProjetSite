<?php
    session_start();
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }
    $challengeName = $_POST["challengeName"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $associateManager = $_POST["selectManager"];

$req = "INSERT INTO DataChallenges VALUES (\"" . $challengeName . "\",\"" . $startDate . "\",\"" . $endDate . "\",\"" . $associateManager . "\");";
$_SESSION["utilisateurDouble"] = false;
$result = mysqli_query($cnx, $req);
if (!$result){
    erreurRequete(mysqli_errno($cnx));
}
mysqli_close($cnx);

    $_SESSION['temporary'] = $challengeName;
    header('Location: modifDataChallenge.php');

    function erreurRequete(int $numeroErreur)
    {
        /*cas ou l'utilisateur rentré existe déjà*/
        if ($numeroErreur == 1062) {
            $_SESSION["challengeDouble"] = true;
            header('Location: creation.php');
        }
        /*a faire: cas ou une valeur a trop de caractères*/
    }

?>
