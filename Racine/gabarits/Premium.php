<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit de la page premium du site
les containers et containers fluids structurent la page d'inscription
Cette page permet à une personne de se connecter au site
Des validations sont mises en place grace aux données de bootstrap-->


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> privilège premium </title>

		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include("Entete-VALIDE.php"); ?>
		<br/>
		<br/>
		<form>
			<div class="container">
				<div class="jumbotron">
					<div class="card-columns">
					  <div class="card border-danger">
					    <img class="card-img-top" src="picto/carte.jpg" alt="Card image cap">
					    <div class="card-body">
					      <h5 class="card-title">Accédez à de multiples informations cartographiques</h5>
					      <p class="card-text">Racine dispose d'une base de données avec une grande quantité d'informations. <br/> Qualité des sols, richesse en microfaune et réserve utile. Profitez de toutes ces données pour perfectionner et optimiser vos cultures.</p>
					    </div>
					  </div>

						<div class="card border-danger">
					    <div class="card-body">
					      <h5 class="card-title"> Assistance </h5>
					      <p class="card-text">Racine propose une aide personalisée pour vous permettre de gérer au mieux votre profil ainsi que vos contacts.</p>
					      <p class="card-text"><small class="text-muted">Nos conseillers seront là pour vous !</small></p>
					    </div>
					  </div>

						<div class="card text-white bg-danger text-center p-3">
					    <blockquote class="blockquote mb-0">
					      <p>Découvrez toutes les capacités de la plateforme Racine et exploitez toutes les fonctionnalités du site.</p>
					    </blockquote>
					  </div>

					  <div class="card border-danger">
					    <img class="card-img-top" src="picto/annuaire.png" alt="Card image cap">
					    <div class="card-body">
					      <h5 class="card-title">Consultez l'annuaire exploitants</h5>
					      <p class="card-text">Les multiples acteurs de Racine peuvent etre contacté d'un simple clique. Recherchez un profil qui vous interesse et contactez le ! </p>
					      <p class="card-text"><small class="text-muted">Plus de 3 000 inscrits sont déjà disponibles </small></p>
					    </div>
					  </div>

						<div class="card border-danger">
							<div class="card-header">Découvrez les espaces agricoles des environs</div>
					    <div class="card-body">
					      <p class="card-text">Nous proposons une localisation d'exploitations agricoles qui participent à l'évolution de notre platteforme. </p>
								<img class="card-img-top" src="picto/localisation.png" alt="Card image cap">
							</div>
					  </div>

						<div class="card text-center border-danger">
							<div class="card-header"> <h5> Comparatif </h5> </div>
					    <div class="card-body">
					      <p class="card-text">Evaluez les performances de votre exploitation en la comparant à d'autres exploitations de même type. Découvrez nos solutions en cas de faible performances.</p>
					      <p class="card-text"><small class="text-muted">Vos données restent confidentielles. </small></p>
					    </div>
					  </div>
					</div>
					<br/>
					<button type="button" class="btn btn-outline-danger btn-lg btn-block"> <h5> Je souhaite passer premium </h5> </button>
				</div>
			</div>
		</form>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>
