<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/messagerie.css">
    <script type="text/javascript" src="/js/alerts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Messagerie</title>
</head>

<body  <?php
        session_start();
        if ($_SESSION['hasWorked'] == "pbMessagerie") {
            echo 'onload="alertErrorMessage();"';
        }
        $_SESSION['hasWorked'] = "nothing";
        ?>>
    <img class="background" src="/src/pyrenees.jpg" alt="pyr">
    <div id="sidebarr">
        <?php
        include "sidebar.php";

        ?>
    </div>

    <div id="head">
        <?php
        include "header.php";
        ?>

    </div>

    <div id="contenupage">

        <div id=DemanderConnexion>
            <h1>Veuillez vous connecter pour acceder à cette fonctionnalité</h1>
        </div>
        <div id=Contenu>
            <div id="barreGauche">
                <h1 class="titre">Messagerie</h1>
                <ul style="list-style: none;">
                    <li class="envoyermail" onclick=afficher(this);>
                        Envoyer Message
                    </li>
                    <li class="messagesRecus" onclick=afficher(this);>Messages reçus</li>
                    <li class="messagesEnvoyes" onclick=afficher(this);>Messages envoyés</li>
                    <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "manager") {
                            echo "style=display:none;";
                        } ?>class="voirMessages" onclick=afficher(this)>Voir tous les messages</li>
                </ul>
            </div>



            <div id="barreDroite">
                <div class="elt" id="envoyermail" style="display:block">
                    <h1 class="titre">Envoyer Message</h1>
                    <form action="messagerie/envoyermail.php" method="POST" id="form">
                        <label>Destinataire
                            <input name="destinataire" type="text" value="" placeholder="Destinataire" id="destinataire"> <br>
                        </label>
                        <label>Sujet
                            <input id=sujet type="text" name="sujet" placeholder="Sujet"> <br>
                        </label>
                        <label>Message
                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Veuillez écrire votre message"></textarea>
                        </label>

                        <input type="submit" id="Envoyer" value="Envoyer"/>

                    </form>



                </div>

                <div class="elt" id=messagesRecus style="display:none">
                    <h1 class="titre">Messages reçus:</h1><br>
                    <div id="ContenuMessages"></div>
                </div>
                <div class="elt" id="messagesEnvoyes" style="display:none">
                    <h1 class="titre">Messages envoyés:</h1><br>
                    <div id="ContenuMessagesEnvoyes"></div>
                </div>

                <div class="elt" id="voirMessages" style="display:none">
                    <h1 class="titre">Voir tous les messages</h1>
                    <div id="ContenuVoirMessages"></div>
                </div>
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