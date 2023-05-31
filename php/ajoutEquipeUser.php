<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginsignin.css">
    <title>Ajout d'utilisateurs dans l'équipe</title>
</head>

<body>
<img class="background" src="/src/pyrenees.jpg" alt="pyrenees">

    <?php
    session_start();
    ?> 
    <div id="container">
        <button onclick="window.location='/index.php'" class="nav">Retour</button>
        <h1>Ajouter des membres</h1>
        <form action="verifAjoutEquipeUser.php" method="post" id="creation">

            <label for="selectEquipe"> Sélectionnez votre équipe
                <select name="selectEquipe" id="selectEquipe" value="" required>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno($cnx)) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT id, nomEquipe, dataChallenge FROM Equipe WHERE capitaine = \"" . $_SESSION["username"] . "\";";
                        $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);

                        mysqli_close($cnx);
                        while ($data = mysqli_fetch_row($result)) {
                            echo('
                            <option value="' . $data[0] . '">' . $data[1] . "-" . $data[2] . '</option>
                            ');
                        }
                    ?>
                </select>
            </label>

            <label for="selectUser"> Sélectionnez un utilisateur à ajouter à l'équipe
                <select name="selectUser" id="selectUser" required>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno($cnx)) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT username FROM Users WHERE userType = 'student';";
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

            <input type="submit" value="Ajouter l'utilisateur à l'équipe">
        
        </form>
    </div>
</body>

</html>
