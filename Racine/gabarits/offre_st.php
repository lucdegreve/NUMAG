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
		<?php include "Entete-VALIDE.html" ?>

<?php
// code php principal récupérant les données du stage
	$link=mysqli_connect('localhost','root','','BDD_racine');

	// Recupération du stage sur lequel l'étudiant à cliqué
	$stage=$_GET["lestage"];
	$quelstage=$stage+1;
	// Récupération du titre du stage, du Département, de la commune, de la période
	// et du mois de début pour le premier tableau d'affichage
	$query="SELECT id_st, titre_st, nom_dpt, nom_commune, periode_st, mois_debut_st
	FROM stages
	INNER JOIN departements
	ON stages.id_dpt=departements.id_dpt
	INNER JOIN individus
	ON stages.id_ind=individus.id_ind
	INNER JOIN communes
	ON individus.id_commune=communes.id_commune
	WHERE id_st=".$quelstage;

	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
//	echo $nbligne;
//	echo $nbcol;
?>

<br>
<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-lg-3">
			<div class="jumbotron HauteurMoy">
				<h3>Résumé du stage</h3>
				<hr class="my-4">
				<form>
						<div class="form-group">
							<label for="exampleSelect1">Département :</label>
							<?php
							echo '<label for="exampleSelect1">'.$Tab[0][2].'</label>';
							?>
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Commune du stage :</label>
							<?php
							echo '<label for="exampleSelect1">'.$Tab[0][3].'</label>';
							?>
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Periode de stage :</label>
							<?php
							echo '<label for="exampleSelect1">'.$Tab[0][4].'</label>';
							?>
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Mois de début de stage :</label>
							<?php
							echo '<label for="exampleSelect1">'.$Tab[0][5].'</label>';
							?>
						</div>
				</form>
			</div>
		</div>
		







<?php
	// Affichage du titre
	echo "<BR/><BR/>";
	echo $Tab[0][1];
	echo "<BR/><BR/>";

	// Affichage du tableau de gauche comportant le résumé du lieu et période du stage
	echo "<table border=1>
	<tr>
	<td>
	Résumé
	</td>
	</tr>
	<tr>
	<td>
	Departement
	</td>
	<td>
		".$Tab[0][2]."
	</td>
	</tr>
	<tr>
	<td>
	Commune de stage
	</td>
	<td>
		".$Tab[0][3]."
	</td>
	</tr>
	<tr>
	<td>
	Periode de stage
	</td>
	<td>
		".$Tab[0][4]."
	</td>
	<tr>
	<td>
	Mois de début de stage
	</td>
	<td>
		".$Tab[0][5]."
	</td>
	</tr>
	</table>";
	echo "<BR/><BR/>";



	// Récupération de la description, du type de production et des mots clès
	$query="SELECT stages.id_st, stages.description_st, types_production.libelle_type_prod, mots_cles.libelle_mot_cle
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

	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);


	// Affichage du tableau central comportant la description du stage, le type de production et les mots clés
	echo "
	<table border =1>
	<tr>
	<td>
	Description du stage
	</td>
	</tr>
	<tr>
	<td>
	Description
	<td>
		".$Tab[0][1]."
	</td>
	</tr>
	<tr>
	<td>
	Type de production
	</td>
	<td>
		".$Tab[0][2]."
	</td>
	</tr>
	<tr>
	<td>
	Mots clés
	</td>
	<td>
		".$Tab[0][3]."
	</td>
	</tr>
	</table>";

	echo "<BR/><BR/>";




	// Récupération du nom et prenom de l'agriculteur
	$query="SELECT id_st, nom_ind, prenom
	FROM Stages
	INNER JOIN individus
	ON stages.id_ind=individus.id_ind
	WHERE id_st=".$quelstage;

	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);

	// Affichage du tableau de droite permettant de contacter l'agriculteur pour postuler à l'offre
	echo "
	<table border =1>
	<tr>
	<td>
	Contact
	</td>
	</tr>
	<tr>
	<td>
	Nom
	</td>
	<td>
		".$Tab[0][1]."
	</td>
	</tr>
	<tr>
	<td>
	Prénom
	</td>
	<td>
		".$Tab[0][2]."
	</td>
	</tr>
	<tr>
	<td>
	Postuler à l'offre
	</td>
	<td>
		<a href = 'messagerie.php' > Envoyer un message à l agriculteur </a>
	</td>
	</tr>
	</table>";





	?>
	<?php include "Pied-VALIDE.html" ?>
  </body>
</html>
