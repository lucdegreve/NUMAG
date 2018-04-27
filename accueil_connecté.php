ZAZA & MC
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		Accueil
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="RACINE/css_accueil.css" media="all" />
</head>

<body>
	<!-- DIV Entête-->
	
	
	<!-- On définit ici une section 'global' -->
	<div id="suggestions">
	Suggestions
	div>

	<div id="contacts">
	Contacts
	<!-- Passage au codage PHP -->
	<?php
	//Connexion au serveur A REMPLIR 
	$link=mysqli_connect();
	//Afficher correctement les caractères spéciaux 
	mysqli_set_charset($link, 'UTF-8');
	//Construction des requêtes RECUPERER L'IDENTIFIANT DU COMPTE (PAGE PRECEDENTE = CONNEXION) 
	$requete1_conv_privee="SELECT distinct id_dest, id_expe FROM Individus, Messages_prives
	WHERE Individus.id_ind=... 
	AND (Messages_prives.id_dest=Individus.id_ind OR Messages_prives.id_expe=Individus.id_ind)"
	$requete2_conv_privee="SELECT nom_ind, prenom FROM Individus
	WHERE id_ind =..."
	
	$requete_conv_grp="SELECT titre_mp FROM Messages_prives, Individus
	WHERE 
	AND length(titre_mp)>0 
	AND (Messages_prives.id_dest=Individus.id_ind OR Messages_prives.id_expe=Individus.id_ind)"
	
	?>
	</div>

	<div id="actualites">
	Actualites
	</div>



	<!-- DIV Pied de page -->
	
</body>
</html>