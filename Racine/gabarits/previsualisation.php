<!--Manuel Marie et Julien -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Prévisualisation</title>
	</head>
	<body>
		<?php
			session_start();
			$tab=$_SESSION['tab'];
			$id_ind_co=$_SESSION["id_ind_co"];
			$description=$_GET["desc_proj"];
			$duree=$_GET["duree"];
			$titre=$_GET["titre_proj"];
			$etat=$_GET["etatprojet"];
			$date=$_GET["date_proj"];
			$sout=1;
			$listetags=array();
			$i=0;
			Include("Connexion_bdd.php");
			Include("Entete-VALIDE.php");
				//On récupère les coordonnées de l'agriculteur grâce à l'id_ind_co
				$query="SELECT individus.id_ind, individus.nom_ind, individus.prenom, individus.tel, individus.mail, communes.nom_commune
						FROM individus inner join communes
						ON individus.id_commune=communes.id_commune
						WHERE individus.id_ind='".$id_ind_co."'";


				$result=mysqli_query($link,$query);

				$Tab_res=mysqli_fetch_all($result);
				$nbligne=mysqli_num_rows($result);
				$nbcol=mysqli_num_fields($result);
			?>
			<br>
			<br>
			<div class="container">
				<div class="jumbotron">
					<h2><?php echo $titre; ?></h2>
					<hr class="my-4">
					<div class="row">
						<div class="col-lg-8">
							<h4>Description</h4>
							<p class="text-justify lead"><?php echo $description; ?></p>
							<hr class="my-4">
							<h4>Durée</h4>
							<p class="lead"><?php echo $duree; ?></p>
							<hr class="my-4">
							<h4>Tags</h4>
							<p class="lead"><?php
							while ($i<count($tab))
							{
								echo $tab[$i];
								echo ', ';
								$i++;
							} ?></p>
							<hr class="my-4">
							<h4>Etat</h4>
							<p class="lead"><?php echo $etat; ?></p>
						</div>
						<div class="col-lg-4">
							<h4>Lieu</h4>
							<p class="lead"><?php echo $Tab_res[0][5]; ?></p>
							<hr class="my-4">
							<h4>Nom</h4>
							<p class="lead"><?php echo $Tab_res[0][1]; ?></p>
							<hr class="my-4">
							<h4>Prénom</h4>
							<p class="lead"><?php echo $Tab_res[0][2]; ?></p>
							<hr class="my-4">
							<h4>Mail</h4>
							<p class="lead"><?php echo $Tab_res[0][4]; ?></p>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<form method="GET" action="creation_projet.php">	<!-- boutons retour et valider -->
									<input type="SUBMIT" class="btn btn-outline-info  btn-lg Agauche" name="retour" value="Retour">
								</form>
							</div>
							<div class="col-lg-6">
								<form method="GET" action="accueil_projet.php">
									<?php
									//requête d'insertion
									$query2="SELECT id_proj from projets";
									$result2=mysqli_query($link,$query2);
									$Tab_res2=mysqli_fetch_all($result2);
									$nbligne2=mysqli_num_rows($result2);
									$nbcol2=mysqli_num_fields($result2);

									$id_statut=0;
									if ($etat=='En-lancement')
										$id_statut=1;
									if ($etat=='En-cours')
										$id_statut=2;
									else
										$id_statut=3;


									$query_insert="insert into projets (id_proj, id_statut, id_ind, id_sout, titre_proj, desc_proj, date_proj, duree, url_proj)
									values ('$nbligne2', '$id_statut', '$sout', '$titre', '$description', '$date', '$duree', )";
									$rs_insert=mysqli_query($link,$query_insert);
									?>
									<input type="SUBMIT" class="btn btn-info  btn-lg Adroite" name="bt_submit" value="Valider">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php Include("Pied-Valide.html") ?>
	</body>
</html>
