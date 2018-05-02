Script permettant de consulter une offre de stage à partir des résultats d'une recherche
By Manuel, Julien Louet, Marie

<?php
	$link=mysqli_connect('localhost','root','','BDD_racine');
	
	// Recupération du stage sur lequel l'étudiant à cliqué
	$stage=$_GET["lestage"];
	$quelstage=$stage+1;
	// Récupération du titre du stage, du Département, de la commune, de la période 
	// et du mois de début pour le premier tableau d'affichage	
	$query="SELECT id_st, titre_st, nom_dpt, nom_commune, periode_st, mois_debut_st 
	FROM stages 
	INNER JOIN departements 
	ON stages.id_dpt=departements.id_dpt 
	INNER JOIN individus 
	ON stages.id_ind=individus.id_ind 
	INNER JOIN communes 
	ON individus.id_commune=communes.id_commune 
	WHERE id_st=".$quelstage;
	
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	echo $nbligne;
	echo $nbcol;
	
	
	// Affichage du titre
	echo "<BR/><BR/>";
	echo $Tab[0][1];
	echo "<BR/><BR/>";
	
	// Affichage du tableau de gauche comportant le résumé du lieu et période du stage
	echo "<table border=1>
	<tr>
	<td>
	Résumé 
	</td>
	</tr>
	<tr>
	<td>
	Departement
	</td>
	<td>
		".$Tab[0][2]."
	</td>
	</tr>
	<tr>
	<td>
	Commune de stage
	</td>
	<td>
		".$Tab[0][3]."
	</td>
	</tr>
	<tr>
	<td>
	Periode de stage
	</td>
	<td>
		".$Tab[0][4]."
	</td>
	<tr>
	<td>
	Mois de début de stage
	</td>
	<td>
		".$Tab[0][5]."
	</td>
	</tr>
	</table>";
	echo "<BR/><BR/>";



	// Récupération de la description, du type de production et des mots clès
	$query="SELECT stages.id_st, stages.description_st, types_production.libelle_type_prod, mots_cles.libelle_mot_cle
	FROM stages
	INNER JOIN individus
	ON stages.id_ind=individus.id_ind
    INNER JOIN exploitation_typeprod
    ON individus.id_exp=exploitation_typeprod.id_exp
    INNER JOIN types_production
    ON exploitation_typeprod.id_type_prod=types_production.id_type_prod
    INNER JOIN mot_cle_stage
    ON stages.id_st=mot_cle_stage.id_st
    INNER JOIN mots_cles
    ON mot_cle_stage.id_mot_cle=mots_cles.id_mot_cle
	WHERE stages.id_st=".$quelstage;
	
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	
	
	// Affichage du tableau central comportant la description du stage, le type de production et les mots clés
	echo " 
	<table border =1>
	<tr>
	<td>
	Description du stage 
	</td>
	</tr>
	<tr>
	<td>
	Description
	<td>
		".$Tab[0][1]."
	</td>
	</tr>
	<tr>
	<td>
	Type de production
	</td>
	<td>
		".$Tab[0][2]."
	</td>
	</tr>
	<tr>
	<td>
	Mots clés
	</td>
	<td>
		".$Tab[0][3]."
	</td>
	</tr>
	</table>";
	
	echo "<BR/><BR/>";

	
	
	
	// Récupération du nom et prenom de l'agriculteur
	$query="SELECT id_st, nom_ind, prenom
	FROM Stages 
	INNER JOIN individus
	ON stages.id_ind=individus.id_ind
	WHERE id_st=".$quelstage;
	
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	
	// Affichage du tableau de droite permettant de contacter l'agriculteur pour postuler à l'offre
	echo " 
	<table border =1>
	<tr>
	<td>
	Contact 
	</td>
	</tr>
	<tr>
	<td>
	Nom
	</td>
	<td>
		".$Tab[0][1]."
	</td>
	</tr>
	<tr>
	<td>
	Prénom
	</td>
	<td>
		".$Tab[0][2]."
	</td>
	</tr>
	<tr>
	<td>
	Postuler à l'offre
	</td>
	<td>
		<a href = 'messagerie.php' > Envoyer un message à l agriculteur </a>
	</td>
	</tr>
	</table>";
	


	
	
	?>	