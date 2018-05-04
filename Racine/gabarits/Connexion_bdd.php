<?php
	//Page de connexion à la base de donnée 
	$link=mysqli_connect('localhost', 'root', '', 'racine');
	if (mysqli_connect_errno()) {
	printf("Echec de la connexion: %s\n", mysqli_connect_error());
	exit();
    }
?>
