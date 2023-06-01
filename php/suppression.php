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
    <link rel="stylesheet" href="/css/test.css">
    <title>Suppression</title>
</head>

<body <?php
        if ($_SESSION['hasWorked'] == "okModif") {
            echo 'onload="alertValidModifUser();"';
        } else if ($_SESSION['hasWorked'] == "okDelete"){
            echo 'onload="alertValidDeleteUser();"';
        }
        $_SESSION['hasWorked'] = "nothing";
        ?>

>

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
        <form action="verifSuppression.php" method="post" id="suppression">
            <label for="userSuppression"> Supprimer un utilisateur
                <select name="userSuppression" id="userSuppression" required>
                    <option value="none">Veuillez choisir un utilisateur</option>
                    <?php
                    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
                    if (mysqli_connect_errno()) {
                        echo mysqli_connect_error();
                    }
                    $req = "SELECT username FROM Users;";
                    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
                    mysqli_close($cnx);
                    while ($data = mysqli_fetch_row($result)) {
                        echo '
                            <option value="' . $data[0] . '">' . $data[0] . '</option>
                            ';
                    }
                    ?>
                </select>
            </label>
            <input type="submit" value="Supprimer l'utilisateur">
        </form>

        <form action="modifInfosAdmin.php" method="post" id="suppression">
            <label for="username"> Modifier un utilisateur
                <select name="username" id="username" required>
                    <option value="none">Veuillez choisir un utilisateur</option>
                    <?php
                    $cnx = mysqli_connect("localhost", "thatachallenge", "thatachallenge123", "datas");
                    if (mysqli_connect_errno()) {
                        echo mysqli_connect_error();
                    };
                    $req = "SELECT username FROM Users;";
                    $result = mysqli_query($cnx, $req) or die('Pb req : ' . $req);
                    mysqli_close($cnx);
                    while ($data = mysqli_fetch_row($result)) {
                        echo '
                            <option value="' . $data[0] . '">' . $data[0] . '</option>
                            ';
                    }
                    ?>
                </select>
            </label>
            <input type="submit" value="Modifier l'utilisateur">
        </form>
</body>

</html>
