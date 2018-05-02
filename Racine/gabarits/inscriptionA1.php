<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page est la premiere des trois pages de formulaire d'inscription à remplir pour un agriculteur
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
			<div class="card border-info mb-3">
				<span style="color: Info;">
				<div class="card-header">Formulaire d'inscription pour agriculteurs</div>
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
										  <input class="form-check-input" type="radio" name="civilite" id="monsieur" value="option1" required>
										  <label class="form-check-label" for="monsieur">
											Monsieur
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="civilite" id="madame" value="option2" required>
										  <label class="form-check-label" for="madame">
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
								<label for="inputNom">Nom</label>
								<input type="text" class="form-control" id="nom_ind" placeholder="Nom" required>
							</div>
							<div class="form-group col-md-4">
								<label for="inputPrenom">Prenom</label>
								<input type="text" class="form-control" id="prenom" placeholder="Prenom" required>
							</div>
							<div class="form-group col-md-4">
								<label for="inputDate">Date de naissance</label>
								<input type="date" class="form-control" id="naissance" placeholder="Date de naissance" required>
							</div>
						</div>
					
					
					
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputEmail">Email</label>
							  <input type="email" class="form-control" id="mail" placeholder="Email" required>
							</div>
							
							<div class="form-group col-md-6">
							  <label for="inputPassword"> Mot de passe </label>
							  <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" required>
							</div>
						</div>
						  
						<div class="form-group">
							<label for="inputAdresse">Adresse</label>
							<input type="text" class="form-control" id="ad_ind" placeholder="Rue, lieu-dit" required>
						</div>
						<div class="form-group">
							<label for="inputAdresse2">Adresse 2</label>
							<input type="text" class="form-control" id="ad_ind2" placeholder="Appartement ou autre" required>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputDpt">Département</label>
							  <input type="text" class="form-control" id="id_dpt" required>
							</div>
							<div class="form-group col-md-3">
							  <label for="inputCp">Code postal</label>
							  <input type="number" class="form-control" id="cp" required>
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
						  <a href="inscriptionA2.php" class="btn btn-info"> Suite </a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>