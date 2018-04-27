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
$link=mysqli_connect('localhost','root','','oiseaudb2018');
//mise en place de la requete
$idobs=$_GET["listenomobs"];
$nomdpt=$_GET["listedpt"];
$queryProjet="SELECT Alertes_Projet.id_ind, Alertes_Projet.id_proj, Alertes_Projet.Date_Alrt, Individus.nom_ind, Individus.prenom, Individus.id_ind 
FROM Alertes_Projet, Individus 
where Alertes_Projet.id_ind=Individus.id_ind" ;

$queryStage="SELECT Alertes_Stage.id_ind, Alertes_Stage.id_proj, Alertes_Stage.Date_Alrt, Individus.nom_ind, Individus.prenom, Individus.id_ind 
FROM Alertes_Stage, Individus 
where Alertes_Stage.id_ind=Individus.id_ind" ;


$resultP=mysqli_query($link, $queryProjet);
$resultS=mysqli_query($link, $queryStage);

echo '<table border=1>';
//mise en place des en-tetes
for($i=0; $i<2; $i++)
{
	$champ=mysqli_fetch_field_direct($resultP,$i)->name;
			echo"<td>";
			echo $champ;
			echo"</td>";
}

//tableau d'alertes projets
while($row=mysqli_fetch_array($resultP,MYSQLI_BOTH))
{
	$nom =$row["nom_ind"];
	$prenom =$row["prenom"];
	$titre =$row["titre_proj"];
	echo'<tr>';
	echo'<td>';
	echo $prenom,' ', $nom ,' a commenté votre projet nommé ', $titre;
	echo'</td>';
	echo'<td>';
	
//	echo'</td>';
//	echo'</tr>';
}	
echo'</tr>';
echo'</table>';

echo '<table border=1>';
//mise en place des en-tetes
for($i=0; $i<2; $i++)
{
	$champ=mysqli_fetch_field_direct($resultP,$i)->name;
			echo"<td>";
			echo $champ;
			echo"</td>";
}

//tableau d'alertes stages
while($row=mysqli_fetch_array($resultS,MYSQLI_BOTH))
{
	$nom =$row["nom_ind"];
	$prenom =$row["prenom"];
	$titre =$row["titre_proj"];
	echo'<tr>';
	echo'<td>';
	echo $prenom,' ', $nom ,' a commenté votre stage nommé ', $titre;
	echo'</td>';
	echo'<td>';
	
//	echo'</td>';
//	echo'</tr>';
}	
echo'</tr>';
echo'</table>';
?>
	<!-- Pied de page -->		
	<?php include("Pied_de_page.html"); ?>	


</div><!-- #global -->

</body>
</html>
