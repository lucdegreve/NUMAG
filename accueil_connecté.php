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
	$requete_contacts="SELECT CASE WHEN id_dest=1 THEN id_expe ELSE id_dest END as id_autre_ind, 
	CASE WHEN id_dest=1 THEN 'msg reçu' ELSE 'msg envoyé' END as type_msg, 
	max(date_mp) as date_derniere_interaction , texte 
	FROM individus i, messages_prives m WHERE i.id_ind=1 AND (m.id_dest=i.id_ind OR m.id_expe= i.id_ind) 
	GROUP BY id_autre_ind 
	ORDER BY date_derniere_interaction desc"	
	?>
	</div>

	<div id="actualites">
	Actualites
	</div>



	<!-- DIV Pied de page -->
	
</body>
</html>