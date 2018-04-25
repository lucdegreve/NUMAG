<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','','oiseaudb2018');


$query2="SELECT * 
FROM Departements 
GROUP BY nom_dpt";
mysqli_set_charset($link, 'UTF8');
$result=mysqli_query($link, $query2);
echo $query2;
echo '<form action="2_p2.php" method="GET">';
echo '<select name="listedpt">';
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	$nomdpt =$row["nom_dpt"];
	$iddpt =$row["id_dpt"];
	echo '<option value='.$iddpt."> ".$nomdpt.' </option>';
}	
echo '</select>';
echo '<br/>';
$tab=array("Janvier-Mars","Avril-Juin","Juillet-Septembre","Octobre-Decembre");
			echo '<select name="listetri">';
			for ($i=0;$i<count($tab);$i++){
				echo '<option value='.$tab[$i]."> ".$tab[$i].' </option>';
			}
			echo '</select>';
echo '<br/>';
echo ' <input TYPE="TEXT" name="seuil" value="10">';
echo '	<input TYPE="SUBMIT" name="soumettre" value="soumettre">';
echo '</form>';

?>