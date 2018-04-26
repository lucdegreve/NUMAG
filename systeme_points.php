<html>
<head>
	<meta charset="UTF-8">
	<!-- page de fonctions pour le calcul des points -->
	
	
	<!-- notation à partir des choix du profil 
	
récupération des choix dans les profils - get de liste principale, get de la liste secondaire , comment fait-on pour les choix ? liste déroulante à choix multiple ? id ? demander à titi
cliquer sur OK 
-- ajouter à centres d'interet des individus
-- attribuer points : si xxx était dans la liste P alors 4 points, dans la liste S 2 point-->

<!-- script-->

<?php
	//notation à partir des choix du profil
	//récupérérer les choix des listes 
	// Dans un premier temps de la liste principale
	$i=1;
	$nb_choix_p=3;// nombre de choix principaux
	while($i<$nb_choix_p){
		//récupérer l'id du centre d'interet i
		//ajouter id à la liste des centres d'interets 
		//ajouter 4 au compteur de ce centre d'interet
		$i++;
	}
	//De la liste secondaire 
	// 1 : compter le nombre de centres d'intérêt sélectionnés
	$nb_choix_s=;
	$k=1;
	while($k<$nb_choix_s){
		//récupérer l'id du centre d'interet k
		//ajouter id à la liste des centres d'interets 
		//ajouter 2 au compteur de ce centre d'interet
		$k++;
	?>

	
	
	
	<!-- fonction actualités -->

  <!-- Il y a une étoile pour choisir si une actualité nous intéresse ou pas 
    Si ce bouton est sélectionné get les tags associés à l'identifiant de l'actu 
	
	
	Faire une liste de ces tags -->
	<FORM action="Oiseaup2.php" method="GET" name="form1">   <!-- tout changer là une fois qu'on a les données -->
	<?php
    $link=mysqli_connect('localhost', 'root','','oiseaudb2018'); //Donner le nom de la base de donnée et modifier tout ce qui doit l'être 
	
	// Requête afin de récupérer l'identifiant des tags associés à une actualité sélectionnée par l'utilisateur // Peut-être une table en trop, s'arreter à la table mot clé article 
	$query_MCA="SELECT Mots_cles.id_mot_cle 
	FROM Mots_cles, Mots_cles_article, Articles 
	WHERE Mots_cles.id_mot_cle=Mot_cles_article.id_mot_cle
	AND Mot_cles_article.id_article=Articles_id_article
	AND Articles_id_article= XXXX (Variable récupérée quand on clique sur l'étoile)"; // MCA=Mots_cles_actu 
	$result_MCA=mysqli_query($link,$query_MCA);
	$tab_MCA=mysqli_fetch_all($result_MCA);
	$nblig_MCA=mysqli_num_rows($result_MCA);
	$nbcol_MCA=mysqli_num_fields($result_MCA);
	
	// Requête afin de récupérer les tags préférentiels de l'utilisateur ainsi que leur score associé 
	$query_SU="SELECT * FROM Centre_interet
	WHERE id_individu= XXXXX (id_individu de toute la session donc ça à finaliser à la fin)"; // SU=Score utilisateur   
	$result_SU=mysqli_query($link,$query_SU);
	$tab_SU=mysqli_fetch_all($result_SU);
	$nblig_SU=mysqli_num_rows($result_SU);
	$nbcol_SU=mysqli_num_fields($result_SU);
	
    // Récupérer les deux tableaux 
	Voir ce soir ou demain avec la correction papier de Mr Thiberville 
	
	// Comparer la liste de ces tags à celle de l'utilisateur. 
	Soit LA et LU respectivement la liste des tags de l'actualité et celle de l'utilisateur 
	for ($k=0; $k<$nblig_MCA; $k++)
	{
		$Modif=0
		for ($i=0; $i<$nblig_SU; $i++)
		{
			if (LA[$k,1]==LU[$i,1])
			{
				$Scoreactuel=LU[$i, 2]
				$Nvxscore=$Scoreactuel+1
				UPDATE $result_SU
				SET #lenomdelacolonnescore= $Nvxscore 
				WHERE idutilisateur=LU[$k,0] and idactu=LU[$k,1] 
			}
		if ($Modif=0)
		{
			$idutil=LU[$i,0]
			$idactu=LA[$k,0]
			INSERT INTO $resultSU (Colonne idutilisateur, colonne idactu, score)
			VALUES ( $idutil, $idactu, 1)
		}
		}
	}
	
    // Si il y a une égalité (booléen) ajouter un point au score du tag de l'agriculteur 
    // Si non ajouter la valeur (le libbelé) à la liste des libellés de l'agriculteur en lui ajoutant un point à son score 
    // Puis classement de cette nouvelle liste ? (utiliser la fonction classement si besoin mais pas forcément besoin parce qu'il faut classer avant d'afficher mais pas classer dans la base de donnée) 
	?>
	
	
	
	
	<!-- fonction connection entre 2 profils
	
	à partir d'un profil : recherche dans la base de données de tous les profils ayant les mêmes centres d'interet dans les 3 premières places (avec les 3 scores les plus élevés) 
	1/ sortir les 3 centres d'interet avec les scores les plus hauts pour le profil connecté
	2/ pareil pour tous les profils de la platefrome -->
	
	
	
	<!-- classement des mots clés ordre décroissant de points -->
	
	
</head>
</html>