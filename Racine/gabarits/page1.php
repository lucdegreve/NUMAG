<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		OUAZAU - Projet Techno. Web
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
	
	
<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','','oiseaudb2018');


$query="SELECT observateurs.id_observateur, observateurs.nom_observateur FROM observateurs, observations GROUP BY id_observateur";
$query2="SELECT * FROM Departements GROUP BY nom_dpt";
mysqli_set_charset($link, 'UTF8');
$result=mysqli_query($link, $query);

echo '<form action="1_p2.php" method="GET">';
echo '<br/>';
echo '<br/>';
echo '<select name="listenomobs">';
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	$nomobs =$row["nom_observateur"];
	$idobs =$row["id_observateur"];
	echo '<option value='.$idobs."> ".$nomobs.' </option>';
}	
echo '<br/>';
echo '<br/>';
echo '</select>';
echo '<br/>';
echo '<br/>';
$result=mysqli_query($link, $query2);
echo '<select name="listedpt">';
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	$nomdpt =$row["nom_dpt"];
	$iddpt =$row["id_dpt"];
	echo '<option value='.$iddpt."> ".$nomdpt.' </option>';	
}
echo '</select>';
echo '	<input TYPE="SUBMIT" name="soumettre" value="soumettre">';
echo '</form>';

?>
	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	
	
	</div><!-- #global -->

</body>
</html>