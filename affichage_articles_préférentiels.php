<html>
<head>
	<meta charset="UTF-8">
	<!-- proposition d'articles en fonction du nombre de points par mots clés -->
	
	
	
</head>
<body>
	<?php
	Classer les tags de lutilisateur 
	$query_SU="SELECT * FROM Centres_interet
	WHERE id_ind= XXXXX (id_individu de toute la session donc ça à finaliser à la fin)
	ORDER BY Compteur"; // SU=Score utilisateur   
	$result_SU=mysqli_query($link,$query_SU);
	$tab_SU=mysqli_fetch_all($result_SU);
	$nblig_SU=mysqli_num_rows($result_SU);
	$nbcol_SU=mysqli_num_fields($result_SU);
	
	Récupérer la liste des actualités avec les tags associés 
	$query_act="SELECT id_mot_cle FROM Actualites, mot_cle_actualite
	WHERE id_mot_cle
	id_actu 
	id_ind= XXXXX (id_individu de toute la session donc ça à finaliser à la fin)
	ORDER BY Compteur"; // act=actualités   
	$result_act=mysqli_query($link,$query_act);
	$tab_act=mysqli_fetch_all($result_act);
	$nblig_act=mysqli_num_rows($result_act);
	$nbcol_act=mysqli_num_fields($result_act);
	
	Noter les actualités 
	

	Classer les actualités 
	
	
	Les afficher dans l'ordre 
	?>
</body>
</html>