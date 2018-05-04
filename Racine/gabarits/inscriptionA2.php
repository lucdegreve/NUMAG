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
		<?php
		include("Entete-VALIDE.html");
		$link = mysqli_connect('localhost','root','','bdd_racine_beta_27.04');
		$civilite=$_GET['civilite'];
		$nom_ind=$_GET['nom_ind'];
		$prenom=$_GET['prenom'];
		$naissance=$_GET['naissance'];
		$mail=$_GET['mail'];
		$mdp=$_GET['mdp'];
		$tel=$_GET['tel'];
		$ad_ind=$_GET['ad_ind'];
		$departement=$_GET['departement'];
		$commune=$_GET['commune'];
		$q_comm="SELECT id_commune FROM communes WHERE nom_commune=".$commune."";
		$r_comm=mysqli_query($link,$q_comm);
		$t_comm=mysqli_fetch_all($link,$r_comm);
		$commune=$t_comm[0][0];
		echo $commune;
		$cp=$_GET['cp'];
		?>
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
						
						<?PHP 
						$link = mysqli_connect('localhost','root','','bdd_racine_beta_27.04');
						$query = "SELECT id_commune,nom_commune FROM communes";
						$result=mysqli_query($link,$query);
						$nbligne = mysqli_num_rows($result);
						$nbcol = mysqli_num_fields($result);
						
						$query2 = "SELECT id_dpt,nom_dpt FROM departements";
						$result2=mysqli_query($link,$query2);
						$nbligne2 = mysqli_num_rows($result2);
						$nbcol2 = mysqli_num_fields($result2);
						?>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputDpt">Département</label>
								<select class="form-control" name="dpt_exp">
									<?php
										while($row=mysqli_fetch_array($result2,MYSQLI_BOTH))
											{
												$id=$row["id_dpt"];
												$nom =$row["nom_dpt"];
												echo "<option> ".$nom." </option>";
											}	
									?>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="inputCommune">Commune</label>
								<select class="form-control" name="commune_exp">
									<?php
										while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
										{
											$id=$row["id_commune"];
											$nom =$row["nom_commune"];
											echo "<option> ".$nom." </option>";
										}	
									?>
								</select>
							</div>
							<div class="form-group col-md-4">
							  <label for="inputCp">Code postal</label>
							  <input type="number" class="form-control" id="cp_exp" required>
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