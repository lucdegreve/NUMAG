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
	Suggestions	<br/>
	<br/><br/>
	Connectez-vous pour avoir des suggestions 
	</div>

	<div id="contacts">
	Contacts <br/>
	<br/><br/>
	Connectez-vous pour avoir des contacts
	</div>

	<div id="actualites">
	Actualites <br/>
	<!-- Passage au codage PHP -->
	<?php
	//Connexion au serveur A REMPLIR 
	$link=mysqli_connect();
	//Afficher correctement les caractères spéciaux 
	mysqli_set_charset($link, 'UTF-8');
	//Construction des requêtes 
	$requete_actu="SELECT titre_actu, url_actu, date_actu, desc_actu
	FROM Actualites 
	ORDER BY date_actu DESC"; //On trie les actualités par ordre de publication 
	//Execution de la requête et production du recordset 
	$result=mysqli_query($link,$requete_actu);
	?>
	</div>



	<!-- DIV Pied de page -->
	
</body>
</html>