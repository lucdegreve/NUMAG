<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page est la deuxième des trois pages de formulaire d'inscription à remplir pour un agriculteur
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
		<BR/>
		<div class="container">
			<div class="card border-info mb-3">
				<span style="color: info;">
				<div class="card-header">Formulaire d'inscription pour agriculteurs</div>
				</span>
				<form>
					<div class="container"> 
						<div class="form-row">
							<div class="form-group col-md-7">
								<label for="inputExploit">Nom de l'exploitation</label>
								<input type="text" class="form-control" id="nom_exp" placeholder="Nom de l'exploitation" required>
							</div>
							<div class="form-group col-md-5">
								<label for="inputSIRENE">SIRENE</label>
								<input type="text" class="form-control" id="sirene" placeholder="numero sirene" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Type de production</label>
							<input type="text" class="form-control" id="libel_type_prod" placeholder="ferme laitière ou autre" required>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Description de l'exploitation</label>
							<input type="text" class="form-control" id="desc_exp" placeholder="ferme laitière avec atelier de transformation " required>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Adresse de l'exploitation</label>
							<input type="text" class="form-control" id="ad_exp" placeholder="Rue, lieu-dit" required>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputDpt">Département</label>
							  <input type="text" class="form-control" id="id_dpt" required>
							</div>
							<div class="form-group col-md-3">
							  <label for="inputCP">Code postal</label>
							  <input type="number" class="form-control" id="cp" required>
							</div>
						</div>
						<div class="form-group">
							<a href="inscriptionA3.php" class="btn btn-info"> Suite </a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php include("Pied-VALIDE.html"); ?>
	</body>