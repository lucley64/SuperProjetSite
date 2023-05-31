<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/loginsignin.css">
    <title>Création d'une équipe</title>
</head>

<body <?php
        session_start();
        if ($_SESSION['hasWorked'] == "pb") {
            echo 'onload="alertErrorCreationEquipe();"';
        }
        $_SESSION['hasWorked'] = "nothing";
        ?>>

<img class="background" src="/src/pyrenees.jpg" alt="pyrenees">
    <div id="container">
        <button onclick="window.location='/index.php'" class="nav">Retour</button>
        <h1>Créer une équipe</h1>
        <form action="verifCreationEquipe.php" method="post" id="creation">

            <label for="nomEquipe"> Nom de l'equipe
                <input type="text" name="nomEquipe" id="nomEquipe" placeholder="Entrez le nom de l'équipe" required>
            </label>

            <label for="githubLink"> Lien d'hébergement de code
                <input type="text" name="githubLink" id="githubLink" placeholder="Entrez le nom de l'équipe" required>
            </label>

            <label for="selectDataChallenge"> Sélectionnez un Data Challenge auquel inscrire l'équipe
                <select name="selectDataChallenge" id="selectDataChallenge" required>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno()) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT challengeName FROM DataChallenges;";
                        $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
                        mysqli_close($cnx);
                        while ($data = mysqli_fetch_row($result)) {
                            echo('
                            <option value="' . $data[0] .'">' . $data[0] . '</option>
                            ');
                        }
                    ?>
                </select>
            </label>

            <input type="submit" value="Créer l'équipe">
        
        </form>
    </div>
</body>

</html>
