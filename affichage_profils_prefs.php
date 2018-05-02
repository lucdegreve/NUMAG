<!-- Code effectué par Aurélie Jambon -->

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
	$link=mysqli_connect('localhost','root','','racine');
	if (mysqli_connect_errno()) {
    printf("Echec de la connexion: %s\n", mysqli_connect_error());
    exit();
	}
	//requête permettant de sortir la liste des inscrits pour les compter
	
	$query_inscrits="SELECT distinct id_ind FROM Centres_interet";   
	$result_inscrits=mysqli_query($link,$query_inscrits);
	$tab_inscrits=mysqli_fetch_all($result_inscrits);
	$nblig_inscrits=mysqli_num_rows($result_inscrits); // donne le nombre d'identifiants différents = nombre d'inscrits sur la plateforme
	$nbcol_inscrits=mysqli_num_fields($result_inscrits); 
	
	$id_ind_co=3; //récupération de l'identifiant du connecté
	
	// requête dans une boucle permettant de sortir les 3 centres d interet principaux par inscrit avec le score correspondant à ceux du connectés
	//faire boucle permettant de faire tableau
	$pos=0;
	for ($id=1;$id<=$nblig_inscrits;$id++){ // id représente l'identifiant de l'utilisateur, il commence donc à 1 
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
					$pos++;	
				}
				$k++;
			}	
		}
	}
	
	echo'Tableau avec identifiants, id des mots clé';
	echo'<BR/>';
	var_dump($tab_profils);//POUR VERIFIER
	
	// requête sortant la liste des mots clé associés à leurs scores pour l'individu connecté
	$query_mots_cle_co="SELECT id_ind, id_mot_cle, compteur FROM Centres_interet WHERE id_ind = ".$id_ind_co." ORDER BY compteur";   
	$result_mots_cle_co=mysqli_query($link,$query_mots_cle_co);
	$tab_mots_cle_co=mysqli_fetch_all($result_mots_cle_co);
	$nblig_mots_cle_co=mysqli_num_rows($result_mots_cle_co); 
	$nbcol_mots_cle_co=mysqli_num_fields($result_mots_cle_co); 
	
	$nblig_profils=count($tab_profils);

		//comparaison des centres d'intérêt du connecté et des autres inscrits pour faire score par mot clé 
	for ($j=0,$j<$nblig_mots_cle_co,$j++){
		for ($k=0,$k<$nblig_profils,$k++){
			if $tab_mots_cle_co[$j][1]==$tab_profils[$k][1]{
				$tab_profils[$k][2]=$tab_mots_cle_co[$j][2];
			}
			else{
				$tab_profils[$k][2]=0;
			}
			
			
	echo'Tableau avec identifiants, identifiants des mots clé et scores par mot clé';
	echo'<BR/>';	
	var_dump($tab_profils); //POUR VERIFIER 
	
	//faire somme des scores par individu pour faire score total
	for($i=0;$i<$nblig_profils;$i++){
		$x=$tab_profils[$i][0]; //x stock l'identifiant à la ligne i
		if $x<>$id_ind_co{
			if $tab_profils[$i][0]==$x{
				$tab_inscrits[$x-1][1]=$tab_inscrits[$x-1][1]+$tab_profils[$i][2]; 
			}
		}
	}
	echo'Tableau avec identifiants et scores finaux';
	echo'<BR/>';
	var_dump($tab_inscrits); // POUR VERIFIER
	
	?>
</body>
</html>