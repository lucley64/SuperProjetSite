<?php
    session_start();
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }

    

    $idEquipe = $_GET["equipe"];
    $user = $_GET["user"];

    $req = "SELECT capitaine FROM Equipe WHERE id=\"" . $idEquipe . "\";";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    $data = mysqli_fetch_row($result);

    

    if ($data[0] == $user) {
        $req = "DELETE FROM Equipe WHERE id=\"" . $idEquipe . "\";";
        $location = "Location: /index.php";
        $_SESSION["hasWorked"] = "okDelete";
    } else {
        $req = "DELETE FROM Participe WHERE idEquipe=\"" . $idEquipe . "\" AND idUser=\"" . $user . "\";";
        $location = "Location: detailsEquipe.php?id=" . $idEquipe . "";
        $_SESSION["hasWorked"] = "okQuit";
    }
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);

    mysqli_close($cnx);
    header($location);
?>