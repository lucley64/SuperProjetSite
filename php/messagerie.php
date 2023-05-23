<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/messagerie.css">
    
    <title>Messagerie</title>
</head>
<body>
    <?php
    session_start(); 
    include("header.php");
    include("barrecote.php");

    
    ?>
    
    <div id=DemanderConnexion><h1>Veuillez vous connecter pour acceder à cette fonctionnalité</h1></div>
    <div id=Contenu>
        <div id="barreGauche">
            <ul>
                <li>Messages reçus</li>
                <li>Messages envoyés</li>
            </ul>
        </div>



        <div id="barreDroite">
            <div id=messagesRecus style="display:block"> <?php include("messagerie/messagesrecus.php");?></div>
            <div id="messagesEnvoyes" style="display:none"></div>
        </div>
    </div>
    <?php
    if(!isset($_SESSION["username"])){

        echo "<script> document.getElementById('Contenu').style.display='none';
        document.getElementById('DemanderConnexion').style.display='block';
        </script>";
    }?>
    
</body>
</html>