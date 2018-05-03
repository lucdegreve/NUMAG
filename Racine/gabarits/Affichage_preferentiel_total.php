<html>
<head>
	<meta charset="UTF-8">
	<!-- Proposition d'actualites en fonction du nombre de points obtenus à partir des préférences des utilisateurs -->
	
</head>
<body>
	<?php
	$link=mysqli_connect('localhost', 'root', '', 'racine');
	//INCLUDE 'Connexion_bdd.php' ;
	// Récuperation des scores des actualités ordonnées 
	// ATTENTION A BIEN RENTRER LE BON ID_IND ET NON SEULEMENT L'ID 1
	$query_SA="SELECT id_actu, SUM(Centres_interet.Compteur) AS Score_actu 
	FROM Centres_interet, Mots_cles, mot_cle_actu 
	WHERE Centres_interet.id_ind=1 
	AND Centres_interet.id_mot_cle=Mots_cles.id_mot_cle 
	AND Mots_cles.id_mot_cle=Mot_cle_actu.id_mot_cle 
	GROUP BY id_actu 
	ORDER BY Score_actu DESC"; // SA=Score actualité 
	$result_SA=mysqli_query($link,$query_SA);
	$tab_SA=mysqli_fetch_all($result_SA);
	$nblig_SA=mysqli_num_rows($result_SA);
	$nbcol_SA=mysqli_num_fields($result_SA);

	//$tab_SA : il suffit d'afficher $tab_SA puisque celui-ci est déjà trié dans l'ordre des points des actu 	

	// Récuperation des scores des projets ordonnés 
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

	//$tab_SP : il suffit d'afficher $tab_SP puisque celui-ci est déjà trié dans l'ordre des points des actu 
	
	$tab_tot=$tab_SA+$tab_SP;
	
	var_dump( $tab_tot);
	$NBL=count($tab_tot);
	for ($i=0; $i<$NBL; $i++)
	{
		$identifiant[$i]=$tab_tot[$i][0];
		$score[$i]=$tab_tot[$i][1];
	}	
	array_multisort($score, SORT_DESC, $identifiant, SORT_ASC);
	for ($i=0; $i<$NBL; $i++)
	{
		$tab_trie[$i][0]=$identifiant[$i];
		$tab_trie[$i][1]=$score[$i];
	}	
	var_dump( $tab_trie);
	for ($j=0; $j<$NBL; $j++)
		for ($k=0; $k<2; $k++)
	{
		echo $tab_trie[$j][$k];
	}
	?>
</body>
</html> 


