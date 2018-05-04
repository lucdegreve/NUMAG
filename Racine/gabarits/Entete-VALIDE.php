<!-- Menu codé par Clément	Turbillier-->
<!-- Il s'agit du haut de page avec les menu de navigation qui permet d'accéder à chaque page du site
Bootstrap assure un aspect graphique élégant-->


<HTML>
	<head>
		<meta charset="utf-8">
		<title> Entete </title>

		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

			<div class="row">
				<div class="col-md-4">
					<img src="picto/Racine_logo_etroit.png" width="300" height="80">
				</div>
				<div class="col-md-6">
					<div class="center">
					</br>
					<i>RACINE &mdash; Réseau Agricole Collaboratif par l'Interaction et l'Echange</i></div>
				</div>
			</div>


	<nav class="navbar navbar-expand-lg navbar-dark bg-info">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="accueil_inscrit.php"><p class="text-light">Accueil</p></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="accueil_projet.php"><p class="text-light">Projets</p></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="Messagerie_Bootstrap.php"><p class="text-light">Messagerie</p></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="recherche_st.php"><p class="text-light">Stages</p></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="benchmark.php"><p class="text-light">Benchmark</p></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="tutoriel.php"><p class="text-light">Tutoriel</p></a>
				</li>

				<?php
					header('Content-Type: text/html; charset=UTF-8');
					include('Connexion_bdd.php');
					//mise en place de la requete

					//requete projet
					$queryProjet="SELECT Alertes_Projet.vu_proj
					FROM Alertes_Projet
					where Alertes_Projet.vu_proj=0";
					
					//requete stage
					$queryStage="SELECT Alertes_Stage.vu_st
					FROM Alertes_Stage
					where Alertes_Stage.vu_st=0";
					
					//requete message
					$queryMessage="SELECT messages_prives.lu
					FROM messages_prives
					where messages_prives.lu=0 and messages_prives.id_dest=2";
					//where messages_prives.lu=0 and messages_prives.id_dest=".$id_ind_co;
					
					
					
					$resultp=mysqli_query($link, $queryProjet);
					$results=mysqli_query($link, $queryStage);
					$resultm=mysqli_query($link, $queryMessage);

					$nbligp=mysqli_num_rows($resultp);
					//echo $nbligp;
					$nbligs=mysqli_num_rows($results);
					//echo $nbligs;
					$nbligm=mysqli_num_rows($resultm);
					//echo $nbligm;
					$nbligt=$nbligp+$nbligs+$nbligm;
					//echo $nbligt;
						if ($nbligt==0){
						// Afficher le bonton standard
					?>
							<li class="nav-item">
							<a class="nav-link" href="Alerte.php"><p class="text-light">Alertes</p></a>
						</li>
					<?php
						}else{
						// Afficher le bouton avec notif
					?>
							<li class="nav-item">
							<a class="nav-link" href="Alerte.php"><p class="text-light">Alertes</p></a>
							</li>
							<span class="badge badge-danger center-vertical">!</span>
						<?php }	?>


			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
				<button class="btn BleuRacine my-2 my-sm-0" type="submit">Rechercher</button>
			</form>
		</div>
	</nav>
</HTML>
