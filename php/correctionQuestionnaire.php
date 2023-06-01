<!DOCTYPE html>
<html lang="en">
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if ($_SESSION["userType"] != "manager") {
    header('Location: /index.php');
    $_SESSION["hasWorked"] = "pbDroits";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginsignin.css">
    <script type="text/javascript" src="../js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modification de Data Challenge</title>
</head>

<body>
    <img class="background" src="../src/pyrenees.jpg" alt="pyrenees">

    <div id="containerCreation" style="top:5;">
        <button onclick="window.location='/index.php'" class="nav">Retour</button>
        <h1>Corriger le questionnaire</h1>
        <?php
            session_start();
            $idQuestionnaire = $_GET["idQuestionnaire"];
            $idEquipe = $_GET["idEquipe"];

            $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
            if (mysqli_connect_errno()) {
                echo mysqli_connect_error();
            }

            $req = "SELECT q.content, r.content FROM (Question q JOIN Questionnaire que ON q.questionnaire = que.id) JOIN Reponse r ON q.id = r.question WHERE que.id = " . $idQuestionnaire . " AND r.idEquipe = " . $idEquipe . ";";
            $result = mysqli_query($cnx, $req);

            echo('<form action="verifCorrection.php?id=' . $id . '" method="post" id="verifQuestionnaire">');

            $compteur = 0;

            while ($data = mysqli_fetch_row($result)) {
                echo('
                    <label for="note' . $compteur . '"> ' . $data[0] . " :\n" . $data[1] . '
                        <input type="number" name="note' . $compteur . '" id="note' . $compteur . '" placeholder="Entrez votre note entre 0 et 4" min="0" max="4">
                    </label>
                ');
                $compteur = $compteur + 1;
            }



            echo('<label for="nbReponse">
                    <input type="hidden" name="nbReponse" id="nbReponse" value="' . $compteur . '">
                </label>
                <input type="submit" value="Corriger">
                </form>');
        ?>
    </div>
</body>

</html>