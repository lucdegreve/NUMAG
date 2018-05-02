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
	<br/><br/>
	</div>

	<div id="contacts">
	Contacts
	<br/><br/>
	<!-- Passage au codage PHP -->
	<?php
	//Connexion au serveur A REMPLIR 
	$link = mysqli_connect('localhost', 'root', '', 'racine');
	//Afficher correctement les caractères spéciaux 
	mysqli_set_charset($link, 'UTF-8');
	//Construction de la requête récupérant les contacts avec qui le compte a intéragi
		//RECUPERER L'IDENTIFIANT DU COMPTE (PAGE PRECEDENTE = CONNEXION) 
	$RequeteContacts = "SELECT CASE WHEN id_dest=1 THEN id_expe ELSE id_dest END as id_autre_ind, 
	CASE WHEN id_dest=1 THEN 'Message reçu' ELSE 'Message envoyé' END as type_msg, 
	max(date_mp) as date_derniere_interaction 
	FROM individus i, messages_prives m WHERE m.id_dest=1 OR m.id_expe=1 
	GROUP BY id_autre_ind 
	ORDER BY date_derniere_interaction desc";
	//Execution de la requete et production du recordset
	$ResultContacts = mysqli_query($link,$RequeteContacts);
	//Traitement du recordset
	$TabContacts = mysqli_fetch_all($ResultContacts);
	$NbLignesContacts=mysqli_num_rows($ResultContacts);
	//Afficher les contacts les uns en dessous des autres 
	for ($i=0; $i<$NbLignesContacts; $i++)
	{
		//Récupérer le prénom et le nom du contact à l'aide de son identifiant
		$RequeteNom = "SELECT prenom, nom_ind FROM individus WHERE id_ind=".$TabContacts[$i][0];
		$ResultNom = mysqli_query($link,$RequeteNom);
		$TabNom = mysqli_fetch_all($ResultNom);
		echo $TabNom[0][0]." ".$TabNom[0][1];
		echo "<br/>";
		echo $TabContacts[$i][1]." - ".$TabContacts[$i][2];
		echo "<br/><br/>";
	}
	?>
	</div>

	<div id="actualites">
	Actualites
	<br/><br/>
	</div>

	<!-- DIV Pied de page -->
	
	
</body>
</html>