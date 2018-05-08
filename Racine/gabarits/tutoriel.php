<?php Include("Entete-VALIDE.php");?>
<?php //Session_start();
	//$id_ind_co=$_SESSION["id_ind_co"];
	//Connexion au serveur
	include'Connexion_bdd.php';
?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		Tutoriel
	</title>
</head>

<body>

<div class="container-fluid">
	<br/>
	<div class="row">
		<!-- Titre -->
		<div class="col-lg-1">

			</div>
		<div class="col-lg-3">
			<h1>Tutoriel</h1>
		</div>
	</div>
	<br/>
	<div class="row">
		<!-- Section Guide -->
		<div class="col-lg-7">
			<div id="guide">
				<div class="jumbotron HauteurMax">
					<h3> Guide d'utilisation de RACINE </h3>
					<hr class="my-4">
					Vous trouverez ci-dessous un guide d'utilisation de la plateforme:
					<br/><br/>
					<iframe src="video/guide.pdf" width="650" height="500"></iframe>
					<br/><br/>
				</div>
			</div>
		</div>
		<!-- Section Vidéos -->
		<div class="col-lg-5">
			<div id="video">
				<div class="jumbotron HauteurMax">
					<h3> Vidéos </h3>
					<hr class="my-4">
					Et quelques vidéos pour une prise en main plus facile ! Vous pouvez les visualiser directement sur votre navigateur, ou les télécharger sur votre ordinateur.
					<br/><br/>
					<h5> 1ère vidéo </h5>
					<br/>
					<a href="video/Stageetconnexionfini.htm" target="_blank" > Lien vers la 1ère vidéo </a>
					<br/>
					<a href="video/Stageetconnexionfini.exe" > Téléchargement de la 1ère vidéo </a>
					<br/><br/>
					<h5> 2ème vidéo </h5>
					<br/>
				</div>
			</div>
		</div>
	</div>	
</div>
	
	<h3> Bonne navigation sur RACINE ! </h3>
	
</body>