<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/test.css">
    <script type="text/javascript" src="../js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modification de compte</title>
</head>

<body <?php
        if ($_SESSION['wrongPwd']) {
            $_SESSION['wrongPwd'] = false;
            echo 'onload="alertWrongPassword();"';
        }
        if ($_SESSION['hasWorked'] == "ok") {
            echo 'onload="alertValidModifUser();"';
        }
        $_SESSION['hasWorked'] = "nothing";
        ?> >

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
    <div id="container" style="top:5%;">
        <h1>Modifier le compte</h1>
        <form action="verifModif.php" method="post" id="creation">

            <label for="oldpwd"> Ancien mot de passe
                <input type="password" name="oldpwd" id="oldpwd" placeholder="Entrez votre ancien mot de passe">
            </label>

            <label for="pwd"> Nouveau mot de passe
                <input type="password" name="pwd" id="pwd" placeholder="Entrez votre nouveau mot de passe">
            </label>

            <label for="firstName"> Prénom  
                <input type="text " name="firstName" id="firstName" placeholder="Entrez votre prénom" value="<?php echo '' . $_SESSION['firstName'] . '' ?>">
            </label>

            <label for="lastName"> Nom
                <input type="text " name="lastName" id="lastName" placeholder="Entrez votre nom de famille" value="<?php echo '' . $_SESSION['lastName'] . '' ?>">
            </label>

            <label for="workplace"> École
                <input type="text " name="workplace" id="workplace" placeholder="Entrez le nom de votre école" value="<?php echo '' . $_SESSION['workplace'] . '' ?>">
            </label>

            <label for="studyLvl"> Niveau d'études
                <select name="studyLvl" id="studyLvl" value="<?php echo '' . $_SESSION['studyLvl'] . '' ?>">
                    <option value="none">Veuillez choisir une année d'études</option>
                    <option value="l1">L1</option>
                    <option value="l2">L2</option>
                    <option value="l3">L3</option>
                    <option value="m1">M1</option>
                    <option value="m2">M2</option>
                    <option value="dr">Dr</option>
                </select>
            </label>

            <label for="phone"> Numéro de téléphone
                <input type="text " name="phone" id="phone" placeholder="Entrez votre numéro de téléphone" value="<?php echo '' . $_SESSION['phone'] . '' ?>">
            </label>

            <label for="mail"> adresse mail
                <input type="email" name="mail" id="mail" placeholder="Entrez votre adresse email" value="<?php echo '' . $_SESSION['mail'] . '' ?>">
            </label>

            <input type="submit" value="Mettre à jour les informations du compte">
        </form>
    </div>
</body>

</html>
