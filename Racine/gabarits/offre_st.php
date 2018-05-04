<!--Script permettant de consulter une offre de stage à partir des résultats d'une recherche
By Manuel, Julien Louet, Marie -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Résultat recherche stage</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- ouverture de la fenetre pop up pour les tags -->
    <script type="text/javascript">
      function open_popup_test()
      {
      window.open("recherche_tag_st.php", "recherche_tag_st", "toolbar=yes, status=yes, scrollbars=yes, resizable=no, width=300, height=300");
      }
      window.close();
    </script>

  </head>
  <body>
		<?php include "Entete-VALIDE.html"; ?>

<?php
// code php principal récupérant les données du stage
	include 'Connexion_bdd';

	// Recupération du stage sur lequel l'étudiant à cliqué
	$stage=$_GET["lestage"];
	$quelstage=$stage+1;
	// Récupération du titre du stage, du Département, de la commune, de la période
	// et du mois de début pour le premier tableau d'affichage
	$queryresume="SELECT id_st, titre_st, nom_dpt, nom_commune, periode_st, mois_debut_st
	FROM stages
	INNER JOIN departements
	ON stages.id_dpt=departements.id_dpt
	INNER JOIN individus
	ON stages.id_ind=individus.id_ind
	INNER JOIN communes
	ON individus.id_commune=communes.id_commune
	WHERE id_st=".$quelstage;

	$resultresume=mysqli_query($link,$queryresume);
	$Tabresume=mysqli_fetch_all($resultresume);
	$nbligneresume=mysqli_num_rows($resultresume);
	$nbcolresume=mysqli_num_fields($resultresume);


// Récupération de la description, du type de production et des mots clès
	$querydescription="SELECT stages.id_st, stages.description_st, types_production.libelle_type_prod, mots_cles.libelle_mot_cle
	FROM stages
	INNER JOIN individus
	ON stages.id_ind=individus.id_ind
	INNER JOIN exploitation_typeprod
	ON individus.id_exp=exploitation_typeprod.id_exp
	INNER JOIN types_production
	ON exploitation_typeprod.id_type_prod=types_production.id_type_prod
	INNER JOIN mot_cle_stage
	ON stages.id_st=mot_cle_stage.id_st
	INNER JOIN mots_cles
	ON mot_cle_stage.id_mot_cle=mots_cles.id_mot_cle
	WHERE stages.id_st=".$quelstage;

	$resultdescription=mysqli_query($link,$querydescription);
	$Tabdescription=mysqli_fetch_all($resultdescription);
	$nblignedescription=mysqli_num_rows($resultdescription);
	$nbcoldescription=mysqli_num_fields($resultdescription);


	// Récupération du nom et prenom de l'agriculteur
	$querycontact="SELECT id_st, nom_ind, prenom, individus.id_ind
	FROM Stages
	INNER JOIN individus
	ON stages.id_ind=individus.id_ind
	WHERE id_st=".$quelstage;

	$resultcontact=mysqli_query($link,$querycontact);
	$Tabcontact=mysqli_fetch_all($resultcontact);
	$nblignecontact=mysqli_num_rows($resultcontact);
	$nbcolcontact=mysqli_num_fields($resultcontact);



?>

<br>
<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-lg-2">
			<!-- Création du formulaire gauche : Résumé du stage -->
			<div class="jumbotron HauteurMax">
				<h3>Résumé du stage</h3>
				<hr class="my-4">
				<form>
						<div class="form-group">
							<?php
								echo '<label for="exampleSelect1"><u> Département : </u></label>';
								echo '</br>';
								echo '<label for="exampleSelect1">'.$Tabresume[0][2].'</label>';
							echo '</div>';
							echo '<div class="form-group">';
								echo '<label for="exampleSelect1"><u> Commune du stage : </u></label>';
								echo '</br>';
								echo '<label for="exampleSelect1">'.$Tabresume[0][3].'</label>';
							echo '</div>';
							echo '<div class="form-group">';
								echo '<label for="exampleSelect1"><u> Periode de stage : </u></label>';
								echo '</br>';
								echo '<label for="exampleSelect1">'.$Tabresume[0][4].'</label>';
							echo '</div>';
							echo '<div class="form-group">';
								echo '<label for="exampleSelect1"><u> Mois de début de stage : </u></label>';
								echo '</br>';
								echo '<label for="exampleSelect1">'.$Tabresume[0][5].'</label>';
							?>
						</div>
				</form>
			</div>
		</div>
		<div class="col-lg-7">
			<!-- Création du formulaire central : Description du stage -->
			<div class="jumbotron HauteurMax">
				<h3>Description du stage</h3>
				<hr class="my-4">
				<form>
						<div class="form-group">
							<?php
								echo '<label for="exampleSelect1"><u> Description : </u></label>';
								echo '</br>';
								echo '<label for="exampleSelect1">'.$Tabdescription[0][1].'</label>';
							echo '</div>';
							echo '<div class="form-group">';
								echo '<label for="exampleSelect1"><u> Type de production : </u></label>';
								echo '</br>';
								echo '<label for="exampleSelect1">'.$Tabdescription[0][2].'</label>';
							echo '</div>';
							echo '<div class="form-group">';
								echo '<label for="exampleSelect1"><u> Mots-clés : </u></label>';
								echo '</br>';
								for ($i=0;$i<$nblignedescription;$i++)
								{echo ' '.$Tabdescription[$i][3].' ';
								}
							echo '</div>';
							?>
						</div>
				</form>

			</div>
		<div class="col-lg-3">
			<!-- Création du formulaire droit : Contact -->
			<div class="jumbotron HauteurMax">
				<h3>Contact</h3>
				<hr class="my-4">
				<form action="Messagerie_Bootstrap.php" method="get">
          <!-- Création d'un formulaire renvoyant nom et prénom de l'offreur de stage, et d'un bouton
          envoyant vers la page messagerie.php (prise de contact avec l'agriculteur) -->
						<div class="form-group">
							<?php
								echo '<label for="exampleSelect1"><u> Nom : </u></label>';
								echo '</br>';
								echo '<label for="exampleSelect1" name="nom">'.$Tabcontact[0][1].'</label>';
							echo '</div>';
							echo '<div class="form-group">';
								echo '<label for="exampleSelect1"><u> Prénom : </u></label>';
								echo '</br>';
								echo '<label for="exampleSelect1" name="prenom">'.$Tabcontact[0][2].'</label>';
							echo '</div>';
							echo '<div class="form-group">';
								echo "<label for='exampleSelect1'><u> Postuler à l'offre : </u></label>";
								echo '</br>';
                echo '<input type="hidden" name="idcontact" value="'.$Tabcontact[0][3].'"</input>';
                echo '</br>';
                echo '<input type="submit" class="btn btn-outline-info btn-lg" value="Postuler"></input>';
							echo '</div>';
							?>
			</div>
		</div>
	</div>


	<?php include "Pied-VALIDE.html" ?>
  </body>
</html>
