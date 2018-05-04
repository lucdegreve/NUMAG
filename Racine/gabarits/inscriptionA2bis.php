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
		include("Entete-VALIDE.php");
		//$link = mysqli_connect('localhost','root','','bdd_racine_beta_27.04.5');
                $link = mysqli_connect('localhost','root','root','BDD');
		$nom_exp=$_GET['nom_exp'];
		$sirene=$_GET['sirene'];
		$libel_type_prod=$_GET['libel_type_prod'];
		$desc_exp=$_GET['desc_exp'];
		$ad_exp=$_GET['ad_exp'];
		$commune_exp=$_GET['commune_exp'];
                $id_ind=$_GET['id_ind'];
		?>
		<br/>
		<BR/>
		<div class="container">
			<div class="card border-info mb-3">
				<span style="color: info;">
				<div class="card-header">Formulaire d'inscription pour agriculteurs</div>
				</span>
				<form action="inscriptionA3.php" method="GET">
					<div class="container"> 
						<div class="form-row">
							<div class="form-group col-md-7">
								<label for="inputExploit">Nom de l'exploitation</label>
								<?php echo'<input type="text" class="form-control" name="nom_exp" value='.$nom_exp.' required>';?>
							</div>
							<div class="form-group col-md-5">
								<label for="inputSIRENE">SIRENE</label>
								<?php echo'<input type="text" class="form-control" name="sirene" value='.$sirene.' required>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Type de production</label>
							<?php echo'<input type="text" class="form-control" name="libel_type_prod" value='.$libel_type_prod.' required>';?>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Description de l'exploitation</label>
							<?php echo'<input type="text" class="form-control" name="desc_exp" value='.$desc_exp.' required>';?>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Adresse de l'exploitation</label>
							<?php echo'<input type="text" class="form-control" name="ad_exp" value='.$ad_exp.' required>';?>
						</div>
                                                
                                                <?php echo'<input type="hidden" name="id_ind" value='.$id_ind.'>';?>
						
						<?PHP 
						/*$query1 = "SELECT id_commune,nom_commune FROM communes";
						$result1=mysqli_query($link,$query1);
						$nbligne1 = mysqli_num_rows($result1);
						$nbcol1 = mysqli_num_fields($result1);
						
						$query2 = "SELECT id_dpt,nom_dpt FROM departements";
						$result2=mysqli_query($link,$query2);
						$nbligne2 = mysqli_num_rows($result2);
						$nbcol2 = mysqli_num_fields($result2);*/
                                                
                                                $query1 = "SELECT id_commune, nom_commune, cp, communes.id_dpt, nom_dpt FROM communes
                                                JOIN departements ON departements.id_dpt = communes.id_dpt
                                                WHERE id_commune = $commune_exp";
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
									<<?php echo "<option value=$idcommune> ".$nom_commune." </option>";?>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="inputDpt">Département</label>
								<select class="form-control" name="dpt_exp">
									<?php echo "<option value=$id_dpt> ".$nom_dpt." </option>";?>
								</select>
							</div>
							<div class="form-group col-md-4">
							  <label for="inputCp">Code postal</label>
							  <?php echo '<input type="number" class="form-control" name="cp" value='.$cp.' required>';?>
							</div>
							
						</div>
						
						<input type="submit" class="btn btn-info" value="Suite" ></input>
					</div>
				</form>
			</div>
		</div>
		<?php include("Pied-VALIDE.html"); ?>
	</body>