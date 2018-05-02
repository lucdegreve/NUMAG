Script de l'accueil des projets avec bouton de cration de projet, recherche et affichage des projets
By Manuel, Julien Louet et Marie
<?php
session_start()
//$id_co=$_SESSION["id_ind_co"]
?>
<html>

<head>
	<meta charset="UTF-8">
</head>

<!-- Bouton permettant d'accéder à la page de création de projet -->
Projet
<br/>
<a href = "creation_projet.php" > Créer un projet  </a>
<br/>

<table border=1>

<tr>
<td>
<?php
	$link=mysqli_connect('localhost','root','','bdd_racine');
	echo "<FORM action='Resultat_recherche_projet.php' method='GET'  name='form2'>";
	echo "<tr>
	<td>";
	echo "Filtres";
	echo "</td> </tr>";
	echo "<tr>
	<td>";
	// Recherche de projets à base de liste déroulante - Mot clé
	$query="SELECT  libelle_mot_cle FROM projets
	INNER JOIN mot_cle_projet 
	ON projets.id_proj=mot_cle_projet.id_proj
	INNER JOIN mots_cles 
	ON mot_cle_projet.id_mot_cle=mots_cles.id_mot_cle";
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	
	echo "Mot clé";
	echo "<select name='listetag'>";		
	for ($i=0; $i<$nbligne; $i++)
	{
		
		echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
		echo "<br/>";
	
	}
	echo "</select>";
	
	echo "</td> </tr>";
	echo "<tr>
	<td>";
		// Recherche de projets à base de liste déroulante - Département
	$query="SELECT  nom_dpt FROM departements";
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	
	echo "Département";
	echo "<select name='listedpt'>";		
	for ($i=0; $i<$nbligne; $i++)
	{
		
		echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
		echo "<br/>";
	
	}
	echo "</select>";
	
	
	echo "</td> </tr>";
	echo "<tr>
	<td>";
		// Recherche de projets à base de liste déroulante - Statut
	$query="SELECT  libelle_statut FROM statuts";
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	
	echo "Statut du projet";
	echo "<select name='listestatut'>";		
	for ($i=0; $i<$nbligne; $i++)
	{
		
		echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
		echo "<br/>";
	
	}
	echo "</select>";
	
	echo "</td> </tr>";
	
	echo "<tr>
	<td>";
	echo "<INPUT TYPE=SUBMIT  value='Valider'>" ;
	echo "</td> </tr>";
?>

</td>

<td>
<?php
	// Requete sans les préférences des projets
	
	//$query="SELECT  titre_proj, libelle_statut
	//FROM Projets 
	//INNER JOIN Statuts
	//ON Projets.id_statut=Statuts.id_statut";
	//$result=mysqli_query($link,$query);
	//$Tab=mysqli_fetch_all($result);
	//$nbligne=mysqli_num_rows($result);
	//$nbcol=mysqli_num_fields($result);
	
	// Requete avec les préférences des projets

	$query_SP="SELECT titre_proj, libelle_statut, id_proj, SUM(Centres_interet.Compteur) AS Score_projet
	FROM Centres_interet, Mots_cles, mot_cle_projet, Projets, Statuts
	WHERE Centres_interet.id_ind=1
	AND Centres_interet.id_mot_cle=Mots_cles.id_mot_cle 
	AND Mots_cles.id_mot_cle=Mot_cle_projet.id_mot_cle 
	AND Projets.id_statut=Statuts.id_statut
	GROUP BY id_proj
	ORDER BY Score_projet DESC"; // SP=Score projet 
	$result_SP=mysqli_query($link,$query_SP);
	$tab_SP=mysqli_fetch_all($result_SP);
	$nblig_SP=mysqli_num_rows($result_SP);
	$nbcol_SP=mysqli_num_fields($result_SP);
	
	
	for ($i=0; $i<$nbligne; $i++)
	{
		echo "<tr> <td>
		".$Tab[$i][0]."
		</td> </tr>
		<tr>
		<td>
		".$Tab[$i][1]."
		</td>
		<td>
		<a href='projet.php'> Consulter </a>
		</td>
		</tr>";
	}
	// <a href='projet.php?projet=".$id_proj."'> Consulter </a> exemple de bouton consulter si la page suivante été créer 
	// (inutile dans le demonstrateur
	
	
	?>
</td>
</tr>
</table>

</html>