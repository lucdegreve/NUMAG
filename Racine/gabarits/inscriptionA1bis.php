<!-- Code effectué par Clément Turbillier, modif Diane -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page est la deuxième des six pages de formulaire d'inscription à remplir pour un agriculteur
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
                include "connexion_bdd.php";
                
                //on récupère les données entrées à la page précédente pour les rafficher et pouvoir les modifier
                $civilite=$_GET['civilite'];
		$nom_ind=$_GET['nom_ind'];
		$prenom=$_GET['prenom'];
		$naissance=$_GET['naissance'];
		$mail=$_GET['mail'];
		$mdp=$_GET['mdp'];
		$tel=$_GET['tel'];
		$ad_ind=$_GET['ad_ind'];
		$idcommune=$_GET['commune'];
                
                //on sélectionne le département et le cp de la commune sélectionnée à la page précédente
                $query = "SELECT id_commune, nom_commune, cp, communes.id_dpt, nom_dpt FROM communes
                JOIN departements ON departements.id_dpt = communes.id_dpt
                WHERE id_commune = $idcommune";
		$result=mysqli_query($link,$query);
		$nbligne = mysqli_num_rows($result);
		$nbcol = mysqli_num_fields($result);
                
                $row=mysqli_fetch_array($result,MYSQLI_BOTH);
                $nom_commune=$row['nom_commune'];
                $nom_dpt=$row['nom_dpt'];
                $id_dpt=$row['id_dpt'];
                $cp=$row['cp'];
                
		?>
	</head>
	<body>
		
		<?php include("Entete-VALIDE.php"); ?>
		<br/>
		<br/>
		<div class="container">
			<div class="card border-info mb-3">
				<span style="color: Info;">
				<div class="card-header">Formulaire d'inscription pour agriculteurs</div>
				</span>
				<form action="inscriptionA2.php" method="GET">
					<div class="container"> 
						<div class="form-row">
							<div class="form-group col-md-6">
								<fieldset class="form-group">
									<div class="row">
									  <legend class="col-form-label col-sm-2 pt-0">Civilité</legend>
									  <div class="col-sm-10">
                                                                            <?php
                                                                            //suivant ce qui été coché, on raffiche la même chose, avec possibilité de modifier son choix quand meme sur cette page
                                                                            if ($civilite=="M")
                                                                            {
                                                                              echo'<div class="form-check">';
                                                                                echo'<input class="form-check-input" type="radio" name="civilite" id="monsieur" value="M" checked>';
                                                                                echo'<label class="form-check-label" for="monsieur">';
                                                                                echo' Monsieur';
                                                                                echo'</label>';
                                                                              echo'</div>';
                                                                              echo'<div class="form-check">';
                                                                                echo'<input class="form-check-input" type="radio" name="civilite" id="madame" value="Mme">';
                                                                                echo'<label class="form-check-label" for="madame">';
                                                                                echo' Madame';
                                                                                echo'</label>';
                                                                              echo'</div>';
                                                                            }
                                                                            else
                                                                            {
                                                                              echo'<div class="form-check">';
                                                                                echo'<input class="form-check-input" type="radio" name="civilite" id="monsieur" value="M" >';
                                                                                echo'<label class="form-check-label" for="monsieur">';
                                                                                echo' Monsieur';
                                                                                echo'</label>';
                                                                              echo'</div>';
                                                                              echo'<div class="form-check">';
                                                                                echo'<input class="form-check-input" type="radio" name="civilite" id="madame" value="Mme" checked>';
                                                                                echo'<label class="form-check-label" for="madame">';
                                                                                echo' Madame';
                                                                                echo'</label>';
                                                                              echo'</div>';
                                                                            }
                                                                            ?>
                                                                            </div>
									</div>
								</fieldset>
							</div>
						</div>
						
						
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputNom">Nom</label>
								<?php echo'<input type="text" class="form-control" name="nom_ind" value="'.$nom_ind.'" required>'?>
							</div>
							<div class="form-group col-md-4">
								<label for="inputPrenom">Prenom</label>
								<?php echo'<input type="text" class="form-control" name="prenom" value="'.$prenom.'" required>'?>
							</div>
							<div class="form-group col-md-4">
								<label for="inputDate">Date de naissance</label>
								<?php echo '<input type="date" class="form-control" name="naissance" value='.$naissance.' required>'?>
							</div>
						</div>
					
					
					
						<div class="form-row">
							<div class="form-group col-md-4">
							  <label for="inputEmail">Email</label>
							  <?php echo'<input type="email" class="form-control" name="mail" value='.$mail.' required>'?>
							</div>
							
							<div class="form-group col-md-4">
							  <label for="inputPassword"> Mot de passe </label>
							  <?php echo'<input type="password" class="form-control" name="mdp" value="'.$mdp.'" required>'?>
							</div>
							
							<div class="form-group col-md-4">
							  <label for="inputPassword"> Telephone </label>
							  <?php echo'<input type="text" class="form-control" name="tel" value='.$tel.' required>'?>
							</div>
						</div>
						  
						<div class="form-group">
							<label for="inputAdresse">Adresse</label>
							<?php echo'<input type="text" class="form-control" name="ad_ind" value="'.$ad_ind.'" required>'?>
						</div>
						
						
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputCommune">Commune</label>
								<select class="form-control" name="commune">
									<?php echo '<option value=$idcommune> "'.$nom_commune.'" </option>';?>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="inputDpt">Département</label>
								<select class="form-control" name="departement">
									<?php echo "<option value=$id_dpt> ".$nom_dpt." </option>";?>
								</select>
							</div>
							<div class="form-group col-md-4">
							  <label for="inputCp">Code postal</label>
							  <?php echo '<input type="number" class="form-control" name="cp" value='.$cp.' required>';?>
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
								<input class="form-check-input" type="checkbox" id="gridCheckNews" >
								<label class="form-check-label" for="gridCheckNews">
								Recevoir les news
								</label>
							</div>
						  </div>
						  <input type="submit" class="btn btn-info" value="Suite" ></input>
						</div>
					</div>
				</form>
			</div>
		</div>
		<br/>
		<br/>
		<?php include("Pied-VALIDE.html"); ?>
	</body>