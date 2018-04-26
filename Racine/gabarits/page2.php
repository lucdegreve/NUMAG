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
//mise en place de la requete

$query2="SELECT * 
FROM Departements 
GROUP BY nom_dpt";
mysqli_set_charset($link, 'UTF8');
$result=mysqli_query($link, $query2);
echo '<form action="2_p2.php" method="GET">';
echo '<br/>';
echo '<br/>';
echo '<select name="listedpt">';
echo '<br/>';
echo '<br/>';
// liste déroulante départements
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	$nomdpt =$row["nom_dpt"];
	$iddpt =$row["id_dpt"];
	echo '<option value='.$iddpt."> ".$nomdpt.' </option>';
}	
echo '<br/>';
echo '<br/>';
echo '</select>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
// liste déroulante trimestre
$tab=array("Janvier-Mars","Avril-Juin","Juillet-Septembre","Octobre-Decembre");
			echo '<select name="listetri">';
			for ($i=0;$i<count($tab);$i++){
				echo '<option value='.$tab[$i]."> ".$tab[$i].' </option>';
			}
			echo '</select>';
			echo '<br/>';
echo '<br/>';
echo '<br/>';
// seuil
echo ' <input TYPE="TEXT" name="seuil" value="10">';
echo '<br/>';
echo '<br/>';
echo '	<input TYPE="SUBMIT" name="soumettre" value="soumettre">';
echo '</form>';

?>
	</div><!-- #global -->
	
</body>
</html>