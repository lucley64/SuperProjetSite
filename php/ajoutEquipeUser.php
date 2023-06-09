<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/css/test.css">
    <title>Ajout d'utilisateurs dans l'équipe</title>
</head>

<body <?php
        session_start();
        if ($_SESSION['hasWorked'] == "ok") {
            echo 'onload="alertValidAddedUser();"';
        } else if ($_SESSION['hasWorked'] == "pb") {
            echo 'onload="alertErrorAddedUser();"';
        } else if ($_SESSION['hasWorked'] == "pbNombre"){
            echo 'onload="alertErrorTooManyUsers();"';
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
        <h1>Ajouter des membres</h1>
        <form action="verifAjoutEquipeUser.php" method="post" id="creation">

            <label for="selectEquipe"> Sélectionnez votre équipe
                <select name="selectEquipe" id="selectEquipe" value="" required>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno()) {
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
                        if (mysqli_connect_errno()) {
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
        <?php
            if (isset($_SESSION["dataChallenge"])) {
                echo("<button onclick=\"window.location='/php/infoDataChallenge.php?challenge=" . $_SESSION['dataChallenge'] . "'\">Data Challenge</button>");
            }
        ?>
        </div>
</body>

</html>
