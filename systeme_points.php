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
	$nb_choix_p=3;// nombre de choix principaux
	for($i=1,$i=$nb_choix_p;$i++){
		//récupérer l'id du centre d'interet i
		if //la case est cochée
		$choix=$_GET
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
	if la case est cochée je récupère l'identifiant de l'article 
	
	Faire une liste de ces tags -->
	<FORM action="" method="GET" name="form1">   <!-- tout changer là une fois qu'on a les données -->
	<?php
    $link=mysqli_connect('localhost', 'root','','oiseaudb2018'); //Donner le nom de la base de donnée et modifier tout ce qui doit l'être 
	
	// Requête afin de récupérer l'identifiant des tags associés à une actualité sélectionnée par l'utilisateur // Peut-être une table en trop, s'arreter à la table mot clé article 
	$query_MCA="SELECT Mots_cles.id_mot_cle 
	FROM Mots_cles, mot_cle_act, Actualites
	WHERE Mots_cles.id_mot_cle=mot_cle_actu.id_mot_cle
	AND mot_cle_actu.id_article=Actualites.id_actu
	AND Actualites_id_actu= XXXX (Variable récupérée quand on clique sur l'étoile)"; // MCA=Mots_cles_actu 
	$result_MCA=mysqli_query($link,$query_MCA);
	$tab_MCA=mysqli_fetch_all($result_MCA);
	$nblig_MCA=mysqli_num_rows($result_MCA);
	$nbcol_MCA=mysqli_num_fields($result_MCA);
	
	// Requête afin de récupérer les tags préférentiels de l'utilisateur ainsi que leur score associé 
	$query_SU="SELECT * FROM Centres_interet
	WHERE id_ind= XXXXX (id_individu de toute la session donc ça à finaliser à la fin)"; // SU=Score utilisateur   
	$result_SU=mysqli_query($link,$query_SU);
	$tab_SU=mysqli_fetch_all($result_SU);
	$nblig_SU=mysqli_num_rows($result_SU);
	$nbcol_SU=mysqli_num_fields($result_SU);
	
    // Récupérer les deux tableaux --> est-ce vraiment utile ? 
	Voir ce soir ou demain avec la correction papier de Mr Thiberville 
	
	// Comparer la liste de ces tags à celle de l'utilisateur. 
	for ($k=0; $k<$nblig_MCA; $k++)
	{
		$Modif=0;
		for ($i=0; $i<$nblig_SU; $i++)
		{
			if ($tab_MCA[$k,1]==$tab_SU[$i,1])
			{
				$Scoreactuel=$tab_SU[$i, 2];
				$Nvxscore=$Scoreactuel+1;
				$query_MAJ="UPDATE Centres_interet SET Compteur=".$Nvxscore."WHERE id_ind=".IDENTIFIANTDELAGRICONNECTE."And id_mot_cle=".$result_SU[$k,1]; 
				$Modif=1;
			}
		if ($Modif==0)
		{
			$idutil=$result_SU[$i,0] // OU IDENTIFIANTDELAGRICONNECTE donc START SESSION;
			$idactu=$result_MCA[$k,0];
			$query_ajout="INSERT INTO Centres_interet(id_ind, id_mot_cle, score) VALUES (".$idutil.",".$idactu.", 1)"; //est-ce que je dois mettre le nom de la table ? donc Centres_interet ? 
			$result_SU=$link->query($query_ajout);
		}
		}
	}
	?>
 
	
	<!-- fonction connection entre 2 profils
	
	à partir d'un profil : recherche dans la base de données de tous les profils ayant les mêmes centres d'interet dans les 3 premières places (avec les 3 scores les plus élevés) 
	1/ sortir les 3 centres d'interet avec les scores les plus hauts pour le profil connecté
	2/ pareil pour tous les profils de la platefrome -->
	

	
	<!-- classement des mots clés ordre décroissant de points SE FAIT DANS LA REQUETE -->
	
	
	
	<?
	// fonction pour trier les centres d'intérêt NE SERT PLUS NORMALEMENT 
	
	function trier($tab)
	{
		$l=1;
		$nb=count($tab); //nombre de centres d'intérêt
		for ($k=0;$k<$nb;$k++) 
		{
			$y=0;
			if $tab[$k]<$tab[$l]
			{
				$y=$tab[$k];
				$tab[$l]=$tab[$k];
				$tab[$l]=$y;
			}
			$k++;
			$l++;
		}
		return $tab;
	}
	trier($tab);
	
				
</head>
</html>