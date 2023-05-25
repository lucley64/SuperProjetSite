<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" hreg="/css/header.css">


</head>

<body>

    <div id="sidebarToggle" type="notToggled" class="barrecote">
        <img src="src/liste.png" alt="iconeliste">
    </div>
    <div id="sidebar" type="Toggled" class="barrecote">
        <ul>
            <li>
                <table>
                    <tr>
                        <th><img src="/src/graphique.png" type="icone" alt="graphique"></th>
                        <th><input type="bouton" value="Projet" class="buttonHeader side"></th>
                    </tr>
                </table>
            </li>
            <li>
                <table>
                    <tr>
                        <th><img src="/src/messagerie.png" type="icone" alt="messagerie"></th>
                        <th><input type="bouton" value="Messagerie" class="buttonHeader side"></th>
                    </tr>
                </table>
            </li>
            <li>
                <table>
                    <tr>
                        <th><img src="/src/modifier_profil.png" type="icone" alt="modifier profil"></th>
                        <th><input type="bouton" value="Modifier profil" class="buttonHeader side"></th>
                    </tr>
                </table>
            </li>
        </ul>
    </div>






    <script>
        var sidebar = document.getElementById('sidebar');
        var sidebarToggle = document.getElementById('sidebarToggle');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        sidebar.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>
