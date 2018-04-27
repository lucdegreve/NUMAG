
<html>


<!-- Bouton permettant d'accéder à la page de création de projet -->
Projet
<br/>
<a href = "creation_projet.php" > Créer un projet  </a>
<br/>

<table>

<td>
<?php
$query="SELECT  libelle_mots_cles, nom_dpt, libelle_statut, duree, libelle_sout
	FROM Projets 
	INNER JOIN Individus Projets.id_ind=Individus.id_ind
	INNER JOIN Communes Individus.id_commune=Communes.id_commune
	INNER JOIN Departements Communes.id_dpt=Departements.id_dpt
	INNER JOIN Types_soutien Projets.id_sout=Types_soutien.id_sout";
	
	$result=mysqli_query($link,$query);
	
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	
	echo <FORM action="Resultat_recherche_projet.php" method="GET"  name="form2">;
	


?>

</td>

<td>
<?php
$query="SELECT  titre_proj, libelle_statut
	FROM Projets 
	INNER JOIN Statuts
	ON Projets.id_statut=Statuts.id_statut";
	
	$result=mysqli_query($link,$query);
	
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	
	echo <table>;
	
	for ($i=0, $i<$nbligne, $i++)
	{
		echo '<tr>
		'.$Tab[$i][0].'
		</tr>;
		<tr>;
		<td>
		'.$Tab[$i][0]'.
		</td>
		<td>
		<a href='projet.php?projet=$id_proj'> Consulter </a>
		</td>
		</tr>';
	}
	
	echo </table>;
	?>
</td>
</table>

</html>