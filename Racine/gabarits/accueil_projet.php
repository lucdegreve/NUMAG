<!-- Script de l'accueil des projets avec bouton de cration de projet, recherche et affichage des projets
By Manuel, Julien Louet et Marie -->
<?php
session_start();
$id_ind_co=$_SESSION["id_ind_co"];
?>
<html>

<head>
	<meta charset="UTF-8">
	<title>Accueil Projet</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<?php Include("Entete-VALIDE.php");
	include("Connexion-bdd.php");?>
	?>
	<br/>
	<br/>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-1">

			</div>
			<div class="col-lg-3">
				<h1>Projets</h1>
			</div>
			<div class="col-lg-8">
				<a class="btn btn-secondary btn-lg center-block" href = "creation_projet.php" > Créer un projet  </a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-4">
				<div class="jumbotron HauteurMax">
					<h2>Recherche</h2>
					<hr class="my-4">
					<div class="container">
						<form action='Resultat_recherche_projet.php' method='GET'  name='form2'>
							<div class="form-group">
								<?php
								$query="SELECT  libelle_mot_cle FROM projets
								INNER JOIN mot_cle_projet
								ON projets.id_proj=mot_cle_projet.id_proj
								INNER JOIN mots_cles
								ON mot_cle_projet.id_mot_cle=mots_cles.id_mot_cle";
								$result=mysqli_query($link,$query);
								$Tab=mysqli_fetch_all($result);
								$nbligne=mysqli_num_rows($result); ?>
								<p class="lead">Mot clé</p>
								<select class="form-control" name='listetag'>
									<?php
									for ($i=0; $i<$nbligne; $i++)
									{

										echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
										echo "<br/>";

									} ?>
								</select>
							</div>
							<hr class="my-4">
							<div class="form-group">
								<?php
								$query="SELECT  nom_dpt FROM departements";
								$result=mysqli_query($link,$query);
								$Tab=mysqli_fetch_all($result);
								$nbligne=mysqli_num_rows($result); ?>
								<p class="lead">Département</p>
								<select class="form-control" name='listedpt'>
									<?php
									for ($i=0; $i<$nbligne; $i++)
									{

										echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
										echo "<br/>";

									} ?>
								</select>
							</div>
							<hr class="my-4">
							<div class="form-group">
								<?php
								$query="SELECT  libelle_statut FROM statuts";
								$result=mysqli_query($link,$query);
								$Tab=mysqli_fetch_all($result);
								$nbligne=mysqli_num_rows($result); ?>
								<p class="lead">Statut du projet</p>
								<select class="form-control" name="listestatut">
									<?php
									for ($i=0; $i<$nbligne; $i++)
									{

										echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
										echo "<br/>";

									} ?>
								</select>
							</div>
							<hr class="my-4">
							<button type="button" class="btn btn-info btn-lg center-block" name="button">Rechercher</button>
						</form>
					</div>

				</div>
			</div>
			<div class="col-lg-8">
				<div class="jumbotron HauteurMax">
					<?php
					$query_SP="SELECT titre_proj, libelle_statut, projets.id_proj, SUM(centres_interet.compteur) AS Score_projet
					FROM centres_interet, mots_cles, mot_cle_projet, projets, statuts
					WHERE centres_interet.id_ind=".$id_ind_co."
					AND centres_interet.id_mot_cle=mots_cles.id_mot_cle
					AND mots_cles.id_mot_cle=Mot_cle_projet.id_mot_cle
					AND mot_cle_projet.id_proj=projets.id_proj
					AND projets.id_statut=statuts.id_statut
					GROUP BY id_proj
					ORDER BY Score_projet DESC"; // SP=Score projet
					$result_SP=mysqli_query($link,$query_SP);
					$tab_SP=mysqli_fetch_all($result_SP);
					$nblig_SP=mysqli_num_rows($result_SP);
					$nbcol_SP=mysqli_num_fields($result_SP);

					for ($i=0; $i<$nblig_SP; $i++){

						echo "<ul class='list-group'>";
							echo "<li class='list-group-item border-info mb-3'>";
								echo "<div class='d-flex w-100 justify-content-between MargeHaute'>";
									echo "<p class='lead'>".$tab_SP[$i][0]."</p>";
									echo "<small class='text-muted'>".$tab_SP[$i][1]."</small>";
								echo "</div>";
								echo "<button type='button' class='btn btn-outline-info btn-block' name='button'>Consulter</button>";
							echo "</li>";

						echo "</ul>";
						echo "<br/>";
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<br/>
	<?php include("Pied-VALIDE.html"); ?>

</body>
</html>
