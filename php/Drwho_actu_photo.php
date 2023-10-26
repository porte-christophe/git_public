<!doctype html>
<html lang="fr" > 
	<head>
			<meta charset="utf-8" /> 
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Drwho actu</title>
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
			<link 	href="/css/style_general.css" type="text/css"
					rel="stylesheet" media="screen"/>
			<link 	href="/css/style_galerie_photo.css" type="text/css"
					rel="stylesheet" media="screen"/>
			<link rel="icon" type="image/jpg" href="images/logo.jpg" />
	</head>  
	<body> 
		<?php
			include '../config/connection.php';
			include 'header.php';
			$stmt = $dbh->prepare('SELECT * from dt_images where id_img=:id');
			$stmt->bindParam(':id',$_GET["id"], PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetchAll();
		?>
		
		<div>
			<a href="../Drwho_actu4.php"><h2>Galerie</h2></a>
			
			<figure>
				<img src=<?php echo utf8_encode($result[0]["src"])?> alt=<?php echo utf8_encode($result[0]["alter"])?>/>
				<figcaption><h3><?php echo utf8_encode($result[0]["titre"])?></h3></figcaption>
			</figure>
		</div>
		<?php
			include 'footer.php';
		?>
	</body>
</html>