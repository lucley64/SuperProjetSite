<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/loginsignin.css">
    <title>Création de compte</title>
</head>

<body <?php
        session_start();
        if ($_SESSION['hasWorked'] == "pb") {
            echo 'onload="alertErrorCreatedUser();"';
        }
        $_SESSION['hasWorked'] = "nothing";
        ?>>
    <img class="background" src="../src/pyrenees.jpg" alt="pyrenees">
    <div id="containerCreation">
        <button onclick="window.location='../index.php'" class="nav">Retour</button>
        <h1>Créer un compte</h1>
        <form action="verifCreation.php" method="post" id="creation">
            <?php
            if ($_SESSION["utilisateurDouble"]) {
                echo "<p style='color:red'>Cet utilisateur existe déjà </p>";
            }
            ?>
            <label for="username"> Username
                <input type="text " name="username" id="username" placeholder="Entrez votre nom d'utilisateur" required>
            </label>

            <label for="pwd"> Password
                <input type="password" name="pwd" id="pwd" placeholder="Entrez votre mot de passe" required>
            </label>

            <label for="firstName"> First Name
                <input type="text " name="firstName" id="firstName" placeholder="Entrez votre prénom" required>
            </label>

            <label for="lastName"> Last Name
                <input type="text " name="lastName" id="lastName" placeholder="Entrez votre nom de famille" required>
            </label>

            <label for="workplace"> School
                <input type="text " name="workplace" id="workplace" placeholder="Entrez le nom de votre école" required>
            </label>

            <?php
            if ($_SESSION["ErreurCreation"]) {
                echo "<p style='color:red'>Veuillez entrer votre année d'étude </p>";
            }
            ?>

            <label for="studyLvl"> Level of Studies
                <select name="studyLvl" id="studyLvl" required>
                    <option value="none">Veuillez choisir une année d'études</option>
                    <option value="l1">L1</option>
                    <option value="l2">L2</option>
                    <option value="l3">L3</option>
                    <option value="m1">M1</option>
                    <option value="m2">M2</option>
                    <option value="dr">Dr</option>
                </select>
            </label>

            <label for="phone"> Phone number
                <input type="number" name="phone" id="phone" placeholder="Entrez votre numéro de téléphone" required>
            </label>

            <label for="mail"> Email adress
                <input type="email" name="mail" id="mail" placeholder="Entrez votre adresse email" required>
            </label>

            <input type="submit" value="Créer le compte">
        </form>
    </div>
</body>

</html>