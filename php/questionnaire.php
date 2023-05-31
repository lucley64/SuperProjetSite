<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginsignin.css">
    <script type="text/javascript" src="/js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Questionnaire</title>
</head>
<body <?php
            session_start();
            $id = $_GET["id"];

            $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
            if (mysqli_connect_errno()) {
                echo mysqli_connect_error();
            }
        
            $req = "SELECT startDate, endDate FROM Questionnaire WHERE id = " . $id . ";";
            $result = mysqli_query($cnx, $req);
            $data = mysqli_fetch_row($result);

            if (date('Y-m-d') > strtotime($data[1]) || date('Y-m-d') < strtotime($data[0])) {
                echo('onload="alertOutOfTime();"');
            } else {
                $req = "SELECT id FROM Equipe WHERE capitaine = " . $_SESSION["username"] . ";";
                $result = mysqli_query($cnx, $req);
                $equipe = mysqli_fetch_row($result);

                $req = "SELECT q.id FROM (Questionnaire q JOIN Question qu ON q.id = qu.questionnaire) JOIN Reponse r ON r.question = qu.id WHERE r.idEquipe = " . $equipe[0] . ";";
                $result = mysqli_query($cnx, $req);
                $valid = true;
                while ($data = mysqli_fetch_row($result)) {
                    if ($data[0] == $id) {
                        $valid = false;
                    }
                }

                if (!$valid) {
                    echo('onload="alertAlreadyAnswered();"');
                }
            }
            mysqli_close($cnx);
        ?>
>

<?php
    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    }

    $req = "SELECT startDate, endDate FROM Questionnaire WHERE id = " . $id . ";";
    $result = mysqli_query($cnx, $req);
    $data = mysqli_fetch_row($result);
    if (date('Y-m-d') <= strtotime($data[1]) && date('Y-m-d') >= strtotime($data[0])) {

        $req = "SELECT * FROM Question q JOIN Questionnaire que ON q.questionnaire = que.id  WHERE que.id = " . $id . ";";
        $result = mysqli_query($cnx, $req);

        echo('<form action="verifQuestionnaire.php?id=' . $id . '" method="post" id="verifQuestionnaire">');

        $compteur = 0;

        while ($data = mysqli_fetch_row($result)) {
            echo('
                <label for="question' . $compteur . '"> ' . $data[2] . '
                    <input type="text" name="question' . $compteur . '" id="question' . $compteur . '" placeholder="Entrez votre réponse">
                </label>
                <label for="questionId' . $compteur . '">
                    <input type="hidden" name="questionId' . $compteur . '" id="questionId' . $compteur . '" value="' . $data[0] . '">
                </label>
            ');
            $compteur = $compteur + 1;
        }



        echo('<label for="nbReponse">
                <input type="hidden" name="nbReponse" id="nbReponse" value="' . $compteur . '">
            </label>
            <input type="submit" value="Envoyer">
            </form>');
    }

    mysqli_close($cnx);
?>
</body>