<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire de connexion du site
les containers et containers fluids structurent la page d'inscription 
Cette page permet à une personne de se connecter au site
Des validations sont mises en place grace aux données de bootstrap-->


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Formulaire de connexion </title>
		
		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include("Entete-VALIDE.html"); ?>
		<br/>
		<br/>
		<br/>
		<form>
			<div class="container">
				<div class="form-group">
					<label for="exampleInputEmail1"> Adresse mail </label>
					<input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="entrez email" required>
					<small id="emailHelp" class="form-text text-muted"> Cette adresse mail est confidentielle </small>
				</div>
			  <div class="form-group">
				<label for="exampleInputPassword1"> Mot de passe </label>
				<input type="password" class="form-control" id="mdp" placeholder="entrez mot de passe" required>
				<small id="emailHelp" class="form-text text-muted"> votre mot de passe doit contenir au moins 5 caractères </small>
			  </div>
			  <button type="submit" class="btn btn-info"> Connexion </button>
			</div>
		</form>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>