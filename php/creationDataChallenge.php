<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginsignin.css">
    <title>Création de data challenge</title>
</head>

<body>
<img class="background" src="/src/pyrenees.jpg" alt="pyrenees">


    <?php
    session_start();
    if (!isset($_SESSION['userType']) || $_SESSION['userType'] != "admin") {
            header('Location: /index.php');
    }
    ?>
    <div id="container">
        <button onclick="window.location='/index.php'" class="nav">Retour</button>
        <h1>Créer un data challenge</h1>
        <form action="verifCreationDataChallenge.php" method="post" id="creation">

            <label for="challengeName"> Nom du Data Challenge
                <input type="text" name="challengeName" id="challengeName" placeholder="Entrez le nom du data challenge" required>
            </label>

            <label for="startDate"> Date de début
                <input type="date" name="startDate" id="startDate" placeholder="Entrez la date de début" required>
            </label>

            <label for="endDate"> Date de fin
                <input type="date" name="endDate" id="endDate" placeholder="Entrez la date de fin" required>
            </label>
            <label for="selectManager"> Selectionner un manager
                <select name="selectManager" id="selectManager" required>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno($cnx)) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT username FROM Users WHERE userType = 'manager';";
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

            <label for="associateManager">
                <input type="hidden" value="">
            </label>

            <input type="submit" value="Créer le data challenge">

        </form>
    </div>
</body>

</html>
