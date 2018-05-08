<?php Include("Entete-VALIDE.php");?>
<?php //Session_start();
	//$id_ind_co=$_SESSION["id_ind_co"];
	//Connexion au serveur
	include'Connexion_bdd.php';
	//Afficher correctement les caractères spéciaux
	
?>

	<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		Tutoriel
	</title>
</head>
	<h1> Tutoriel </h1>
	<br/>
	
	<div id="guide">
	Vous trouverez ci-dessous un guide d'utilisation de la plateforme:
	<br/>
	<br/>
	<iframe src="Informations Abeilles.pdf" width="800" height="800"></iframe>
	</div>
 	<br/>
	
	<div id="video">
	Et quelques vidéos pour une prise en main plus facile !
	<br/>
	<br/>	
	<object type="application/x-mplayer2" style="width: 700px; height: 500px;" data="tutoriel.wmv">
	<param name="tutoriel" value="tutoriel.wmv"/>
	</object>
	</div>
	<br/>
	
	Bonne navigation sur RACINE ! 