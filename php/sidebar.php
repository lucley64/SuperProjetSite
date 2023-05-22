<!DOCTYPE html>
<html lang="fr">

<head>
  	<meta charset="UTF-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  	<title>Document</title>
  	<style>

	</style>

</head>

<body>

	<div id="sidebarToggle" type="notToggled">
		
	</div>
    <div id="sidebar" type="Toggled">
		<ul>
			<li><input type="bouton" value="créer un compte"></li>
			<li>Modifier profil</li>
			<li>Projet</li>
		</ul>
	</div>




  
  
  	<script>
		var sidebar = document.getElementById('sidebar');
		var sidebarToggle = document.getElementById('sidebarToggle');

		sidebarToggle.addEventListener('click',function()
		{
			sidebar.classList.toggle('active');
			sidebarToggle.classList.toggle('active');
		});

		sidebar.addEventListener('click',function()
		{
			sidebarToggle.classList.toggle('active');
			sidebar.classList.toggle('active');
		});




  	</script>
</body>

</html>