<?
	//Page de connexion à la base de donnée 
	$link=mysqli_connect('194.199.251.65', 'root', 'numag2018', 'bdd_racine_beta_27.04')
	if (mysqli_connect_errno()) {
	printf("Echec de la connexion: %s\n", mysqli_connect_error());
	exit();

    }
?>
