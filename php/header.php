<head>
    <link rel="stylesheet" href="css/header.css">
    <script type="text/javascript" src="js/header.js"></script>
</head>

<body>
    <header>
        <div class="titre">
            <h1> <a href="/index.php">That'a Challenge !</a></h1>
        </div>
        <div class="menuHeader">
            <table>
                <tr>
                    <th><a href="./index.php"><button class="buttonHeader">Accueil</button></a></th>
                    <th><a href=""><button class="buttonHeader ">Actualités</button></a></th>
                    <th><a href=""><button class="buttonHeader">À venir</button></a></th>
                    <th><a href="/php/messagerie.php" ><button class="buttonHeader">Messagerie</button></a></th>
                    <th><a href="https://iapau.org/"><button class="buttonHeader">IA Pau</button></a></th>
                    <th onmouseover="changerLoupe()" onmouseout="remettreLoupe()"><a href=""> <button class="buttonHeader"><img src="src/loupe2.png" alt="loupe" id="loupe"> ______</button></a></th>
                    <?php session_start();
                    if (!$_SESSION['connected']) {
                        echo('<th class="connexion"><a href="php/connexion.php"><button class="buttonHeader">Connexion</button></a></th>');
                    } else {
                        echo('<th class="connexion"><a href="php/connexion.php"><button class="buttonHeader">Deconnexion</button></a></th>');
                        echo('<th class="modifInfos"><a href="php/modifInfos.php.php"><button class="buttonHeader">modif Infos</button></a></th>');
                    }
                    ?>
                </tr>
            </table>
        </div>
    </header>
</body>