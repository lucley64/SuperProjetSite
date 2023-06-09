<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/test.css">
    <script type="text/javascript" src="/js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="/js/questionnaire.js"></script>
    <title>Création de data challenge</title>
</head>

<body <?php
        session_start();
        if ($_SESSION['hasWorked'] == "ok") {
            echo 'onload="alertValidForm();"';
        } else if ($_SESSION['hasWorked'] == "pbTime") {
            echo 'onload="alertErrorTime();"';
        } else if ($_SESSION['hasWorked'] == "pbQuestion") {
            echo 'onload="alertErrorQuestion();"';
        }
        $_SESSION['hasWorked'] = "nothing";
        ?>>

    <img class="background" src="/src/pyrenees.jpg" alt="pyrenees">
    <div id="sidebar">
        <?php
        include "sidebar.php";
        ?>
    </div>
    <div id="head">
        <?php
        include "header.php";
        ?>
    </div>

    <div id="container">
        <h1>Créer un questionnaire</h1>
        <form action="verifCreationForm.php" method="post" id="creationForm">

            <label for="associateDataChallenge"> Sélectionnez le data challenge associé
                <select name="associateDataChallenge" id="associateDataChallenge" required>
                    <?php
                    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
                    if (mysqli_connect_errno()) {
                        echo mysqli_connect_error();
                    }
                    $req = "SELECT challengeName FROM DataChallenges;";
                    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
                    mysqli_close($cnx);
                    while ($data = mysqli_fetch_row($result)) {
                        echo '
                            <option value="' . $data[0] . '">' . $data[0] . '</option>
                            ';
                    }
                    ?>
                </select>

                <label for="startDate"> Date de début
                    <input type="date" name="startDate" id="startDate" placeholder="Entrez la date de début" required>
                </label>

                <label for="endDate"> Date de fin
                    <input type="date" name="endDate" id="endDate" placeholder="Entrez la date de fin" required>
                </label>

                <div id="questions"></div>

                <div id="questionNumberDiv">
                    <label for="questionNumber">
                        <input type="hidden" name="questionNumber" id="questionNumber" value="0">
                    </label>
                </div>

                <input type="submit" value="Créer le questionnaire">

        </form>
        <button onclick="ajouterQuestion()">Ajouter question</button>

    </div>
</body>

</html>