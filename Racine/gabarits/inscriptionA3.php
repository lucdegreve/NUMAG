<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page est la dernière des trois pages de formulaire d'inscription à remplir pour un agriculteur
Il suffit de cocher les cases voulues
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
				<span style="color: info;">
				<div class="card-header">Formulaire d'inscription pour agriculteurs</div>
				</span>
					<div class="container">
						<br/>
						Veuillez renseigner vos centres d'interets
						<br/>
						<br/>
					</div>
					<div class="container">
						<div class="form-row">
							<form action="Tentative.php" method="post">
								<div class="form-group col-md-4">
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Pintade" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Pintade
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Orge" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Orge
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Apiculture" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Apiculture
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Maraichage" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Maraichage
											</label>
									</div>
								</div>
								<div class="form-group col-md-4">
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Ecologie" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Ecologie
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Oléoprotéagineux" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Oléoprotéagineux
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Viticulture" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Viticulture
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="INRA" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											INRA
											</label>
									</div>
								</div>
								<div class="form-group col-md-4">
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Legumes" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Legumes
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Fraises" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Fraises
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Machinisme" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Machinisme
											</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Limousine" name="centre[]">
											<label class="form-check-label" for="gridCheck">
											Limousine
											</label>
									</div>
								</div>
<<<<<<< Updated upstream:Racine/gabarits/inscriptionA3.php
								<input class="btn btn-info" type="submit" value="Enregistrer">
							</form>
=======
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="Maraichage" >
										<label class="form-check-label" for="gridCheck">
										Maraichage
										</label>
								</div>
							</div>
							<div class="form-group col-md-4">
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="Ecologie" >
										<label class="form-check-label" for="gridCheck">
										Ecologie
										</label>
								</div>
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="Oléoprotéagineux" >
										<label class="form-check-label" for="gridCheck">
										Oléoprotéagineux
										</label>
								</div>
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="Viticulture" >
										<label class="form-check-label" for="gridCheck">
										Viticulture
										</label>
								</div>
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="INRA" >
										<label class="form-check-label" for="gridCheck">
										INRA
										</label>
								</div>
							</div>
							<div class="form-group col-md-4">
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="Legumes" >
										<label class="form-check-label" for="gridCheck">
										Legumes
										</label>
								</div>
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="Fraises" >
										<label class="form-check-label" for="gridCheck">
										Fraises
										</label>
								</div>
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="Machinisme" >
										<label class="form-check-label" for="gridCheck">
										Machinisme
										</label>
								</div>
								<div class="form-check">
										<input class="form-check-input" type="checkbox" id="Limousine" >
										<label class="form-check-label" for="gridCheck">
										Aubrac
										</label>
								</div>
							</div>
>>>>>>> Stashed changes:Racine/gabarits/inscriptionA3.html
						</div>
					</div>
			</div>
		</div>
		<?php include("Pied-VALIDE.html"); ?>
	</body>