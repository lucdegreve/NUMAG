<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page permet à une personne de choisir si elle s'inscrit en tant qu'étudiant ou en tant qu'agriculteur
Des validations sont mises en place grace aux données de bootstrap-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Formulaire d'inscription </title>
		
		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include("Entete-VALIDE.html"); ?>
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
			<h1 class="display-4">Inscription</h1>
			<p class="lead">Inscrivez vous en fonction de votre statut. Vous êtes étudiant ou agriculteur ? </p>
		  </div>
		</div>
		<br/>
		<br/>
			<div class="container">
				<div class="card-deck">
					<div class="form-group col-md-6">
						<div class="card border-info mb-6" style="max-width: 18rem;">
							<div class="card-body text-info">
								<h5 class="card-title">Vous êtes agriculteur</h5>
								<p class="card-text">Accédez au premier réseau social entre agriculteurs. Disposez de multiples informations du monde agricole.</p>
								<a href="inscriptionA1.php" class="btn btn-info"> Inscription en tant qu'agriculteur </a>
							</div>
						</div>
					</div>
					
					<div class="form-group col-md-6">
						<div class="card border-danger mb-6" style="max-width: 18rem;">
							<div class="card-body text-danger">
								<h5 class="card-title">Vous êtes étudiant</h5>
								<p class="card-text">Découvrez le monde agricole et entrez en contact avec de nombreux agriculteurs. Trouver un stage n'a jamais été aussi simple.</p>
								<a href="inscriptionE1.php" class="btn btn-danger"> Inscription en tant qu'étudiant </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<br/>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>
			
			
		
		
		
		
		
		
		