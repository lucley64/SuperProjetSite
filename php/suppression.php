<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/header.js"></script>
    <script type="text/javascript" src="../js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/loginsignin.css">
    <title>Suppression</title>
</head>

<body>
    <div id="container">
        <button onclick="window.location='../index.php'" class="nav">Retour</button>
        <form action="verifSuppression.php" method="post" id="suppression">
            <label for="userSuppression"> Supprimer un utilisateur
                <select name="userSuppression" id="userSuppression"required>
                    <option value="none">Veuillez choisir un utilisateur</option>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno($cnx)) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT username FROM Users;";
                        $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
                        $data = mysqli_fetch_row($result);
                        mysqli_close($cnx);
                        while ($data = mysqli_fetch_row($result)) {
                            echo('
                            <option value="' . $data[0] .'">' . $data[0] . '</option>
                            ');
                        }
                    ?>
                </select>
            </label>
            <input type="submit" value="Supprimer l'utilisateur">
            <input type="submit" value="Supprimer l'utilisateur">
        </form>
        <button value="Modifier l'utilisateur"></button>
        <button value="Supprimer l'utilisateur"></button>
        
    </div>
</body>

</html>

<!-- 
nb fonctions
nb lignes/fonctions
nb max min moy lignes
nb lignes total
nb occurences mot clef -->