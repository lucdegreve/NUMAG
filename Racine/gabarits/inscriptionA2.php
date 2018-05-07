<!-- Code effectué par Clément Turbillier, modif Diane -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page est la troisième des six pages de formulaire d'inscription à remplir pour un agriculteur
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
		include("Entete-NC.php");
		Include("connexion_bdd.php");
                
		$civilite=$_GET['civilite'];
		$nom_ind=$_GET['nom_ind'];
		$prenom=$_GET['prenom'];
		$naissance=$_GET['naissance'];
		$mail=$_GET['mail'];
		$mdp=$_GET['mdp'];
		$tel=$_GET['tel'];
		$ad_ind=$_GET['ad_ind'];
		$idcommune=$_GET['commune'];
		$query="INSERT INTO individus(id_prof, id_commune, nom_ind, prenom, civilite, naissance, ad_ind, tel, mail, mdp)
                VALUES (1, $idcommune, '$nom_ind', '$prenom', '$civilite', '$naissance', '$ad_ind', '$tel', '$mail', '$mdp')";
		$result=mysqli_query($link,$query);
                //Récupération de l'id individus crée
                $id_ind=mysqli_insert_id($link);
		?>
		<br/>
		<BR/>
		<div class="container">
			<div class="card border-info mb-3">
				<span style="color: info;">
				<div class="card-header">Formulaire d'inscription pour agriculteurs</div>
				</span>
				<form action="inscriptionA2bis.php" method="GET">
					<div class="container"> 
						<div class="form-row">
							<div class="form-group col-md-7">
								<label for="inputExploit">Nom de l'exploitation</label>
								<input type="text" class="form-control" name="nom_exp" placeholder="Nom de l'exploitation" required>
							</div>
							<div class="form-group col-md-5">
								<label for="inputSIRENE">SIRENE</label>
								<input type="text" class="form-control" name="sirene" placeholder="numero sirene" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Type de production</label>
							<input type="text" class="form-control" name="libel_type_prod" placeholder="ferme laitière ou autre" required>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Description de l'exploitation</label>
							<input type="text" class="form-control" name="desc_exp" placeholder="ferme laitière avec atelier de transformation " required>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Adresse de l'exploitation</label>
							<input type="text" class="form-control" name="ad_exp" placeholder="Rue, lieu-dit" required>
						</div>
                                                
                                                <?php echo'<input type="hidden" name="id_ind" value='.$id_ind.'>';?>
						
						<?PHP
                                                
                                                $query1 = "SELECT id_commune, nom_commune, cp, communes.id_dpt, nom_dpt FROM communes
                                                JOIN departements ON departements.id_dpt = communes.id_dpt ORDER BY nom_commune";
                                                $result1=mysqli_query($link,$query1);
                                                $nbligne = mysqli_num_rows($result1);
                                                $nbcol = mysqli_num_fields($result1);
                                                
                                                $row=mysqli_fetch_array($result1,MYSQLI_BOTH);
                                                $nom_commune=$row['nom_commune'];
                                                $nom_dpt=$row['nom_dpt'];
                                                $id_dpt=$row['id_dpt'];
                                                $cp=$row['cp'];
						?>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputCommune">Commune</label>
								<select class="form-control" name="commune_exp">
									<?php
										while($row=mysqli_fetch_array($result1,MYSQLI_BOTH))
										{
											$id=$row["id_commune"];
											$nom =$row["nom_commune"];
											echo "<option value=$id>$nom</option>";
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
		<?php include("Pied-VALIDE.html"); ?>
	</body>