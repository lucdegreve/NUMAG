<!-- Cette page affiche le récapitulatif des oiseaux observés par un membre sur un département donné -->



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<?php
	header('Content-Type: text/html; charset=UTF-8');
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		WAZO - Projet Techno. Web
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
	
</head>

<body>

<div id="global">
	
	<!-- DIV Entête -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>
<br/><br/>
<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','','oiseaudb2018');
$tri=$_GET["listetri"];

//définir les trimestres
if ($tri==="Janvier-Mars")
{
	$min=01;
	$max=03;
}
if ($tri==="Avril-Juin")
{
	$min=04;
	$max=06;
}
if ($tri==="Juillet-Septembre")
{
	$min=7;
	$max=9;
}
if ($tri==="Octobre-Decembre")
{
	$min=10;
	$max=12;
}
	
$seuil=$_GET["seuil"];
$iddpt=$_GET["listedpt"];
//mise en place de la requete
$query="SELECT communes.nom_commune, departements.nom_dpt, oiseaux.id_oiseau, communes.id_dpt, observations.date, observations.nombre, oiseaux.nom_commun, observations.id_observation
FROM communes, observations, oiseaux, departements
where communes.id_dpt = ".$iddpt. " and month(observations.date)>= ".$min." and month(observations.date)<= ".$max." and observations.nombre>=".$seuil." and 
observations.id_commune=communes.id_commune and observations.id_oiseau=oiseaux.id_oiseau and communes.id_dpt=departements.id_dpt" ;

mysqli_set_charset($link, 'UTF8');
$result=mysqli_query($link, $query);
$resultbis=mysqli_query($link, $query);

$nbcol=mysqli_num_rows($result);

$row=mysqli_fetch_array($resultbis,MYSQLI_BOTH);
$nomdep=$row["nom_dpt"];

//énoncé
echo "<b> Bilan des ".$nbcol. " observations faites dans le département ".$iddpt." (".$nomdep.")", "<br/> entre ".$tri." par groupe d'au moins ".$seuil. " individus.","<br/><br/></b>";
//réponse
$compt=1;
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	$nbr =$row["nombre"];
	$date =$row["date"];
	$nomois =$row["nom_commun"];
	$nomcom =$row["nom_commune"];
	echo $compt.". Le ".$date.", ".$nbr." individus de ".$nomois." ont été observés à ".$nomcom.".";
	echo '</br>';
	$compt=$compt+1;
}	
echo '</br>'
?>
	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	
	
	</div><!-- #global -->
	
</body>
</html>