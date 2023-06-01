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
    <title>Se connecter</title>
</head>

<body <?php
        if ($_SESSION['wrongPwd']) {
            $_SESSION['wrongPwd'] = false;
            echo 'onload="alertWrongIdentification();"';
        }
        if ($_SESSION['connected']) {
            session_destroy();
            header('Location: /index.php');
        }
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
        <h1>Se connecter</h1>
        <form action="verifConnexion.php" method="post" id="login">
            <label for="login"> Utilisateur
                <input required placeholder="Entrez votre nom d'utilisateur" <?php if (isset($loginErr)) {
                                                                                    echo $invalid;
                                                                                }
                                                                                if (isset($login)) {
                                                                                    echo " value=" . $login;
                                                                                } ?> type="text " name="login" id="loginInp">
            </label>
            <label for="mdp"> Mot de passe
                <input required placeholder="Entrez votre mot de passe" <?php if (isset($passwordErr)) {
                                                                            echo $invalid;
                                                                        }
                                                                        if (isset($password)) {
                                                                            echo " value=" . $password;
                                                                        } ?> type="password" name="mdp" id="mdpInp">
            </label>

            <input type="submit" value="Se connecter">
        </form>

        <span class="no" style="margin-top:1em;">Pas de compte ? <a href="creation.php">Creer un compte</a></span>
    </div>
</body>

</html>
