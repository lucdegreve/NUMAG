<html>
<head>
	<meta charset="UTF-8">
	<!-- Proposition d'actualites en fonction du nombre de points obtenus à partir des préférences des utilisateurs -->
	
</head>
<body>
	<?php
	// Récuperation des scores des actualités ordonnés 
	// ATTENTION A BIEN RENTRER LE BON ID_IND ET NON SEULEMENT L'ID 1
	$query_SP="SELECT id_proj, SUM(Centres_interet.Compteur) AS Score_projet
	FROM Centres_interet, Mots_cles, mot_cle_projet 
	WHERE Centres_interet.id_ind=1 
	AND Centres_interet.id_mot_cle=Mots_cles.id_mot_cle 
	AND Mots_cles.id_mot_cle=Mot_cle_projet.id_mot_cle 
	GROUP BY id_proj
	ORDER BY Score_projet DESC"; // SA=Score actualité 
	$result_SP=mysqli_query($link,$query_SP);
	$tab_SP=mysqli_fetch_all($result_SP);
	$nblig_SP=mysqli_num_rows($result_SP);
	$nbcol_SP=mysqli_num_fields($result_SP);

	//$tab_SA : il suffit d'afficher $tab_SA puisque celui-ci est déjà trié dans l'ordre des points des actu 
	?>
</body>
</html> 