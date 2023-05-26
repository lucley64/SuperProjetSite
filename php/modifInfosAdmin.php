<!DOCTYPE html>
<html lang="en">
<?php
    session_start();

    $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
    if (mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
    };
    $req = "SELECT * FROM Users WHERE username = \"" . $_POST['username'] . "\";";
    $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
    $data = mysqli_fetch_row($result);
    
    $username = $data[0];
    $pwd = $data[1];
    $userType = $data[2];
    $lastName = $data[3];
    $firstName = $data[4];
    $workplace = $data[5];
    $studyLvl = $data[6];
    $phone = $data[7];
    $mail = $data[8];
    $startDate = $data[9];
    $endDate = $data[10];
    mysqli_close($cnx);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginsignin.css">
    <script type="text/javascript" src="../js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modification de compte</title>
</head>

<body <?php
        if ($_SESSION['wrongPwd']) {
            $_SESSION['wrongPwd'] = false;
            echo('onload="alertWrongPassword();"');
        }
    ?>> 
    
    <div id="containerCreation" style="top:5%;">
        <button onclick="window.location='/php/connexion.php'" class="nav">Retour</button>
        <h1>Modifier le compte</h1>
        <form action="verifModif.php" method="post" id="creation">

            <label for="username">
                <input type="hidden" name="oldpwd" id="oldpwd" placeholder="Entrez l'identifiant du compte à modifier"  value="<?php echo('' . $_POST['username'] . '') ?>">
            </label>

            <label for="pwd"> New Password
                <input type="password " name="pwd" id="pwd" placeholder="Entrez votre nouveau mot de passe">
            </label>

            <label for="firstName"> First Name
                <input type="text " name="firstName" id="firstName" placeholder="Entrez votre prénom" value="<?php echo('' . $firstName . '') ?>"  >
            </label>

            <label for="lastName"> Last Name
                <input type="text " name="lastName" id="lastName" placeholder="Entrez votre nom de famille" value="<?php echo('' . $lastName . '') ?>">
            </label>

            <label for="workplace"> School
                <input type="text " name="workplace" id="workplace" placeholder="Entrez le nom de votre école" value="<?php echo('' . $workplace. '') ?>">
            </label>

            <label for="studyLvl"> Level of Studies
            <select name="studyLvl" id="studyLvl" value="<?php echo('' . $studyLvl . '') ?>">
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
                <input type="text " name="phone" id="phone" placeholder="Entrez votre numéro de téléphone" value="<?php echo('' . $phone . '') ?>">
            </label>
            
            <label for="mail"> Email adress
                <input type="email" name="mail" id="mail" placeholder="Entrez votre adresse email" value="<?php echo('' . $mail . '') ?>">
            </label>

            <?php
                if ($userType == "manager") {
                    echo ('
                    <label for="starDate"> Start Date
                    <input type="date" name="startDate" id="startDate" placeholder="Entrez la date de départ" value="' . $startDate . '">
                    </label>
                    <label for="endDate"> End Date
                    <input type="date" name="endDate" id="endDate" placeholder="Entrez la date de fin" value="' . $endDate . '">
                    </label>
                    ');
                }
            ?>

            <input type="submit" value="Mettre à jour les informations du compte">
        </form>
    </div>
</body>

</html>