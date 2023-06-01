<!DOCTYPE html>
<html lang="fr">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/header.css">


</head>

<body>

    <div id="sidebarToggle" type="notToggled" class="barrecote" <?php if (!isset($_SESSION["userType"])) {
                                                                    echo "hidden";
                                                                } ?>>
        <img src="/src/liste.png" alt="iconeliste" class="iconBar">
    </div>
    <div id="sidebar" type="Toggled" class="barrecote">
        <ul>
            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "student") {
                    echo "hidden";
                } ?>>
                <a href="/php/page_projet.php">
                    <img src="/src/graphique.png" type="icone" alt="graphique">
                    <input type="bouton" value="Mes data challenges" class="buttonHeader side" onclick="document.location.href='/php/page_projet.php'" />
                </a>
            </li>
            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "manager") {
                    echo "hidden";
                } ?>>
                <a href="/php/accueilManager.php">
                    <img src="/src/graphique.png" type="icone" alt="graphique">
                    <input type="bouton" value="Mes data challenges" class="buttonHeader side" onclick="document.location.href='/php/page_projet.php'" />
                </a>
            </li>
            <li <?php if (!isset($_SESSION["userType"])) {
                    echo "hidden";
                } ?>>
                <a href="/php/messagerie.php">
                    <img src="/src/messagerie.png" type="icone" alt="">
                    <input type="bouton" value="Messagerie" class="buttonHeader side" onclick="document.location.href='/php/messagerie.php'" />
                </a>
            </li>
            <?php
            if (isset($_SESSION['userType']) && $_SESSION['userType'] != 'admin') {
                echo '<li>' .
                    '<a href="/php/modifInfos.php">' .
                    '<img src="/src/modifier_profil.png" type="icone" alt="">' .
                    '<input type="bouton" value="Modifier profil" class="buttonHeader side" onclick="document.location.href=\'/php/modifInfos.php\'"/>' .
                    '</a>' .
                    '</li>';
            }
            ?>
            <?php
            if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
                echo '<li>' .
                    '<a href="/php/modifInfosAdmin.php">' .
                    '<img src="/src/modifier_profil.png" type="icone" alt="">' .
                    '<input type="bouton" value="Modifier profil" class="buttonHeader side" onclick="document.location.href=\'/php/modifInfos.php\'"/>' .
                    '</a>' .
                    '</li>';
            }
            ?>
            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "student") {
                    echo "hidden";
                } ?>>
                <a href="/php/creationEquipe.php"><img src="/src/creer-removebg-preview.png" type="icone" alt=""><input type="button" class="buttonHeader side" value="Creer une équipe" onclick="document.location.href='/php/creationEquipe.php'"></a>
            </li>

            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "admin") {
                    echo "hidden";
                } ?>>
                <a href="/php/creationDataChallenge.php">
                    <input type="button" value="Creer data challenge" class="buttonHeader side" id="btndata" onclick="document.location.href='/php/creationDataChallenge.php'" cols="5" rows="2"></input>

                </a>
            </li>
            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "admin") {
                    echo "hidden";
                } ?>>
                <a href="/php/modifDataChallenge.php">
                    <input type="button" value="Modifier data challenge" class="buttonHeader side" id="btndata" onclick="document.location.href='/php/modifDataChallenge.php'" cols="5" rows="2"></input>
                </a>
            </li>
            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "admin") {
                    echo "hidden";
                } ?>>
                <a href="/php/creationAdmin.php">
                    <input type="button" value="Creer nouveau compte" class="buttonHeader side" id="btnadmin" onclick="document.location.href='/php/creationAdmin.php'" cols="5" rows="2"></input>
                </a>
            </li>
            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "admin") {
                    echo "hidden";
                } ?>>
                <a href="/php/suppression.php">
                    <input type="button" value="Supprimer un compte" class="buttonHeader side" id="btnadmin" onclick="document.location.href='/php/creationAdmin.php'" cols="5" rows="2"></input>
                </a>
            </li>
            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "admin") {
                    echo "hidden";
                } ?>>
                <a href="/php/suppressionDatas.php">
                    <input type="button" value="Supprimer un Data Challenge" class="buttonHeader side" id="btnadmin" onclick="document.location.href='/php/creationAdmin.php'" cols="5" rows="2"></input>
                </a>
            </li>
            <li <?php
                if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "manager") {
                    echo "hidden";
                }
                ?>>
                <a href="/php/creationForm.php">
                    <input type="button" value="Creer nouveau questionnaire" class="buttonHeader side" id="btnquest"></input>
                </a>
            </li>
            <?php
            if (isset($_SESSION["userType"]) && $_SESSION["userType"] == "student") {
                $connexion = new PDO("mysql:host=localhost;dbname=datas", "thatachallenge", "thatachallenge123");
                $req = $connexion->query(
                    "SELECT `Equipe`.`id`, `Equipe`.`nomEquipe`,`Equipe`.`capitaine` FROM `Equipe` JOIN `Participe` ON `Equipe`.`id` = `Participe`.`idEquipe` WHERE `Participe`.`idUser` = '$_SESSION[username]'"
                );
                $res = $req->fetchAll();
            }
            ?>
            <li <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "student" || !isset($res[0])) {
                    echo "hidden";
                } ?>>
                <a href="/php/ajoutEquipeUser.php"><img src="/src/ajouter-removebg-preview(1).png" type="icone" alt=""><input type="button" class="buttonHeader side" value="Ajouter des membres a votre equipe" onclick="document.location.href='/php/ajoutEquipeUser.php'"></a>
            </li>
            <li <?php
                if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "student" || !isset($res[0])) {
                    echo "hidden";
                }
                ?>>
                <select class="buttonHeader side" name="mesEquipes" id="mesEquipes">
                    <option value="" disabled selected>Mes équipes</option>
                    <?php
                    if (isset($_SESSION["userType"]) && $_SESSION["userType"] == "student") {
                        foreach ($res as $key => $value) {
                            echo "<option value=\"$value[id]\"> $value[nomEquipe] </option>";
                        }
                    }
                    ?>
                </select>

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


        mesEquipes.onchange = goEquipe;
        /**
         * @param {Event} ev
         */
        function goEquipe(ev) {
            /**
             * @type {HTMLSelectElement}
             */
            const select = ev.target;

            const opt = select.selectedOptions[0];

            if (select.selectedIndex != 0)
                window.location.assign(`/php/detailsEquipe.php?id=${opt.value}`);
        }
    </script>
</body>

</html>