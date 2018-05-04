<!-- Menu codé par Clément	Turbillier-->
<!-- Il s'agit du haut de page avec les menu de navigation qui permet d'accéder à chaque page du site
Bootstrap assure un aspect graphique élégant-->


<HTML>
	<head>
		<meta charset="utf-8">
		<title> Entete </title>
		
		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<li>
			centres d'interets :
			<ul>
				<?php foreach($_POST['centre'] as $centre): ?>
					<li><?php echo $centre; ?></li>
				<?php endforeach; ?>
			</ul>
		</li> 
	</body>
</HTML>

<?php
$id_ind=$_POST['id_ind'];
//$link = mysqli_connect('localhost','root','','bdd_racine_beta_27.04.5');
$link = mysqli_connect('localhost','root','root','BDD');
foreach($_POST['centre'] as $centre)
{
    $query="INSERT INTO centres_interet (id_ind, id_mot_cle)
    VALUES ($id_ind, $id_type_prod)";
    $result=mysqli_query($link,$query);
}