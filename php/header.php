<head>
    <link rel="stylesheet" href="css/header.css">
    <script type="text/javascript" src="js/header.js"></script>
</head>

<body>
    <header>
        <div class="titre">
            <h1> <a href="index.php">That'a Challenge !</a></h1>
        </div>
        <div class="menuHeader">
            <table>
                <tr>
                    <th><a href="index.php"><button class="buttonHeader">Accueil</button></a></th>
                    <th><a href=""><button class="buttonHeader ">Actualités</button></a></th>
                    <th><a href=""><button class="buttonHeader">À venir</button></a></th>
                    <th><a href="" ><button class="buttonHeader">Archives</button></a></th>
                    <th><a href="https://iapau.org/"><button class="buttonHeader">IA Pau</button></a></th>
                    <th><a href=""><button class="buttonHeader">Tah la barre de recherche</button></a></th>
                    <th><a onclick="popup()"><button class="buttonHeader">Se connecter</button></a></th>
                <div id="popup"><?php include("php/connexion.php");?></div>
                </tr>
            </table>
        </div>
    </header>
</body>