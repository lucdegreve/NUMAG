<!-- Cette page affiche le récapitulatif des alertes -->



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<?php
	header('Content-Type: text/html; charset=UTF-8');
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		Alerte
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/Feuille_Style.css" media="all" />
<body>
<!-- On définit ici une section 'global' -->
<div id="global">
	
	<!-- Entête -->
	<?php include("Entete.html"); ?>
	<!-- Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>

	
<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','numag2018','bdd_racine_beta_27.04');
//mise en place de la requete

//requete projet
$queryProjet="SELECT Alertes_Projet.id_ind, Alertes_Projet.id_proj, Alertes_Projet.Date_Alp, Individus.nom_ind, Individus.prenom, Individus.id_ind, projets.id_proj, projets.titre_proj, Alertes_Projet.vu_proj, projets.url_proj 
FROM Alertes_Projet, Individus, projets
where Alertes_Projet.id_ind=Individus.id_ind and projets.id_proj=Alertes_Projet.id_proj and Alertes_Projet.vu_proj=0";



//requete stage
$queryStage="SELECT Alertes_Stage.id_ind, Alertes_Stage.id_st, Alertes_Stage.Date_Als, Individus.nom_ind, Individus.prenom, Individus.id_ind, stages.id_st, stages.titre_st, Alertes_Stage.vu_st, stages.url_st
FROM Alertes_Stage, Individus, stages 
where Alertes_Stage.id_ind=Individus.id_ind and stages.id_st=Alertes_Stage.id_st and Alertes_Stage.vu_st=0" ;


$resultP=mysqli_query($link, $queryProjet);
$resultS=mysqli_query($link, $queryStage);

echo '<table border=0>';
echo'</br>';
echo'</br>';
echo 'Projet';
echo'</br>';
echo'</br>';


//tableau d'alertes projets
while($row=mysqli_fetch_array($resultP,MYSQLI_BOTH))
{
	echo '<form action=Alertevup.php METHOD=get>';
	$nom =$row["nom_ind"];
	$prenom =$row["prenom"];
	$titre =$row["titre_proj"];
	$idp =$row["id_proj"];
	$url=$row["url_proj"];
	echo'<tr>';
	echo'<td>';
	echo $prenom,' ', $nom ,' a commenté votre projet nommé ', $titre;
	echo'</td>';
	echo'<td>';
	echo '	<input TYPE="hidden" name="url" value='.$url.' >';
	echo '	<input TYPE="hidden" name="idp" value='.$idp.' >';
	echo '	<input TYPE="SUBMIT" name="voir" value="voir" >';
	echo'</td>';
	echo'</tr>';
	echo '</form>';
}	

echo'</tr>';
echo'</table>';
echo'</br>';
echo'</br>';

echo '<table border=0>';
echo'Stage';
echo'</br>';
echo'</br>';


//tableau d'alertes stages
while($row=mysqli_fetch_array($resultS,MYSQLI_BOTH))
{
	echo '<form action=Alertevus.php METHOD=get>';
	$nom =$row["nom_ind"];
	$prenom =$row["prenom"];
	$titre =$row["titre_st"];
	$ids =$row["id_st"];
	$url=$row["url_st"];
	echo'<tr>';
	echo'<td>';
	echo $prenom,' ', $nom ,' a commenté votre stage nommé ', $titre;
	echo'</td>';
	echo '<td>';
	echo '	<input TYPE="hidden" name="url" value='.$url.' >';
	echo '	<input TYPE="hidden" name="ids" value='.$ids.' >';
	echo '	<input TYPE="SUBMIT" name="voir" value="voir" >';
	echo'</td>';
	echo'</tr>';
	echo '</form>';
}	


echo'</tr>';
echo'</table>';
echo'</br>';
echo'</br>';
?>
	<!-- Pied de page -->		
	<?php include("Pied_de_page.html"); ?>	


</div><!-- #global -->

</body>
</html>
