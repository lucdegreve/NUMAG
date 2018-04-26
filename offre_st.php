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


	<table>
	<tr>
	Résumé 
	</tr>
	<tr>
	<BR/>

		$Tab[0][3]
	</BR>
	<BR>
		$Tab[0][5]
	</BR>
		$Tab[0][6]
		$Tab[0][7]
	</tr>

	</table>
	<br/>

	
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
	Mots clés
	<BR/>
		".$Tab[0][4]."
	<BR/>
	</tr>
	</table>";
	
	echo " 
	<table border =1>
	<tr>
	Contact 
	</tr>
	<tr>
	<BR/>
	Description
	<BR/>
		".$Tab[0][2]."
	<BR/>
	Mots clés
	<BR/>
		".$Tab[0][4]."
	<BR/>
	</tr>
	</table>";
	
	
	
	
	?>	