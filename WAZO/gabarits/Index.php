<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	<!-- Index.php -->
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		WAZO - Projet Techno. Web
	</title>
	<!-- D�claration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
</head>

<body>
<!-- On d�finit ici une section 'global' -->
<div id="global">
	
	<!-- DIV Ent�te -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>

	<!-- Section Contenu : on d�finit ici le contenu central de la page -->
	<div id="contenu">
		<h2>Bienvenue sur <B>WAZO</B> !</h2>
		<p>
		Ce portail permet de recenser les oiseaux observ�s dans la r�gion Aquitaine
		</p>	
		<p>
		Vous trouverez sur ce site des informations et des statistiques sur les oiseaux observ�s. 
		</p>		
	</div><!-- #contenu -->

	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	


</div><!-- #global -->

</body>
</html>
