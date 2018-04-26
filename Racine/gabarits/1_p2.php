<!-- Cette page affiche le récapitulatif des observations menées sur un département -->



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<?php
	header('Content-Type: text/html; charset=UTF-8');
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		OUAZAU - Projet Techno. Web
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
<body>
<!-- On définit ici une section 'global' -->
<div id="global">
	
	<!-- DIV Entête -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>

<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','','oiseaudb2018');
//mise en place de la requete
$idobs=$_GET["listenomobs"];
$nomdpt=$_GET["listedpt"];
$query="SELECT observations.id_observateur as 'Oiseau',sum(observations.nombre) as 'Quantité',observations.id_oiseau,
oiseaux.nom_commun, communes.id_dpt 
FROM observations,oiseaux,communes 
where observations.id_oiseau=oiseaux.id_oiseau and id_observateur =" .$idobs. " and id_dpt = ".$nomdpt. " and  observations.id_commune=communes.id_commune
GROUP BY oiseaux.id_oiseau";


$result=mysqli_query($link, $query);
echo '<table border=1>';
//mise en place des en-tetes
for($i=0; $i<2; $i++)
{
	$champ=mysqli_fetch_field_direct($result,$i)->name;
			echo"<td>";
			echo $champ;
			echo"</td>";
}

//tableau de reponse
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	$nomois =$row["nom_commun"];
	$nb =$row["1"];
	echo'<tr>';
	echo'<td>';
	echo $nomois;
	echo'</td>';
	echo'<td>';
	echo $nb;
	echo'</td>';
	echo'</tr>';
}	
echo'</tr>';
echo'</table>';
?>
	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	


</div><!-- #global -->

</body>
</html>
