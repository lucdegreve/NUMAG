<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','','oiseaudb2018');


$query="SELECT observateurs.id_observateur, observateurs.nom_observateur FROM observateurs, observations GROUP BY id_observateur";
$query2="SELECT * FROM Departements GROUP BY nom_dpt";
mysqli_set_charset($link, 'UTF8');
$result=mysqli_query($link, $query);
echo $query;
echo '<form action="1_p2.php" method="GET">';
echo '<select name="listenomobs">';
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	$nomobs =$row["nom_observateur"];
	$idobs =$row["id_observateur"];
	echo '<option value='.$idobs."> ".$nomobs.' </option>';
}	
echo '</select>';
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