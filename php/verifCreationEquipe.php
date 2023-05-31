<?php
session_start();
$cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

$nomEquipe = $_POST["nomEquipe"];
$dataChallenge = $_POST["selectDataChallenge"];
$_SESSION["dataChallenge"] = $dataChallenge;
$githubLink = $_POST["githubLink"];

$req = "SELECT e.dataChallenge FROM Equipe e JOIN Participe p ON e.id = p.idEquipe WHERE p.idUser = \"" . $_SESSION["username"] . "\";";
$result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);

$_SESSION["hasWorked"] = "ok";
while ($data = mysqli_fetch_row($result)) {
    if ($data[0] == $dataChallenge) {
        $_SESSION["hasWorked"] = "pb";
    }
}
if ($_SESSION["hasWorked"] == "ok") {
    $req = "INSERT INTO Equipe (nomEquipe, dataChallenge, capitaine, githubLink) VALUES (\"" . $nomEquipe . "\",\"" . $dataChallenge . "\",\"" . $_SESSION["username"] . "\",\"" . $githubLink . "\");";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);

    $req = "SELECT id FROM Equipe ORDER BY id DESC LIMIT 1;";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    $data = mysqli_fetch_row($result);
    $idEquipe = $data[0];

    $req = "INSERT INTO Participe (idEquipe,idUser) VALUES (\"" . $idEquipe . "\",\"" . $_SESSION["username"] . "\");";
    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
    mysqli_close($cnx);

    $_SESSION["hasWorked"] = "nothing";

    header('Location: /php/ajoutEquipeUser.php');
} else {
    mysqli_close($cnx);
    header('Location: /php/creationEquipe.php');
}
?>
