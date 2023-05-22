<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginsignin.css">
    <title>Modification de compte</title>
</head>

<body>
    <div id="containerCreation" style="top:5%;">
        <button onclick="window.location='/php/connexion.php'" class="nav">Retour</button>
        <h1>Modifier le compte</h1>
        <form action="verifModif.php" method="post" id="creation">

            <label for="pwd"> Password
                <input type="text " name="pwd" id="pwd" placeholder="Entrez votre mot de passe">
            </label>

            <label for="firstName"> First Name
                <input type="text " name="firstName" id="firstName" placeholder="Entrez votre prénom">
            </label>

            <label for="lastName"> Last Name
                <input type="text " name="lastName" id="lastName" placeholder="Entrez votre nom de famille">
            </label>

            <label for="workplace"> School
                <input type="text " name="workplace" id="workplace" placeholder="Entrez le nom de votre école">
            </label>

            <label for="studyLvl"> Level of Studies
            <select name="studyLvl" id="studyLvl">
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
                <input type="text " name="phone" id="phone" placeholder="Entrez votre numéro de téléphone">
            </label>
            
            <label for="mail"> Email adress
                <input type="email" name="mail" id="mail" placeholder="Entrez votre adresse email">
            </label>

            <?php
                if ($_SESSION["userType"] == "student") {
                    echo ('
                    <label for="starDate"> Start Date
                    <input type="date" name="startDate" id="startDate" placeholder="Entrez la date de départ">
                    </label>
                    <label for="endDate"> End Date
                    <input type="date" name="endDate" id="endDate" placeholder="Entrez la date de fin">
                    </label>
                    ');
                }
            ?>

            <input type="submit" value="Créer le compte">
        </form>
    </div>
</body>

</html>