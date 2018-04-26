<?php
	$link=mysqli_connect('localhost','root','','BDD_racine');
	
	$quelstage=$_GET["lestage"];
	
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

?>	
	<table>
	<tr>
	Résumé 
	</tr>
	<tr><BR/>
	Commune de stage
	<BR/>
		$Tab[0][5]
	<BR/>
	Departement
	<BR/>		
		$Tab[0][6]
	<BR/>
	Periode de stage
	<BR/>
		$Tab[0][3]
	<BR/>
	Mois de début de stage
	<BR/>
		$Tab[0][7]
	<BR/>
	</tr>

	</table>
	<br/>
