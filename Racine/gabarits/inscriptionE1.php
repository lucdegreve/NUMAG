<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page est la premiere des trois pages de formulaire d'inscription à remplir pour un étudiant
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
		<br/>
		<br/>
		<div class="container">
			<div class="card border-danger mb-3">
				<span style="color: red;">
				<div class="card-header">Formulaire d'inscription pour étudiant</div>
				</span>
				<form>
					<div class="container"> 
						<div class="form-row">
							<div class="form-group col-md-6">
								<fieldset class="form-group">
									<div class="row">
									  <legend class="col-form-label col-sm-2 pt-0">Civilité</legend>
									  <div class="col-sm-10">
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="civilite" id="Monsieur" value="option1" required>
										  <label class="form-check-label" for="Monsieur">
											Monsieur
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="civilite" id="Madame" value="option2" required>
										  <label class="form-check-label" for="Madame">
											Madame
										  </label>
										</div>
									  </div>
									</div>
								</fieldset>
							</div>
						</div>
						
						
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputEmail4">Nom</label>
								<input type="text" class="form-control" id="Nom" placeholder="Nom" required>
							</div>
							<div class="form-group col-md-4">
								<label for="inputEmail4">Prenom</label>
								<input type="text" class="form-control" id="Prenom" placeholder="Prenom" required>
							</div>
							<div class="form-group col-md-4">
								<label for="inputEmail4">Date de naissance</label>
								<input type="date" class="form-control" id="Date" placeholder="Date de naissance" required>
							</div>
						</div>
					
					
					
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputEmail4">Email</label>
							  <input type="email" class="form-control" id="Email" placeholder="Email" required>
							</div>
							
							<div class="form-group col-md-6">
							  <label for="inputPassword4"> Mot de passe </label>
							  <input type="password" class="form-control" id="Mdp" placeholder="Mot de passe" required>
							</div>
						</div>
						  
						<div class="form-group">
							<label for="inputAddress">Adresse</label>
							<input type="text" class="form-control" id="Adresse" placeholder="Rue, lieu-dit" required>
						</div>
						<div class="form-group">
							<label for="inputAddress2">Adresse 2</label>
							<input type="text" class="form-control" id="Adresse2" placeholder="Appartement ou autre" required>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputCity">Département</label>
							  <input type="text" class="form-control" id="Region" required>
							</div>
							<div class="form-group col-md-3">
							  <label for="inputZip">Code postal</label>
							  <input type="number" class="form-control" id="Cp" required>
							</div>
						</div>
						  
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck" required>
								<label class="form-check-label" for="gridCheck">
								J'accepte les CGU
								</label>
							</div>
							<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheckNews" required>
								<label class="form-check-label" for="gridCheckNews">
								Recevoir les news
								</label>
							</div>
						  </div>
						  <button type="submit" class="btn btn-danger"> Suite </button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>