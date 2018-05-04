<!-- Cette page affiche le récapitulatif des alertes
Code : Luc Degreve
Bootstrap : Mayeul Duval
-->



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		Alerte
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<!-- On définit ici une section 'global' -->
<div id="global">

	<!-- Entête -->
	<?php include("Entete-VALIDE.php")?>



<?php
//session_start();
//$id_ind_co=$_SESSION["id_ind_co"];
$id_ind_co=2;




header('Content-Type: text/html; charset=UTF-8"');
#$link=mysqli_connect('localhost','root','numag2018','bdd_racine_beta_27.04.5');
include "Connexion_bdd.php";
//mise en place de la requete

//requete projet
$queryProjet="SELECT Alertes_Projet.id_ind, Alertes_Projet.id_proj, Alertes_Projet.Date_Alp, Individus.nom_ind, Individus.prenom, Individus.id_ind, projets.id_proj, projets.titre_proj, Alertes_Projet.vu_proj, projets.url_proj
FROM Alertes_Projet, Individus, projets
where Alertes_Projet.id_ind=Individus.id_ind and projets.id_proj=Alertes_Projet.id_proj and Alertes_Projet.vu_proj=0";



//requete stage
$queryStage="SELECT Alertes_Stage.id_ind, Alertes_Stage.id_st, Alertes_Stage.Date_Als, Individus.nom_ind, Individus.prenom, Individus.id_ind, stages.id_st, stages.titre_st, Alertes_Stage.vu_st, stages.url_st
FROM Alertes_Stage, Individus, stages
where Alertes_Stage.id_ind=Individus.id_ind and stages.id_st=Alertes_Stage.id_st and Alertes_Stage.vu_st=0" ;

//requete message
$queryMes="SELECT messages_prives.id_expe, messages_prives.id_dest , messages_prives.id_dest, Individus.nom_ind, Individus.prenom, Individus.id_ind, messages_prives.date_mp, messages_prives.lu
FROM messages_prives, Individus
where messages_prives.lu=0 and messages_prives.id_dest=$id_ind_co and Individus.id_ind=messages_prives.id_expe";

$resultP=mysqli_query($link, $queryProjet);
$resultS=mysqli_query($link, $queryStage);
$resultM=mysqli_query($link, $queryMes);
?>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Alertes</h1>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
			</div>

			<div class="col-lg-8">
				<div class="jumbotron">
          <h4 class="display-4">Nouvelle alerte</h4>
          <p class="lead">
						<?php
						//tableau d'alertes projets
						while($row=mysqli_fetch_array($resultP,MYSQLI_BOTH))
						{
							echo '<form action=Alertevup.php METHOD=get>';
							$nom =$row["nom_ind"];
							$prenom =$row["prenom"];
							$titre =$row["titre_proj"];
							$idp =$row["id_proj"];
							$url=$row["url_proj"];
							?>
          <hr class="my-4">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-10">
										<?php echo $prenom,' ', $nom ,' a commenté votre projet nommé ', $titre; ?>
									</div>
									<div class="col-lg-2">
									<?php
										echo '<input TYPE="hidden" name="url" value='.$url.' >';
										echo '<input TYPE="hidden" name="idp" value='.$idp.' >';
										echo '<input TYPE="SUBMIT" class="btn btn-info btn-sm center-block" name="voir" value="voir" >';
										?>
									</div>
								</div>
							</div>
							</form>
						
						<?php }
						while($row=mysqli_fetch_array($resultS,MYSQLI_BOTH))
						{
							echo '<form action=Alertevus.php METHOD=get>';
							$nom =$row["nom_ind"];
							$prenom =$row["prenom"];
							$titre =$row["titre_st"];
							$ids =$row["id_st"];
							$url=$row["url_st"];
						?>
          <hr class="my-4">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-10">
									<?php echo $prenom,' ', $nom ,' a commenté votre stage nommé ', $titre; ?>
								</div>
								<div class="col-lg-2">
								<?php
									echo '<input TYPE="hidden" name="url" value='.$url.' >';
									echo '<input TYPE="hidden" name="ids" value='.$ids.' >';
									echo '<input TYPE="SUBMIT" class="btn btn-info btn-sm center-block" name="voir" value="voir" >';
									?>
								</div>
							</div>
						</div>
						</form>
						<?php } ?>
						
						<?php
						//tableau d'alertes message
						while($row=mysqli_fetch_array($resultM,MYSQLI_BOTH))
						{
							echo '<form action=Alertevum.php METHOD=get>';
							$nom =$row["nom_ind"];
							$prenom =$row["prenom"];
							$date =$row["date_mp"];
							$id_expe=$row["id_expe"];
							?>
          <hr class="my-4">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-10">
										<?php echo $prenom,' ', $nom ,' vous a envoyé un message le ',$date; ?>
									</div>
									<div class="col-lg-2">
									<?php
										echo '<input TYPE="hidden" name="id_expe" value='.$id_expe.' >';
										echo '<input TYPE="SUBMIT" class="btn btn-info btn-sm center-block" name="voir" value="voir" >';
										?>
									</div>
								</div>
							</div>
							<hr class="my-4">
							</form>
						<?php } ?>
        </div>
			</div>
			<div class="col-lg-2">
			</div>
		</div>
	</div>
</div>

	<!-- Pied de page -->
	<?php include("Pied-VALIDE.html"); ?>


</div><!-- #global -->

</body>
</html>
