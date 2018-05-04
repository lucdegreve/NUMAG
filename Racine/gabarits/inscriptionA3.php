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
		
		<?PHP 
		$link = mysqli_connect('localhost','root','','bdd');
		$query = "SELECT id_mot_cle,libelle_mot_cle FROM mots_cles";
		$result=mysqli_query($link,$query);
		?>
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
						veuillez renseigner vos centres d'interets
						<br/>
						<br/>
					</div>
					<div class="container">
						<div class="form-row">
							<form action="Tentative.php" method="post">
									<?php
										while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
											{
												echo'<div class="form-check">';
												$id=$row["id_mot_cle"];
												$nom =$row["libelle_mot_cle"];
												echo'<input class="form-check-input" type="checkbox" name="centre[]" value='.$nom.' >';
												echo "<option> ".$nom." </option>";
												echo'</div>';
											}	
										?>
								<input type="submit" class="btn btn-info" value="suite" ></input>
							</form>
						</div>
					</div>
			</div>
		</div>
		<?php include("Pied-VALIDE.html"); ?>
	</body>