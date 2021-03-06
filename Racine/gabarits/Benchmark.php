<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit de la page Benchmark du site
les containers et containers fluids structurent la page d'inscription
Cette page permet à une personne de se connecter au site
Des validations sont mises en place grace aux données de bootstrap-->


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Benchmark </title>

		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include("Entete-VALIDE.php"); ?>
		<br/>
		<form>
			<div class="container">
				<div class="card bg-info">
	  			<div class="card-body">
	    			<h5 class="card-title">Explorez tout le potentiel de Racine</h5>
	    			<p class="card-text">Racine prospose de nombreuses fonctionnalités. Adaptez vos besoins en fonction de nos offres. </p>
	    			<p class="card-text"><small class="text-muted"> Les offres sont valables 12 mois.</small></p>
	  			</div>
	  			<img class="card-img-bottom" src="picto/paysan.jpg" alt="Card image cap">
				</div>
			</div>
			<br/>
			<br/>

			<div class="container">
				<div class="card-deck">
	  			<div class="card">
	    			<img class="card-img-top" src="picto/vert.jpg" alt="Card image cap">
	    			<div class="card-body">
	      			<h5 class="card-title">Privilège découverte</h5>
		      		<p class="card-text">Etre privilégié découverte vous donne les possibilités suivantes : Accès aux bases de données ainsi que des études de marchés.</p>
				    </div>
						<div class="card-footer">
							<small class="text-muted">Parfaitement adapté si vous souhaitez découvrir les possibilités de Racine.</small></p>
							<button type="button" class="btn btn-outline-success btn-block">Découvrir le privilège découverte</button>
						</div>
				  </div>
	  			<div class="card">
				    <img class="card-img-top" src="picto/jaune.jpg" alt="Card image cap">
				    <div class="card-body">
				      <h5 class="card-title">Privilège participatif</h5>
							<p class="card-text">Le privilège participatif vous donne davantage de possiblités que le privilège découverte et vous permet d'accdérer aux bases de données en plus d'analyses poussées.</p>
				    </div>
						<div class="card-footer">
							<small class="text-muted">Un privilège complet qui vous offre encore plus d'avantages.</small></p>
							<button type="button" class="btn btn-outline-warning btn-block">Découvrir le privilège participatif</button>
						</div>
				  </div>
				  <div class="card">
				    <img class="card-img-top" src="picto/rouge.jpg" alt="Card image cap">
				    <div class="card-body">
				      <h5 class="card-title">Privilège premium</h5>
				      <p class="card-text">Le privilège intégral avec l'ensemble du contenu, à savoir : accès auyx bases de données, cartographies et études des sols, conseils agricoles.</p>
				    </div>
						<div class="card-footer">
							<small class="text-muted">Accédez à l'intégralité des possibilités de Racine et consultez l'ensemble des données.</small></p>
							<a href="premium.php" class="btn btn-outline-danger btn-block">Découvrir le privilège premium</a>
						</div>
				  </div>
				</div>
			</div>
		</form>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>
