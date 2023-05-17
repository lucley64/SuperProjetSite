<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>/*
		form[type="principal"] {
			width: 310px;
			margin: 30px;
			height: 500px;
			padding: 50px ;
			background-color: rgba(255, 255, 255, 0.85);
			border: 3px solid rgb(0, 0, 0) ;
			box-shadow: 0px 0px 15px #ffffff;


			border-radius: 0px;
			text-align: center;
		}

		h1 {
  			font-family: 'Montserrat', arial;
			font-size: 40px;
  			text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
		}
		
		div[type="cadre"] {
			width: 50%;
			height: 680px;
			margin: auto;
			border: 3px solid rgb(0, 0, 0) ;
			padding: 20px;
			background-color: rgba(250,250,250,0.5);
			border-radius: 10px;
		}


		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
			text-align: center;
		}

		input:focus::placeholder {
			color: transparent;
		}

		input[type="text"], input[type="email"], select, textarea {
			width: 90%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 10px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}


		.div-background {
			background-image: url('Orangerie.jpg');
			background-size: cover;
			background-position: center center;
			background-repeat: no-repeat;
		}


		.div-background-blanc {
			background-color: rgb(255, rgb(0, 255, 0), rgb(0, 0, 255));
		}
*/
        #sidebar
        {
            display: none;
        }

        #sidebar.active
        {
            display: block;
        }
        
	</style>

</head>

<body>

    <div id="sidebar">
		<ul>
			<li><a href="#">messagerie</a></li>
			<li><a href="#">Modifier profil</a></li>
			<li><a href="#">Projet</a></li>
		</ul>
	</div>




%%%%%%  JAVASCRIPT  %%%%%%
  
  
  	<script>
		var sidebar = document.getElementById('sidebar');

		sidebar.addEventListener('click',function()
		{
			sidebar.classList.toggle('active');
		});



  	</script>
</body>

</html>