<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/css/test.css">
    <title>Création de compte en tant qu'administrateur</title>
</head>

<body <?php
        session_start();
        if ($_SESSION['hasWorked'] == "ok") {
            $_SESSION['hasWorked'] = "nothing";
            echo 'onload="alertValidCreatedUser();"';
        } else if ($_SESSION['hasWorked'] == "pb") {
            echo 'onload="alertErrorCreatedUser();"';
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

    <?php
    session_start();
    if ($_SESSION['userType'] != "admin") {
        header('Location: /index.php');
    }
    ?>
    <div id="container">
        <h1>Créer un compte</h1>
        <form action="verifCreation.php" method="post" id="creation">
            <label for="userType"> Type d'utilisateur
                <select name="userType" id="userType" required>
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

            <h3>Si le gestionnaire est externe, veuillez remplir sa periode d'activation</h3>

            <label for="starDate"> Start Date
                <input type="date" name="startDate" id="startDate" placeholder="Entrez la date de départ">
            </label>
            <label for="endDate"> End Date
                <input type="date" name="endDate" id="endDate" placeholder="Entrez la date de fin">
            </label>
            <input type="submit" value="Créer le compte">
        </form>
    </div>
</body>

</html>
