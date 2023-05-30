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
		<img src="/src/liste.png" alt="iconeliste" class="iconBar">
	</div>
	<div id="sidebar" type="Toggled" class="barrecote">
		<ul>
			<li>
				<img src="/src/graphique.png" type="icone"> 
				<input type="bouton" value="Projet" class="buttonHeader side"> 
			</li>
			<li>				
				<img src="/src/messagerie.png" type="icone"> 
				<input type="bouton" value="Messagerie" class="buttonHeader side"> 
			</li>
			<li>
				<img src="/src/modifier_profil.png" type="icone"> 
				<input type="bouton" value="Modifier profil" class="buttonHeader side"> 
			</li>
			<li>
				<textarea  <?php if (!isset($_SESSION["userType"])||$_SESSION["userType"]!="admin"){echo "style=display:none;";}?> class="buttonHeader side" id="btndata" name="" id="" cols="5" rows="2">Creer data challenge</textarea>
				
			</li>
		</ul>
	</div>






	<script>
		var sidebar = document.getElementById('sidebar');
		var sidebarToggle = document.getElementById('sidebarToggle');

		sidebarToggle.addEventListener('click',function()
		{
			sidebar.classList.toggle('active');
		});

		sidebar.addEventListener('click',function()
		{
			sidebar.classList.toggle('active');
		});




	</script>
</body>

</html>
