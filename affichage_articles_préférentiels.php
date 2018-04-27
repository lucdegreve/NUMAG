<html>
<head>
	<meta charset="UTF-8">
	<!-- Proposition d'actualites en fonction du nombre de points obtenus à partir des préférences des utilisateurs -->
	
</head>
<body>
	<?php
	// Récuperation des scores des actualités ordonnés 
	$query_SA="SELECT id_actu, SUM(Centres_interet.Compteur) as Score_actu
	WHERE Centres_interet.id_mot_cle=Mots_cles.id_mot_cle
	AND Mots_cle.id_mot_cle=Mot_cle_actualite.id_mot_cle
	GROUP BY id_actu
	ORDER BY Score_actu"; // SA=Score actualité 
	$result_SA=mysqli_query($link,$query_SA);
	$tab_SA=mysqli_fetch_all($result_SA);
	$nblig_SA=mysqli_num_rows($result_SA);
	$nbcol_SA=mysqli_num_fields($result_SA);

	//$tab_SA : il suffit d'afficher $tab_SA puisque celui-ci est déjà trié dans l'ordre des points des actu 
	?>
</body>
</html> 