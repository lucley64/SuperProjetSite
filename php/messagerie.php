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
    include "header.php";
    include "sidebar.php";


    ?>

    <div id=DemanderConnexion>
        <h1>Veuillez vous connecter pour acceder à cette fonctionnalité</h1>
    </div>
    <div id=Contenu>
        <div id="barreGauche">
            <h1>Messagerie trop belle</h1>
            <ul>
                <li class="envoyermail" onclick=afficher(this);>Envoyer mail</li>
                <li class="messagesRecus" onclick=afficher(this);>Messages reçus</li>
                <li class="messagesEnvoyes" onclick=afficher(this);>Messages envoyés</li>
            </ul>
        </div>



        <div id="barreDroite">
            <div class="elt" id="envoyermail" style="display:block">
                <h1>Envoyer mail</h1>
                <form action="messagerie/envoyermail.php" method="POST">
                    <label>Destinataire </label>
                    <input name="destinataire" type="email" value="" placeholder="Destinataire"> <br>
                    <label>Sujet</label>
                    <input id=sujet type="text" name="sujet" placeholder="Sujet"> <br>
                    <label>Message</label>
                    <input id=message type="text" name="message" value="" placeholder="Veuillez ecrire votre message"> <br>

                    <input type="submit" id="Envoyer">

                </form>



            </div>



            <div class="elt" id=messagesRecus style="display:none">
                <h1>Messages reçus:</h1><br>
                <div id="ContenuMessages"></div>
            </div>
            <div class="elt" id="messagesEnvoyes" style="display:none">
                <h1>Messages envoyés:</h1><br>
                <div id="ContenuMessagesEnvoyes"></div>
            </div>
        </div>
    </div>
    <?php
    if (!isset($_SESSION["username"])) {
        echo "<script> document.getElementById('Contenu').style.display='none';
        document.getElementById('DemanderConnexion').style.display='block';
        </script>";
    } ?>

</body>
<script type="text/javascript" src="/js/messagerie.js">


</script>

</html>
