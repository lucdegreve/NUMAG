<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription
Cette page permet à une personne de se connecter au site
Des validations sont mises en place grace aux données de bootstrap-->


<html>
	<head>
		<meta charset="utf-8">
		<title> Formulaire de connexion </title>

		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<?php include("Entete-NC.php"); ?>
	<?php
		$Message=0;
		@$Message=$_GET["Message"];
		if ($Message==1)
		{
			echo 'Veuillez vérifier votre identifiant et votre mot de passe puis réessayez de vous connecter au site Racine';
		}
	?>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<form action="Alerteconnexion.php" method="GET" name="F1">
			<br/>
				<div class="container">
					<div class="form-group">
						<label for="exampleInputEmail1"> Adresse mail </label>
						<input type="email" class="form-control" id="mail" name="mail"  aria-describedby="emailHelp" placeholder="Entrez votre email" required>
						<small id="emailHelp" class="form-text text-muted"> Cette adresse mail est confidentielle </small>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1"> Mot de passe </label>
						<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" required>
						<small id="emailHelp" class="form-text text-muted"> Votre mot de passe doit contenir au moins 5 caractères </small>
					</div>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
				<div class="col-md-2">
					<input type="submit" class="btn btn-info btn-block" VALUE =" Connexion ">
					</input>
			</form>
					<a class="nav-link" href="connexion.php"><p class="text-dark" style=font-size:0.5em>Mot de passe oublié ?</p></a>
				</div>
			<form action="inscriptionG.php" method="GET" name="F2">
				<div class="col-md-12">
					<input type="submit" class="btn btn-danger btn-block" VALUE =" Vous n'êtes pas encore inscrit ? ">
					</input>
				</div>
			</form>
	</div>
			<br/>
			<br/>
			<br/>
			<br/>

		<?php include("Pied-VALIDE.html"); ?>
	</body>
