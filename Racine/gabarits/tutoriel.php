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

<h1> Tutoriel </h1>
<br/><br/>
	
	<!-- Section à placer à gauche -->
	<div id="guide">
		Vous trouverez ci-dessous un guide d'utilisation de la plateforme:
		<br/><br/>
		<iframe src="video/guide.pdf" width="800" height="800"></iframe>
		<br/><br/>
	</div>
	
	<!-- Section à placer à droite, vidéos les unes en dessous des autres -->
	<div id="video">
		Et quelques vidéos pour une prise en main plus facile ! Vous pouvez les visualiser directement sur votre navigateur, ou les télécharger sur votre ordinateur.
		<br/><br/>
		<h3> 1ère vidéo </h3>
		<br/>
		<a href="video/Stageetconnexionfini.htm" target="_blank" > Lien vers la 1ère vidéo </a>
		<br/>
		<a href="video/Stageetconnexionfini.exe" > Téléchargement de la 1ère vidéo </a>
		<br/>
	</div>
	
	<h3> Bonne navigation sur RACINE ! </h3>
	
</body>