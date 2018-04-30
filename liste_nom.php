<?php
$liste_nom=array();

$link=mysqli_connect('localhost','root','','bdd_racine_beta27.04');
	

	
	$query="SELECT nom_ind FROM individus ";
	
	
	$result=mysqli_query($link,$query);
	
	$Table=mysqli_fetch_all($result);   	
	$nbligne=mysqli_num_rows($result);		
	$nbcol=mysqli_num_fields($result);	
	$i=0;
	echo $nbligne;
	while ($i<$nbligne)
	{	$liste_nom[]=$Table[$i][0];
		$i=$i+1;
	}
?>