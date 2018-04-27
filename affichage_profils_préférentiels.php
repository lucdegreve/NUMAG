<html>
<head>
	<meta charset="UTF-8">
	<!-- comparaison des points mots clés avec autres profils pour afficher des propostions de connection -->
</head>
<body>
	<!-- ordonner les centres d'intérêt du profil en cours et de tous les autres profils pour pouvoir les comparer et sélectionner les profils apparentés-->
	<!-- ne pas afficher proposition de connexion si déjà connectés-->
	<?php
	$id_moi=17; //récupération de l'identifiant du connecté
	// requête permettant de sortir les 3 centres d interet principaux par inscrit avec le score correspondant à ceux du connectés
	$query_selection_profils="SELECT id_ind, id_mot_cle FROM Centres_interet WHERE id_ind <> ".$id_moi." ORDER BY compteur LIMIT 3";   
	$result_selection_profils=mysqli_query($link,$query_selection_profils);
	$tab_selection_profils=mysqli_fetch_all($result_selection_profils);
	$nblig_selection_profils=mysqli_num_rows($result_selection_profils); 
	$nbcol_selection_profils=mysqli_num_fields($result_selection_profils); 
	
	// requête sortant la liste des mots clé associés à leurs scores pour l'individu connecté
	$query_mots_cle_co="SELECT id_ind, id_mot_cle, compteur FROM Centres_interet WHERE id_ind = ".$id_moi." ORDER BY compteur";   
	$result_mots_cle_co=mysqli_query($link,$query_mots_cle_co);
	$tab_mots_cle_co=mysqli_fetch_all($result_mots_cle_co);
	$nblig_mots_cle_co=mysqli_num_rows($result_mots_cle_co); 
	$nbcol_mots_cle_co=mysqli_num_fields($result_mots_cle_co); 
	
	// requête avec jointure entre les 2 précédentes 
	$query_score="SELECT * FROM ".$result_selection_profils." JOIN ".$result_mots_cle_co." ON ".$result_selection_profils.".id_mot_cle=".$result_mots_cle_co.".id_mot_cle
	GROUP BY";   
	$result_score=mysqli_query($link,$query_score);
	$tab_score=mysqli_fetch_all($result_score);
	$nblig_score=mysqli_num_rows($result_score); 
	$nbcol_score=mysqli_num_fields($result_score); 
	
	
	for ($j=0,$j<$nblig_mots_cle_co,$j++){
		for ($k=0,$k<$nblig_selection_profils,$k++){
			if $tab_mots_cle_co[$j][1]==$tab_selection_profils[$k][0]{
				$tab_selection_profils[$k][2]=$tab_mots_cle_co[$j][1];
			}
			else{
				$tab_selection_profils[$k][2]=0;
			}
	$x=$tab_selection_profils[1][0]; //
	for($i=0, $i<$nblig_selection_profils
	while 
	
	
	//requête permettant de sortir la liste des inscrits pour les compter
	$query_inscrits="SELECT id_ind FROM Individus";   
	$result_inscrits=mysqli_query($link,$query_profils);
	$tab_inscrits=mysqli_fetch_all($result_profils);
	$nblig_inscrits=mysqli_num_rows($result_profils); // donne le nombre d'identifiants différents = nombre d'inscrits sur la plateforme
	$nbcol_inscrits=mysqli_num_fields($result_profils); 
	
	
	$query_profil_co="SELECT * FROM Centre_interet
	WHERE id_individu= XXXXX (id_individu de toute la session donc ça à finaliser à la fin) ORDER BY compteur"; //requete récupérant les mots clés ordonnés pour le profil connecté   
	$result_profil_co=mysqli_query($link,$query_profils);
	$tab_profil_co=mysqli_fetch_all($result_profils);
	$nblig_profil_co=mysqli_num_rows($result_profils);
	$nbcol_profil_co=mysqli_num_fields($result_profils);
	$centres_interet_p=array([]);//fait une liste des centres d'intérêt principaux
	for ($i=1, $i<3,$i++){
		$centres_interet_p=$centres_interet_p+$tab[$i][2];
	}
	$query_profils="SELECT * FROM Centre_interet
	WHERE id_individu= XXXXX (id_individu de toute la session donc ça à finaliser à la fin) GROUP BY id_individu ORDER BY compteur"; //requete récupérant les mots clés ordonnés par profil pour tous les profils  
	$result_profils=mysqli_query($link,$query_profils);
	$tab_profils=mysqli_fetch_all($result_profils);
	$nblig_profils=mysqli_num_rows($result_profils);
	$nbcol_profils=mysqli_num_fields($result_profils);
	//parcourir les 3 interets principaux par id et les comparer avec la liste des interets principaux de l'utilisateur connecté
	$j=0;
	$c=0;
	$nb_mots_clé=0;
	while $tab[$j+1][1]=$tab[$j][1]{
		$nb_mots_clé=$nb_mots_clé +1;
		$j++; 
		for($i=1, $i<3, $i++){
			if $tab[$i][2] //dans la liste des centres d'interet 
				$c=$c+1 // si c=2 ou 3 , proposition de connexion
		
	
	$nb_profils=//nombre d'inscrits sur la plateforme (nombre d'identifiants différents)
	
	
	
	
	
	
	
	?>
</body>
</html>