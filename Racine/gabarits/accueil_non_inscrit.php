ZAZA & MC
<br/><br/>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		Accueil
	</title>
	<B>ACCUEIL</B>
	<br/><br/>
	<!-- Déclaration de la feuille de style -->
	
</head>

<body>
	<!-- DIV Entête-->
	
	
	<!-- On définit ici une section 'suggestions' -->
	<div id="suggestions">
	<B>Suggestions</B>
	<br/>
	Connectez-vous pour avoir des suggestions
	<br/><br/>
	</div>

	<!-- On définit ici une section 'actualites' -->
	<div id="actualites">
	<B>Actualites</B>
	<br/><br/>
	<!-- Passage au codage PHP -->
	<?php
	//Connexion au serveur
	$link=mysqli_connect('localhost', 'root', '', 'racine');
	//Afficher correctement les caractères spéciaux 
	mysqli_set_charset($link, 'UTF-8');
	//Construction des requêtes 
	$RequeteActu = "SELECT titre_actu, url_actu, date_actu, desc_actu FROM Actualites 
	ORDER BY date_actu desc"; //On trie les actualités par ordre de publication 
	//Execution de la requête et production du recordset 
	$ResultActu=mysqli_query($link,$RequeteActu);
	//Traitement du recordset
	$TabActu=mysqli_fetch_all($ResultActu);
	$NbLignesActu=mysqli_num_rows($ResultActu);
	//Afficher les actualités les unes en dessous des autres 
	for ($i=0; $i<$NbLignesActu; $i++)
	{
		$date = $TabActu[$i][2];
		$jour = substr($date, -2, 2);
		$mois = substr($date, -5, 2);
		$annee = substr($date, -10, 4);
		echo "<B>".$TabActu[$i][0]."</B> - ".$jour."/".$mois."/".$annee;
		echo "<br/>";
		echo "<A href = ".$TabActu[$i][1]."> ".$TabActu[$i][1]." </A>";
		echo "<br/>";
		echo $TabActu[$i][3];
		echo "<br/><br/>";
	}
	?>
	<br/><br/>
	</div>
	
	<!-- On définit ici une section 'contacts' -->
	<div id="contacts">
	<B>Contacts</B>
	<br/>
	Connectez-vous pour avoir des contacts
	<br/><br/>
	</div>

	<!-- DIV Pied de page -->
	
	
</body>

</html>