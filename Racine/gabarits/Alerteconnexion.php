<?php
	session_start();
	$mail=$_GET["mail"];
	$mdp=$_GET["mdp"];
	$url1="http://localhost/NUMAG/Racine/gabarits/accueil_inscrit.php";
	$url2="http://localhost/NUMAG/Racine/gabarits/connexion-inscription.php";
	$link=mysqli_connect('localhost','root','','racine');

	$query_ind="SELECT id_ind, mail, mdp
		FROM Individus"; 
	$result_ind=mysqli_query($link,$query_ind);
	$tab_ind=mysqli_fetch_all($result_ind);
	$nblig_ind=mysqli_num_rows($result_ind);
	$nbcol_ind=mysqli_num_fields($result_ind);
	$VERIF=0;
	for($k=0; $k<$nblig_ind; $k++)
	{
		if ($tab_ind[$k][1]==$mail AND $tab_ind[$k][2]==$mdp)
		{
			$VERIF=1;
			$ligne=$k;
		}
	}
	if ($VERIF==1)
	{
		header('Location: '.$url1);
		exit();
		$_SESSION['id_ind_co']=$tab_ind[$ligne][0];
	}
	else
	{
		header('Location: '.$url2);
		exit();
	}
?>