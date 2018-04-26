Script permettant de consulter une offre de stage à partir des résultats d'une recherche
By Manuel, Julien Louet, Marie

<?php
	$link=mysqli_connect('localhost','root','','BDD_racine');
	
	// Recupération du stage sur lequel l'étudiant à cliqué
	$quelstage=$_GET["lestage"];
	
	// Récupération du titre du stage, de sa description, de la période du stage, de tous les mots clès, 
	//de la commune et du département de l'agriculteur, du mois de début du stage, du type de production et du nom et prénom de l'agriculteur
	$query="SELECT id_st, titre_st, description_st, periode_st, libelle_mot_cle, nom_commune, nom_dpt, mois_debut_st
	FROM Stages INNER JOIN Mots_cles 
	ON Stages.id_mot_cle=Mots_cles.id_mot_cle
	INNER JOIN Departement
	ON Stage.id_dpt=Departements.id_dpt
	INNER JOIN Communes
	ON Departements.id_commune=Communes_id.commune
	WHERE id_st=".$quelstage;
	
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
<<<<<<< HEAD
	
	// Affichage du titre 
	echo $Tab[0][2]
	<BR/>
	
	// Affichage du tableau de gauche comportant le résumé du lieu et période du stage
	echo "<table>
=======


	echo"<table border=1>
>>>>>>> master
	<tr>
	Résumé 
	</tr>
	<tr><BR/>
	Commune de stage
	<BR/>
<<<<<<< HEAD
		$Tab[0][5]
=======
		".$Tab[0][5]."
>>>>>>> master
	<BR/>
	Departement
	<BR/>		
		".$Tab[0][6]."
	<BR/>
	Periode de stage
	<BR/>
		".$Tab[0][3]."
	<BR/>
	Mois de début de stage
	<BR/>
		".$Tab[0][7]."
	<BR/>
	</tr>

<<<<<<< HEAD
	</table>
	<br/>";
=======
	</table>";
>>>>>>> master


	// Affichage du tableau central comportant la description du stage, le type de production et les mots clés
	echo " 
	<table border =1>
	<tr>
	Description du stage 
	</tr>
	<tr>
	<BR/>
	Description
	<BR/>
		".$Tab[0][2]."
	<BR/>
	Type de production
	<BR/>
		".$Tab[0][8]."
	<BR/>
	Mots clés
	<BR/>
		".$Tab[0][4]."
	<BR/>
	</tr>
	</table>";
	
	
	// Affichage du tableau de droite permettant de contacter l'agriculteur pour postuler à l'offre
	echo " 
	<table border =1>
	<tr>
	Contact 
	</tr>
	<tr>
	<BR/>
	Nom
	<BR/>
		".$Tab[0][9]."
	<BR/>
	Prénom
	<BR/>
		".$Tab[0][10]."
	<BR/>
	Postuler à l'offre
	<BR/>
		"<a href = "messagerie.php" > Envoyer un message à l agriculteur </a>"
	<BR/>
	</tr>
	</table>";
	
	
	
	
	?>	