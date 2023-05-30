<?php
    session_start();
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }
    $nbReponse = $_POST["nbReponse"];

    $noteFinale = 0;
    for ($i=0; $i < $nbReponse; $i++) { 
        $noteFinale = $noteFinale + $_POST["note" . $i];
    }

    $req = "UPDATE Equipe SET score = score + " . $noteFinale . ";";
    $result = mysqli_query($cnx, $req); 

    if (!$result){
        erreurRequete(mysqli_errno($cnx));
    }
    mysqli_close($cnx);

    header('Location: /index.php');

?>