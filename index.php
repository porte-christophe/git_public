<!doctype html>
<html lang="fr"> 
	<head>
			<meta charset="utf-8" /> 
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Drwho actu</title>
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
			<link 	href="css/style_general.css" type="text/css"
					rel="stylesheet" media="screen"/>
			<link 	href="css/style_accueil.css" type="text/css"
					rel="stylesheet" media="screen"/>
			<link	href="css/style_accueil_inf800.css"
					rel="stylesheet"  media="(max-width: 800px)"/>
			<link 	rel="icon" type="image/jpg" href="images/logo.jpg" /> 
	</head>  
	<body> 
		<?php
			require __DIR__ . "/vendor/autoload.php";    
			use Goutte\Client;
			use Symfony\Component\BrowserKit\Cookie;
			use Symfony\Component\BrowserKit\CookieJar;

			include 'php/header.php';
			include 'php/reseaux.php';


			// create cookies and add to cookie jar
			$cookieJar = new CookieJar;
			$cookieJar->set(new Cookie('AEC', 'ARSKqsLDjrNj8rsnvZLZp-kMHfI6At8ROTAoRDL41A8hTSD48hatFf5Yfpo', strtotime('+1 day'), '/', '.google.fr', true, true, false, 'Lax'));
			$cookieJar->set(new Cookie('CONSENT', 'PENDING+998', strtotime('+1 day'), '/', '.google.fr', true, false, false, null));
			$cookieJar->set(new Cookie('DV', 'Qw911_d_38MpUN_AlAKmBhc4nHqjWxh-euCA1HO5fQAAAAA', strtotime('+1 day'), '/', 'www.google.fr', false, false, false, null));
			$cookieJar->set(new Cookie('NID', '511=tqiJpAthad7PnkTACtlsdKCtvDQlQqJQt1KQ3tr9CKj00s1a3UD1-nqX3PLPRfFRUqL129l23xbNp_4dptgaH4rpFb1nd03WXKJLTv5RhCyOAVLtxYoH9SDkwWrdjtNH9eRfOcqKHXIG-MghsToF9922Q6aMpNE3PZnq_X1TYlI', strtotime('+1 day'), '/', '.google.fr', true, true, false, null));
			$cookieJar->set(new Cookie('SOCS', 'CAISNQgCEitib3FfaWRlbnRpdHlmcm9udGVuZHVpc2VydmVyXzIwMjMwMTEwLjA2X3AwGgJmciACGgYIgKeSngY', strtotime('+1 day'), '/', '.google.fr', true, false, false, 'Lax'));


			
			
			

			

			$client = new Client(null, null, $cookieJar);
			$crawler = $client->request('GET', 'https://www.google.fr/search?q=%22doctor+who%22&tbm=nws&hl=fr');
			// mb_encode_numericentity ==> ? à la place des les avec des accents
			
			$res = $crawler->filter('.Gx5Zad.fP1Qef.xpd.EtOod.pkphOe')->each(function ($node) {        
				
				$lien = $node->filter('a')->attr('href');
				$pospb = stripos($lien, "//");
				$pospb = $pospb + 2 ;
				$lien = substr($lien, $pospb);
				$pospb = stripos($lien, "&sa");
				$lienPropre = substr($lien, 0, $pospb);
				$titre = $node->filter('.BNeawe.vvjwJb.AP7Wnd')->innerText();
				$i = 0;
				$metadesc = $node->filter('.BNeawe.s3v9rd.AP7Wnd')->each(function ($subnode,$i) {
					if ($i == 0) {
						$i = 1 ;
					}elseif(strlen($subnode->innerText())>20){
						return $subnode->innerText();
					}
				});
				if ($metadesc[1] != null) {
					$metadesc = $metadesc[1];
				}
				return [$lienPropre,$titre,$metadesc];
			});
		?>
		








		<div id="avertissement">Avertissement: certains des articles ci-dessous sont en anglais!</div>
		
		<div id="main">
			<div id="inmain_liens">
				<h3>Liens clés : </h3>
			 	<ul id="liensCle">
					<li class="liens li1">
						<a href="https://fr.wikipedia.org/wiki/Liste_des_%C3%A9pisodes_de_Doctor_Who_(1963%E2%80%931989)" target="_blank">série 1 (1963-1989)</a>
					</li>
					<li class="liens li1">
						<a href="https://fr.wikipedia.org/wiki/Le_Seigneur_du_Temps" target="_blank">film (1996)</a>
					</li>
					<li class="liens li1">
						<a href="http://doctorwhoclassicfr.hautetfort.com/" target="_blank">"Classics"</a>
					</li>
					<li class="liens li1">
						<a href="https://fr.wikipedia.org/wiki/Liste_des_%C3%A9pisodes_de_Doctor_Who_(depuis_2005)" target="_blank">série 2 (2005-....)</a>
					</li>
				</ul>
			</div>
			<div id="inmain_articles">
				<h2>Les actus</h2>
				<section id="news">
					<?php 
					foreach ($res as $key => $value) {
						if (gettype($value[2])=='array') {
							$value[2] = '';
						}
						echo "<article class='cat_actu_serie'><h3>".$value[1]."</h3><p>".$value[2]."<br/></p><a href='https://".$value[0]."' target='_blank'>plus d'info</a></article>";
					}
					
					?>
					
					
				</section>
				<br/>
				<hr>
				<h2>Le site</h2>
				<section>
					<article class="cat_actu_site">
						<p>Le site étant en pleine évolution des modifications sont à venir!</p>
					</article>		
				</section>
				<br/>
			</div>
		</div>
		<div>
				<h3>Nos articles</h3>
				<ul>
					<li class="li2">
						<a href="/Drwho_actu2.php">Présentation</a>
					</li>
				</ul>
		</div>
		<?php 
			include 'php/footer.php';
		?>
	</body>
</html>
