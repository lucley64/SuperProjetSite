<?php
  ?>

<head>
    <title>header</title>
    <link rel="stylesheet" href="/css/header.css">
    <script type="text/javascript" src="/js/header.js"></script>
</head>

<body>
    <header>
        <div class="titre">
            <h1> <a href="/index.php">That'a Challenge !</a></h1>
        </div>
        <div class="menuHeader">
            <table>
                <tr>
                    <th><a href="/index.php"><button class="buttonHeader">Accueil</button></a></th>
                    <th><a href="/php/actualites.php"><button class="buttonHeader ">Actualités</button></a></th>
                    <th><a href="/php/messagerie.php" ><button class="buttonHeader">Messagerie</button></a></th>
                    <th><a href="https://iapau.org/"><button class="buttonHeader">IA Pau</button></a></th>
                    <th onmouseover="changerLoupe()" onmouseout="remettreLoupe()" hidden><a href=""> <button class="buttonHeader"><img src="/src/loupe2.png" alt="loupe" id="loupe"> ______</button></a></th>
                    <?php
                    if (!isset($_SESSION['connected'])) {
                        echo '<th class="connexion"><a href="/php/connexion.php"><button class="buttonHeader connexion">Connexion</button></a></th>';
                    } else {
                        echo '<th class="connexion"><a href="/php/connexion.php"><button class="buttonHeader connexion">Deconnexion</button></a></th>';
                    }
                    ?>
                </tr>
            </table>
        </div>
    </header>
</body>
