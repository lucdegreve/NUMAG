<?php
	$link=mysqli_connect('localhost','root','','BDD_racine');
	
	$titre_st=$_GET["titre_st"];
	$description_st=$_GET["description_st"];
	$periode_st=$_GET["periode_st"];
	$libelle_mot_cle=$_GET["libelle_mot_cle"];

	$query_insert="insert into stages (titre_st, description_st, periode_st) values ('$titre_st', '$description_st', '$periode_st')";
	$rs_insert=mysqli_query($link, $query_insert);
	
	$query_insert2="insert into Mots_cles (libelle_mot_cle) values ('$libelle_mot_cle')";
	$rs_insert2=mysqli_query($link, $query_insert2);
?>
	
