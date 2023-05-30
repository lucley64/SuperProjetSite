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