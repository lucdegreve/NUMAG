<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit de la page de connexion inscription du site
les containers et containers fluids structurent la page d'inscription
Cette page apparait sur la page d'acceuil.
L'utilisateur habitué pourra donc se connecter et le nouveau pourra s'inscrire
Des validations sont mises en place grace aux données de bootstrap-->


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Acceuil RACINE </title>

		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include("Entete-NC.php"); ?>
		<div class="container">
			<br/>
			<br/>
			<div class="jumbotron ">
				<h1 class="display-4">Bienvenue sur Racine!</h1>
				<p class="lead"> Le premier réseau social entre agriculteurs </p>
				<hr class="my-4">
				<p>Connectez vous avec de multiples acteurs du monde agricole, que vous soyez étudiant ou professionnel</p>
				<br/>

				<div class="row text-center">
					<div class="col-md-6">
						<a class="btn btn-info btn-lg btn-block" href="connexion.php" role="button"> Connexion </a>
					</div>

					<div class="col-md-6">
						<a class="btn btn-outline-info btn-lg btn-block" href="inscriptionG.php" role="button"> Inscription </a>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="card-group">
				<div class="card border-info">
					<div class="card-body">
						<h5 class="card-title">Consultez des informations agricoles</h5>
						<p class="card-text">Vous pouvez avoir accès à un grand choix de données concernant diverses caractéristiques du monde agricole. De nombreuses informations s'offrent à vous.</p>
					</div>
					<img class="card-img-top" src="picto/news.png" alt="Card image cap">
					<div class="card-footer text-center"><p class="card-text"><small class="text-muted">Richesse d'informations !</small></p></div>
				</div>
				<div class="card border-info">
					<div class="card-body">
						<h5 class="card-title">Trouvez et proposez des stages</h5>
						<p class="card-text">Vous avez la possibilité en tant qu'étudiant de rechercher un stage en exploitation agricole. Si vous etes agriculteur vous pouvez proposer rapidement des offres.</p>
					</div>
					<img class="card-img-top" src="picto/stage.jpg" alt="Card image cap">
					<div class="card-footer text-center"><p class="card-text"><small class="text-muted">Efficacité et simplicité !</small></p></div>
				</div>
				<div class="card border-info">
					<div class="card-body">
						<h5 class="card-title">Créez et consultez des projets</h5>
						<p class="card-text">Envie de créer un projet à grande échelle ? Racine vous propose de concevoir un projet et de le présenter à l'ensemble des utilisateurs. Vous pouvez également consulter et soutenir des projets déjà existants.</p>
					</div>
					<img class="card-img-top" src="picto/projet.png" alt="Card image cap">
					<div class="card-footer text-center"><p class="card-text"><small class="text-muted">Lancez vous!</small></p></div>
				</div>
			</div>
		</div>
		<br/>
		<br/>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>
</html>
