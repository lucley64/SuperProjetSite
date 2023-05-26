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
    <script type="text/javascript" src="../js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modification de Data Challenge</title>
</head>

<body <?php
        if ($_SESSION['wrongPwd']) {
            $_SESSION['wrongPwd'] = false;
            echo('onload="alertWrongPassword();"');
        }
    ?>> 
    
    <div id="containerCreation" style="top:5;">
        <button onclick="window.location='/php/connexion.php'" class="nav">Retour</button>
        <h1>Modifier le Data Challenge</h1>
        <form action="verifModifDataChallenge.php" method="post" id="creation">

            <label for="challengeName"><?php echo('' . $_SESSION['temporary'] . '') ?>
                <input type="hidden" name="challengeName" id="challengeName" placeholder="Entrez le nom du data Challenge à modifier"  value="<?php echo('' . $_SESSION['temporary'] . '') ?>">
            </label>

            <label for="newChallengeName"> Nouveau nom du data challenge
                <input type="text" name="newChallengeName" id="newChallengeName" placeholder="Entrez le nouveau nom du data Challenge à modifier"  value="<?php echo('' . $_SESSION['temporary'] . '') ?>" required>
            </label>

            <label for="startDate"> Start Date
                <input type="date" name="startDate" id="startDate" placeholder="Entrez la date de départ" value="<?php echo('' . $startDate . '') ?>"  >
            </label>

            <label for="endDate"> End Date
                <input type="date" name="endDate" id="endDate" placeholder="Entrez la date de fin" value="<?php echo('' . $endDate . '') ?>"  >
            </label>

            <input type="submit" value="Mettre à jour les informations du compte">
        </form>

        <h1>Modifier/Creer Projet Data</h1>
        <form action="verifModifProjectData.php" method="post" id="creation">
            <label for="selectProject"> Sélectionnez un projet
                <select name="selectProject" id="selectProject"required>
                    <option value="creation">Créer un nouveau projet</option>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno($cnx)) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT nom FROM ProjectData;";
                        $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
                        mysqli_close($cnx);
                        while ($data = mysqli_fetch_row($result)) {
                            echo('
                            <option value="' . $data[0] .'">' . $data[0] . '</option>
                            ');
                        }
                    ?>
                </select>
            </label>
            <label for="projectName"> Nom du projet
                <input type="text" name="projectName" id="projectName" placeholder="Entrez le nom du projet Data">
            </label>

            <label for="details"> Détails
                <input type="text" name="details" id="details" placeholder="Entrez une brève description du projet">
            </label>

            <label for="img"> Image
                <input type="file" name="img" id="img" placeholder="Sélectionnez un image">
            </label>
            
            <label for="phone"> Téléphone
                <input type="text" multiple name="phone" id="phone" placeholder="Entrez le numero de telephone du porteur de projet">
            </label>

            <label for="mail"> Mail
                <input type="email" name="mail" id="mail" placeholder="Entrez le mail du porteur de projet">
            </label>

            <input type="submit" value="Mettre à jour les informations du compte">
        </form>

        <h1>Ajouter des ressources</h1>
        <form action="verifCreationRessource.php" method="post" id="creation">
        
            <label for="projectId"> Sélectionnez un projet
                <select name="projectId" id="projectId">
                    <option value="none">Directement associée au data challenge</option>
                    <?php
                        $cnx = mysqli_connect("localhost","thatachallenge","thatachallenge123","datas");
                        if (mysqli_connect_errno($cnx)) {
                            echo mysqli_connect_error();
                        };
                        $req = "SELECT nom FROM ProjectData;";
                        $result = mysqli_query($cnx,$req) or die('Pb req : '.$req);
                        mysqli_close($cnx);
                        while ($data = mysqli_fetch_row($result)) {
                            echo('
                            <option value="' . $data[0] .'">' . $data[0] . '</option>
                            ');
                        }
                    ?>
                </select>
            </label>

            <label for="fichier"> Ressource
                <input type="file" name="fichier" id="fichier" placeholder="Sélectionnez un fichier">
            </label>

            <input type="submit" value="Mettre à jour les informations du compte">
        </form>
    </div>
</body>
</html>