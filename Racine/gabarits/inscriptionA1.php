<!-- Code effectué par Clément Turbillier, modif Diane -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page est la premiere des six pages de formulaire d'inscription à remplir pour un agriculteur
Des validations sont mises en place grace aux données de bootstrap-->

<!DOCTYPE html>



<html>
	<head>
		<meta charset="utf-8">
		<title> Formulaire d'inscription </title>
		
		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
                
		<?php
		include("Entete-NC.php");
                Include("connexion_bdd.php");
                
                $query = "SELECT id_commune,nom_commune, cp, communes.id_dpt, nom_dpt FROM communes
                JOIN departements ON departements.id_dpt = communes.id_dpt ORDER BY nom_commune";
		$result=mysqli_query($link,$query);
		$nbligne = mysqli_num_rows($result);
		$nbcol = mysqli_num_fields($result);
                                
		?>
	</head>
	<body>
		<br/>
		<br/>
		<div class="container">
			<div class="card border-info mb-3">
				<span style="color: Info;">
				<div class="card-header">Formulaire d'inscription pour agriculteurs</div>
				</span>
				<form action="inscriptionA1bis.php" method="GET" >
					<div class="container"> 
						<div class="form-row">
							<div class="form-group col-md-6">
								<fieldset class="form-group">
									<div class="row">
									  <legend class="col-form-label col-sm-2 pt-0">Civilité</legend>
									  <div class="col-sm-10">
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="civilite" value="M" required>
										  <label class="form-check-label" for="monsieur">
											Monsieur
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="civilite" value="Mme" required>
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
								<input type="text" class="form-control" name="nom_ind" placeholder="Nom" required>
							</div>
							<div class="form-group col-md-4">
								<label for="inputPrenom">Prenom</label>
								<input type="text" class="form-control" name="prenom" placeholder="Prenom" required>
							</div>
							<div class="form-group col-md-4">
								<label for="inputDate">Date de naissance</label>
								<input type="date" class="form-control" name="naissance" placeholder="Date de naissance" required>
							</div>
						</div>
					
					
					
						<div class="form-row">
							<div class="form-group col-md-4">
							  <label for="inputEmail">Email</label>
							  <input type="email" class="form-control" name="mail" placeholder="Email" required>
							</div>
							
							<div class="form-group col-md-4">
							  <label for="inputPassword"> Mot de passe </label>
							  <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
							</div>
							
							<div class="form-group col-md-4">
							  <label for="inputPassword"> Telephone </label>
							  <input type="text" class="form-control" name="tel" placeholder="06xxxxxxxx" required>
							</div>
						</div>
						  
						<div class="form-group">
							<label for="inputAdresse">Adresse</label>
							<input type="text" class="form-control" name="ad_ind" placeholder="Rue, lieu-dit" required>
						</div>
						
						
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputCommune">Commune</label>
								<select class="form-control" name="commune">
									<?php
										while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
                                                                                        {
                                                                                                $id=$row["id_commune"];
                                                                                                $nom =$row["nom_commune"];
                                                                                                echo "<option value='$id'> ".$nom." </option>";
                                                                                        }	
                                                                                ?>
								</select>
							</div>
						</div>
						  <input type="submit" class="btn btn-info" value="Suite" ></input>
					</div>
				</form>
			</div>
		</div>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>