<!-- Code effectué par MC et Elsa -->

<?php Include("Entete-VALIDE.php");?>
<?php //Session_start();
	//$id_ind_co=$_SESSION["id_ind_co"];
	//Connexion au serveur
	include'Connexion_bdd.php';
?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		Tutoriel
	</title>
</head>

<body>

<div class="container-fluid">
	<br/>
	<div class="row">
		<!-- Titre -->
		<div class="col-lg-1">

		</div>
		<div class="col-lg-3">
			<h1>Tutoriel</h1>
		</div>
	</div>
	<br/>
	<div class="row">
		<!-- Section Guide -->
		<div class="col-lg-7">
			<div id="guide">
				<div class="jumbotron HauteurMax">
					<h3> Guide d'utilisation de RACINE </h3>
					<hr class="my-4">
					Vous trouverez ci-dessous un guide d'utilisation de la plateforme:
					<br/><br/>
					<iframe src="video/Guide_utilisation_RACINE.pdf" width="650" height="500"></iframe>
					<br/><br/>
				</div>
			</div>
		</div>
		<!-- Section Vidéos -->
		<div class="col-lg-5">
			<div id="video">
				<div class="jumbotron HauteurMax">
					<h3> Vidéos </h3>
					<hr class="my-4">
					Et quelques vidéos pour une prise en main plus facile ! Vous pouvez les visualiser directement sur votre navigateur, ou les télécharger sur votre ordinateur.
					<br/><br/>
					<h5> Se connecter et rechercher un stage </h5>
					<div class="row text-center">
						<div class="col-lg-5">
							<a class="btn btn-info btn-md btn-block" href="video/Stageconnexion/stageconnexion.htm" target="_blank" role="button"> Lien vers la vidéo </a>
						</div>
						<div class="col-lg-7">
							<a class="btn btn-outline-info btn-md btn-block" href="video/Stageconnexion/stageconnexion.exe" role="button"> Téléchargement de la vidéo </a>
						</div>
					</div>
					<hr class="my-4">					
					<h5> Alertes et messagerie </h5>
					<div class="row text-center">
						<div class="col-lg-5">
							<a class="btn btn-info btn-md btn-block" href="video/Alertemessagerie/alertemessagerie.htm" target="_blank" role="button"> Lien vers la vidéo </a>
						</div>
						<div class="col-lg-7">
							<a class="btn btn-outline-info btn-md btn-block" href="video/Alertemessagerie/alertemessagerie.exe" role="button"> Téléchargement de la vidéo </a>
						</div>
					</div>
					<hr class="my-4">
					<h5> Consulter les actualités et se déconnecter </h5>
					<div class="row text-center">
						<div class="col-lg-5">
							<a class="btn btn-info btn-md btn-block" href="video/Actualites/actualites.htm" target="_blank" role="button"> Lien vers la vidéo </a>
						</div>
						<div class="col-lg-7">
							<a class="btn btn-outline-info btn-md btn-block" href="video/Actualites/actualites.exe" role="button"> Téléchargement de la vidéo </a>
						</div>
					</div>
					<hr class="my-4">
					<h5> Consulter et modifier son profil </h5>
					<div class="row text-center">
						<div class="col-lg-5">
							<a class="btn btn-info btn-md btn-block" href="video/Modifierprofil/modifierprofil.htm" target="_blank" role="button"> Lien vers la vidéo </a>
						</div>
						<div class="col-lg-7">
							<a class="btn btn-outline-info btn-md btn-block" href="video/Modifierprofil/modifierprofil.exe" role="button"> Téléchargement de la vidéo </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-lg-12">
			<h3 align ="center"> Bonne navigation sur RACINE !</h3>
		</div>
	</div>
	<br/>
</div>
	
</body>