<html>
<head>
	<meta charset="UTF-8">
	<!-- comparaison des points mots clés avec autres profils pour afficher des propostions de connection -->
</head>
<body>
	<!-- ordonner les centres d'intérêt du profil en cours et de tous les autres profils pour pouvoir les comparer et sélectionner les profils apparentés-->
	<!-- ne pas afficher proposition de connexion si déjà connectés-->
	<?php
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
	$j=1
	$c=0
	while $tab[$j+1][1]=$tab[$j][1]{
		for($i=1, $i<3, $i++){
			if $tab[$i][2] //dans la liste des centres d'interet 
				$c=$c+1 // si c=2 ou 3 , proposition de connexion
		
	
	$nb_profils=//nombre d'inscrits sur la plateforme (nombre d'identifiants différents)
	
	
	
	
	
	
	
	?>
</body>
</html>