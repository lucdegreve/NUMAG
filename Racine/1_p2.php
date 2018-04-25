<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','','oiseaudb2018');

$idobs=$_GET["listenomobs"];
$nomdpt=$_GET["listedpt"];
$query="SELECT observations.id_observateur as 'Oiseau',sum(observations.nombre) as 'Quantité',observations.id_oiseau,
oiseaux.nom_commun, communes.id_dpt 
FROM observations,oiseaux,communes 
where observations.id_oiseau=oiseaux.id_oiseau and id_observateur =" .$idobs. " and id_dpt = ".$nomdpt. " and  observations.id_commune=communes.id_commune
GROUP BY oiseaux.id_oiseau";

//echo $query, "<br/>";
//mysqli_set_charset($link, 'UTF8');
$result=mysqli_query($link, $query);
echo '<table border=1>';
for($i=0; $i<2; $i++)
{
	$champ=mysqli_fetch_field_direct($result,$i)->name;
			echo"<td>";
			echo $champ;
			echo"</td>";
}


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