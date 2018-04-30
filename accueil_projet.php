Script de l'accueil des projets avec bouton de cration de projet, recherche et affichage des projets
By Manuel, Julien Louet et Marie

<html>


<!-- Bouton permettant d'accéder à la page de création de projet -->
Projet
<br/>
<a href = "creation_projet.php" > Créer un projet  </a>
<br/>

<table>


<td>
<?php
	$link=mysqli_connect('localhost','root','','bdd_racine');

	// Recherche de projets à base de liste déroulante
	$query="SELECT  libelle_mot_cle, nom_dpt, libelle_statut,
	duree, libelle_sout FROM projets
	INNER JOIN mot_cle_projet 
	ON projets.id_proj=mot_cle_projet.id_proj
	INNER JOIN mots_cles 
	ON mot_cle_projet.id_mot_cle=mots_cles.id_mot_cle
	INNER JOIN individus 
	ON projets.id_ind=individus.id_ind
	INNER JOIN communes 
	ON individus.id_commune=communes.id_commune
	INNER JOIN departements 
	ON communes.id_dpt=departements.id_dpt
	INNER JOIN types_soutien 
	ON projets.id_sout=types_soutien.id_sout
	INNER JOIN statuts 
	ON projets.id_statut=statuts.id_statut";
	
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	
	echo "<FORM action='Resultat_recherche_projet.php' method='GET'  name='form2'>";
			
	for ($i=0; $i<$nbligne; $i++)
	{
		for ($j=0; $j<$nbcol; $j++)
		{
			echo $Tab[$i][$j];
			echo "<select name='listetag'>";
			echo "<option value= '.$Tab[$i][$j].'>'.$Tab[$i][$j].'</option>";
			echo "<br/>";
		}
	}
	
	echo "<INPUT TYPE=SUBMIT  value='Valider'>" ;


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
	
	echo "<table>";
	
	for ($i=0; $i<$nbligne; $i++)
	{
		echo "<tr>
		'.$Tab[$i][0].'
		</tr>;
		<tr>;
		<td>
		'.$Tab[$i][0]'.
		</td>
		<td>
		<a href='projet.php?projet=$id_proj'> Consulter </a>
		</td>
		</tr>";
	}
	
	echo "</table>";
	?>
</td>
</table>

</html>