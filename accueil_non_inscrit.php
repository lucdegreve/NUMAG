ZAZA & MC
<br/><br/>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		Accueil
	</title>
	<!-- Déclaration de la feuille de style -->
	
</head>

<body>
	<!-- DIV Entête-->
	
	
	<!-- On définit ici une section 'global' -->
	<div id="suggestions">
	Suggestions
	<br/>
	Connectez-vous pour avoir des suggestions
	<br/><br/>
	</div>

	<div id="actualites">
	Actualites
	<br/><br/>
	<!-- Passage au codage PHP -->
	<?php
	//Connexion au serveur A REMPLIR 
	$link=mysqli_connect('localhost', 'root', '', 'racine');
	//Afficher correctement les caractères spéciaux 
	mysqli_set_charset($link, 'UTF-8');
	//Construction des requêtes 
	$RequeteActu="SELECT titre_actu, url_actu, date_actu, desc_actu FROM Actualites 
	ORDER BY date_actu desc"; //On trie les actualités par ordre de publication 
	//Execution de la requête et production du recordset 
	$ResultActu=mysqli_query($link,$RequeteActu);
	//Traitement du recordset
	$TabActu=mysqli_fetch_all($ResultActu);
	$NbLignesActu=mysqli_num_rows($ResultActu);
	//Afficher les actualités les unes en dessous des autres 
	for ($i=0; $i<$NbLignesActu; $i++)
	{
		echo $TabActu[$i][0]." - ".$TabActu[$i][2];
		echo "<br/>";
		echo $TabActu[$i][1];
		echo "<br/>";
		echo $TabActu[$i][3];
		echo "<br/><br/>";
	}
	?>
	<br/><br/>
	</div>
	
	<div id="contacts">
	Contacts
	<br/>
	Connectez-vous pour avoir des contacts
	<br/><br/>
	</div>

	<!-- DIV Pied de page -->
	
	
</body>
</html>