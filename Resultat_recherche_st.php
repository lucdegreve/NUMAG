<?php
	$link=mysqli_connect('localhost','root','','BDD_racine');
	
	$mot_cle=$_GET["libelle_mot_cle"];
	$lieu=$_GET["listedpt"];
	$mois=$_GET["listemois"];
	$periode_st=$_GET["periode_st"];
	
	$query="SELECT titre_st, libelle_mot_cle 
	FROM Stages INNER JOIN Mots_cles ON Stages.id_mot_cle=Mots_cles.id_mot_cle
	WHERE titre_st like '%$recherche%' OR libelle_mot_cle like '%$recherche%'";
	
	$result=mysqli_query($link,$query);
	
	
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	
	echo '<table>';
	$i=0;
	while ($i<$nbligne)
	{
		echo '<tr>';
		$j=0;
		while($j<$nbcol)
		{
			echo '<tr>';
			if $j=0
				echo href="lien">$Tab[$i][$j];
			else
				echo $Tab[$i][$j];
			$j++;
			echo '</tr>';	
		}
		$i++;
		echo '</tr>';
	}
	echo '</table>';
	echo '<br/>';
?>