<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
	<a href="https://youtu.be/BP2dJiYXX_I?t=6" style="position: absolute; top: 42%; right: 69%; z-index: 9999999;  font-size: 2px;">a</a>
	<link rel="stylesheet" href="/css/sidebar.css">
	<link rel="stylesheet" hreg="/css/header.css">


</head>

<body>

	<div id="sidebarToggle" type="notToggled" class="barrecote">
		<img src="/src/liste.png" alt="iconeliste" class="iconBar">
	</div>
	<div id="sidebar" type="Toggled" class="barrecote">
		<ul>
			<li>
				<img src="/src/graphique.png" type="icone" alt="graphique">
				<input type="bouton" value="Mes data challenges" class="buttonHeader side" onclick="document.location.href='/php/page_projet.php'" />
			</li>
			<li>
				<img src="/src/messagerie.png" type="icone" alt="">
				<input type="bouton" value="Messagerie" class="buttonHeader side" onclick="document.location.href='/php/messagerie.php'" />
			</li>
			<?php
			if (isset($_SESSION['userType'])) {
				echo '<li>' .
					'<img src="/src/modifier_profil.png" type="icone" alt="">' .
					'<input type="bouton" value="Modifier profil" class="buttonHeader side" onclick="document.location.href=\'/php/modifInfos.php\'"/>' .
					'</li>';
			}
			?>
			<li>
				<input type="button" value="Creer data challenge" <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "admin") {
											echo "style=display:none;";
										} ?> class="buttonHeader side" id="btndata" onclick="document.location.href='/php/creationDataChallenge.php'" cols="5" rows="2"></input>

			</li>
			<li>
				<input type="button" value="Creer nouveau compte<" <?php if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != "admin") {
											echo "style=display:none;";
										} ?> class="buttonHeader side" id="btnadmin" onclick="document.location.href='/php/creationAdmin.php'" cols="5" rows="2"></input>
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