<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/header.js"></script>
    <link rel="stylesheet" href="../css/loginsignin.css">
    <title>Se connecter</title>
</head>

<body>
    <div id="container">
        <button onclick="window.location='../index.php'" class="nav">Retour</button>
        <h1>Se login</h1>
        <form action="verifConnexion.php" method="post" id="login">
            <label for="login"> Login
                <input required placeholder="Entrez votre nom d'utilisateur" <?php if (isset($loginErr)) {
                            echo $invalid;
                        }
                        if (isset($login)) {
                            echo " value=" . $login;
                        } ?> type="text " name="login" id="loginInp">
                <span class="error <?php if (isset($loginErr)) {
                                        echo "active";
                                    } ?>" aria-live="polite"><?php echo $loginErr ?></span>
            </label>
            <label for="mdp"> Mot de passe
                <input required placeholder="Entrez votre mot de passe" <?php if (isset($passwordErr)) {
                            echo $invalid;
                        }
                        if (isset($password)) {
                            echo " value=" . $password;
                        } ?> type="password" name="mdp" id="mdpInp">
                <span class="error <?php if (isset($passwordErr)) {
                                        echo "active";
                                    } ?>" aria-live="polite"><?php echo $passwordErr ?></span>
            </label>

            <input type="submit" value="Se connecter">
        </form>

        <span class="no" style="margin-top:1em;">Pas de compte ? <a href="creation.php">Creer un compte</a></span>
    </div>
</body>

</html>