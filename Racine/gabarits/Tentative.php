<!-- Menu codé par Clément	Turbillier-->
<!-- Il s'agit du haut de page avec les menu de navigation qui permet d'accéder à chaque page du site
Bootstrap assure un aspect graphique élégant-->


<!--<HTML>
	<head>
		<meta charset="utf-8">
		<title> Entete </title>-->
		
		<!-- css -->
		<!--<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<li>
			Centres d'interets :
			<ul>
				<?php /*foreach($_POST['centre'] as $centre); ?>
					<li><?php echo $centre; ?></li>
				<?php endforeach; */?>
			</ul>
		</li> 
	</body>
</HTML>-->

<!-- Modifications : Diane -->

<?php
/*
Cette page est la sixième des six pages de formulaire d'inscription à remplir pour un agriculteur
Cette page n'affiche rien, elle envoie juste des données (centres d'intéret de
l'agriculteurqui vient de s'inscrire) et renvoie à la page de connexion*/
Include("connexion_bdd.php");

//Pour chaque CI sélectionné on l'ajoute dans la table centres_interet avec une valeur de 5.
$id_ind=$_POST['id_ind'];
foreach($_POST['centre'] as $centre)
{
    $query="INSERT INTO centres_interet (id_ind, id_mot_cle, compteur)
    VALUES ($id_ind, $centre, 5)";
    $result=mysqli_query($link,$query);
}

//Ouvre la page
header('Location: connexion.php');
  exit();
?>