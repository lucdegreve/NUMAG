<!-- Code effectué par Aurélie Jambon -->
<!-- Description : ce script renvoie un tableau classé des profils les plus proches pour les proposer à l'individu connecter -->

<html>
<head>
	<meta charset="UTF-8">
	<!-- comparaison des points mots clés avec autres profils pour afficher des propostions de connection -->
</head>
<body>
	<!-- ordonner les centres d'intérêt du profil en cours et de tous les autres profils pour pouvoir les comparer et sélectionner les profils apparentés-->
	<!-- ne pas afficher proposition de connexion si déjà connectés-->
	<?php
	
	//connexion à la base de données
	//include("Connexion_bdd.php");   COMMENTAIRE A ENLEVER
	$link=mysqli_connect('localhost','root','','racine');
	
	$id_ind_co=2; //récupération de l'identifiant du connecté
	
	//requête permettant de sortir la liste des inscrits pour les compter
	
	$query_inscrits="SELECT distinct id_ind FROM Centres_interet WHERE id_ind <> ".$id_ind_co."";   
	$result_inscrits=mysqli_query($link,$query_inscrits);
	$tab_inscrits=mysqli_fetch_all($result_inscrits);
	$nblig_inscrits=mysqli_num_rows($result_inscrits); // donne le nombre d'identifiants différents = nombre d'inscrits sur la plateforme
	$nbcol_inscrits=mysqli_num_fields($result_inscrits); 
	
	echo'<BR/>';
	echo'Tableau avec identifiants des inscrits sauf le connecté';
	echo'<BR/>';
	var_dump($tab_inscrits);//POUR VERIFIER
	
	// requête dans une boucle permettant de sortir les 3 centres d interet principaux par inscrit avec le score correspondant à ceux du connectés
	//faire boucle permettant de faire tableau
	$pos=0;
	for ($id=1;$id<=$nblig_inscrits+1;$id++){ // id représente l'identifiant de l'utilisateur, il commence donc à 1 
		if ($id <> $id_ind_co){
			$query_selection_profils="SELECT id_ind, id_mot_cle FROM Centres_interet WHERE id_ind = ".$id." ORDER BY compteur DESC LIMIT 3"; //requête sortant les 3 premiers mots clé pour l'identifiant id sans le faire pour l'id du connecté
			$result_selection_profils=mysqli_query($link,$query_selection_profils);
			$tab_selection_profils=mysqli_fetch_all($result_selection_profils);
			$nblig_selection_profils=mysqli_num_rows($result_selection_profils); 
			$nbcol_selection_profils=mysqli_num_fields($result_selection_profils); 
			echo'<BR/>-';
			$k=0;
			// construction du tableau
			while($k<$nblig_selection_profils) 
			{
				$j=0;
				while($j<$nbcol_selection_profils) 
				{
					$tab_profils[$pos][$j]=$tab_selection_profils[$k][$j];
					echo 'data='.$tab_profils[$pos][$j].'-'; // POUR VERIFIER
					$j++;
				}
				$k++;
				$pos++;
			}	
		}
	}

	
	echo'<BR/>';
	echo'Tableau avec identifiants, id des mots clé';
	echo'<BR/>';
	var_dump($tab_profils);//POUR VERIFIER
	
	// requête sortant la liste des mots clé associés à leurs scores pour l'individu connecté
	$query_mots_cle_co="SELECT id_ind, id_mot_cle, compteur FROM Centres_interet WHERE id_ind = ".$id_ind_co." ORDER BY compteur DESC";   
	$result_mots_cle_co=mysqli_query($link,$query_mots_cle_co);
	$tab_mots_cle_co=mysqli_fetch_all($result_mots_cle_co);
	$nblig_mots_cle_co=mysqli_num_rows($result_mots_cle_co); 
	$nbcol_mots_cle_co=mysqli_num_fields($result_mots_cle_co); 
	
	echo'Tableau de mes mots clé';
	echo'<BR/>';	
	var_dump($tab_mots_cle_co); //POUR VERIFIER 
	
	$nblig_profils=count($tab_profils);
	
	//comparaison des centres d'intérêt du connecté et des autres inscrits pour faire score par mot clé 
	for ($j=0;$j<$nblig_mots_cle_co;$j++){
		for ($k=0;$k<$nblig_profils;$k++){
			if ($tab_mots_cle_co[$j][1]==$tab_profils[$k][1]){
				$tab_profils[$k][2]=$tab_mots_cle_co[$j][2];
			}
		}
	}	
	echo'Tableau avec identifiants, identifiants des mots clé et scores par mot clé';
	echo'<BR/>';	
	var_dump($tab_profils); //POUR VERIFIER 
	
	//faire somme des scores par individu pour faire score total

	$c=0;	
	for($i=0;$i<$nblig_profils;$i=$i+3){
		$tab_inscrits[$c][1]=$tab_profils[$i][2]+$tab_profils[$i+1][2]+$tab_profils[$i+2][2];
		$c++;
	}

	echo'Tableau avec identifiants et scores finaux';
	echo'<BR/>';
	var_dump($tab_inscrits); // POUR VERIFIER
	
	//Tri du tableau avec les scores finaux pour faire classement 
	$NBL=count($tab_inscrits);
    for ($i=0; $i<$NBL; $i++)
    {
        $identifiant[$i]=$tab_inscrits[$i][0];
        $score[$i]=$tab_inscrits[$i][1];
    }    
    array_multisort($score, SORT_DESC,$identifiant, SORT_ASC);
	
	for ($i=0; $i<$NBL; $i++)
    {
        $tab_inscrits[$i][0]=$identifiant[$i];
        $tab_inscrits[$i][1]=$score[$i];
	}
	
	echo'Tableau trié';
	echo'<BR/>';
	var_dump($tab_inscrits);
	?>
</body>
</html>
