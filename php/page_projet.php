
<!DOCTYPE html>
<?php
    $sql = "SELECT nomEquipe FROM Equipe JOIN Participe ON Equipe.idEquipe = Participe.id WHERE Participe.idUser= {$_SESSION['username']}"
?> 

<html lang="fr">

<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/projet.css">
    <title>That'a Challenge</title>
</head>

<body>
    <img class="background" src="/src/pyrenees.jpg" alt="pyr">
    <div id="sidebarr">
        <?php
        include "sidebar.php";
        ?>
    </div>
    <div id="contenupage">
        <?php  
        include "header.php";
        ?>
        
        <div id="principal" class="principal">
            <a href="/php/messagerie.php" >
                <button class="projet"> 
                    <div class="barreMilieu"><p>projet : <?php echo '' . $_SESSION['firstName'] . '' ?><p></div>
                    <ul>
                        <li>équipe : </li>
                        <li>date de fin : </li>
                        <li>description : </li>
                    </ul>
                </button>            
            </a>
        </div>
    </div>
    <script>
        const container = document.querySelector("#principal");

        // Boucle for pour parcourir les données et créer une div pour chaque élément
        for (let i = 0; i < data.length; i++) {
            const element = data[i];

            // Création de la div
            const div = document.createElement("div");

            // Ajout du contenu dans la div
            div.textContent = `${element.nom}: ${element.valeur}`;

            // Ajout de la div dans le conteneur
            container.appendChild(div);
        }
    </script>

</body>

</html>