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
			<li><input type="bouton" value="Projet" class="buttonHeader side"></li>
			<li><input type="bouton" value="Messagerie" class="buttonHeader side"></li>
			<li><input type="bouton" value="Modifier profil" class="buttonHeader side"></li>
			<li><input type="bouton" value="Creer challenge" class="buttonHeader side" style="display:none;"></li>
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