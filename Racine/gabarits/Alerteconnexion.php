<?php
	Session_start();
	$mail=$_GET["mail"];
	$mdp=$_GET["mdp"];
	$url1="accueil_inscrit.php";
	$url2="connexion.php";
	include'Connexion_bdd.php';

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
		$_SESSION['id_ind_co']=$tab_ind[$ligne][0];
		header('Location: '.$url1);
		exit();
		
	}
	else
	{
		header('Location: '.$url2."?Message=1" );
	}
?>