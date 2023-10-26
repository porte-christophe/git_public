<!doctype html>
<html lang="fr" > 
	<head>
			<meta charset="utf-8" /> 
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Drwho actu</title>
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
			<link 	href="css/style_general.css" type="text/css"
					rel="stylesheet" media="screen"/> 
			<link 	href="css/style_galerie.css" type="text/css"
					rel="stylesheet" media="screen"/>
			<link 	rel="icon" type="image/jpg" href="images/logo.jpg" />
	</head>  
	<body> 
		<?php
			include 'config/connection.php';
			include 'php/header.php';
			include 'php/reseaux.php';
		?>
		<h2>Galerie</h2>
		<div id="galerie">
			<?php 
				foreach($dbh->query('SELECT * from dt_images') as $row) {
			        
			        echo '	<figure class="item" >
								<a href= "php/Drwho_actu_photo.php?id='.$row["id_img"].'">
									<img src="'.$row["src"].'" alt="'.$row["alter"].'"/>
								</a>
							</figure>';
				    }
			?>
		</div>
		<?php
			include 'php/footer.php';
		?>
	</body>
</html>