<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginsignin.css">
    <title>Création de compte en tant qu'administrateur</title>
</head>

<body>
<img class="background" src="/src/pyrenees.jpg" alt="pyrenees">

    <?php
    session_start();
    if ($_SESSION['userType'] != "admin") {
        header('Location: /index.php');
    }
    ?>
    <div id="container">
        <button onclick="window.location='/index.php'" class="nav">Retour</button>
        <h1>Créer un compte</h1>
        <form action="verifCreation.php" method="post" id="creation">
            <label for="userType"> Type d'utilisateur
                <select name="userType" id="userType" required>
                    <option value="none">Veuillez choisir un type</option>
                    <option value="student">Participant</option>
                    <option value="manager">Gestionnaire</option>
                    <option value="admin">Administrateur</option>
                </select>
            </label>

            <label for="username"> Username
                <input type="text " name="username" id="username" placeholder="Entrez le nom d'utilisateur" required>
            </label>

            <label for="pwd"> Password
                <input type="text " name="pwd" id="pwd" placeholder="Entrez le mot de passe" required>
            </label>
            <input type="submit" value="Créer le compte">
        </form>
    </div>
</body>

</html>
