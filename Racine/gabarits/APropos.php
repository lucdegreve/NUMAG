<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Apropos.php -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<?php
	header('Content-Type: text/html; charset=UTF-8');
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		WAZO - Projet Techno. Web
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
</head>
<body>

<!-- On définit ici une section 'global' -->
<div id="global">
	
	<!-- DIV Entête -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>

	<!-- Section Contenu : on définit ici le contenu central de la page -->
	<div id="contenu">
		<h2>A propos de ce site...</h2>
		<p>
		Ce site est un exemple de corrigé du projet de <I><B>Technologies du Web</B></I> proposé aux élèves ingénieurs de <B>Bordeaux Sciences Agro</B> en 2013-2014.
		</p>
		<p>
		Etant en pleine redéscente de glycémie suite à Pâques je n'ai pas réagi à temps pour placer ce site sur le serveur Filezilla, veuillez m'excuser de vous le rendre sur clef USB.
		Une attention particulière a été portée aux aspects algorithmiques ainsi qu'à la structuration et à la présentation du code.
		La mise en forme repose quant à elle sur la technologie CSS. Les fichiers de style sont fortement inspirés de ceux proposés par 
		&copy; 2008
			<a href="http://www.elephorm.com">Elephorm</a> et
			<a href="http://www.alsacreations.com">Alsacréations</a>
		</p>
	</div>

	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	


</div>

</body>
</html>
