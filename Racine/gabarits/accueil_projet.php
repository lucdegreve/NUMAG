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
</head>
	<?php Include("Entete-VALIDE.php");?>
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
				<a class="btn btn-outline-info center-block" href = "creation_projet.php" > Créer un projet  </a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-4">
				<div class="jumbotron">
					<h2>Recherche</h2>
					<hr class="my-4">
					<div class="container">
						<?php
						$link=mysqli_connect('localhost','root','','bdd_racine_beta_27.04.5');?>
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
				<div class="jumbotron">
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
					?>
					<ul class='list-group list-group-flush'> <?php
					for ($i=0; $i<$nblig_SP; $i++){
						?>
						<li class="list-group-item"><?php echo $tab_SP[$i][0]; ?></li>
						<li class="list-group-item"><?php echo $tab_SP[$i][1]; ?></li>
						<button type="button" class="btn btn-outline-info" name="button">Consulter</button>
						<?php
					}
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!-- Bouton permettant d'accéder à la page de création de projet -->
<br/>
<br>
<br>
<a href = "creation_projet.php" > Créer un projet  </a>
<br/>

<table border=1>

<tr>
<td>
<?php
	$link=mysqli_connect('localhost','root','','bdd_racine_beta_27.04.5');
	echo "<FORM action='Resultat_recherche_projet.php' method='GET'  name='form2'>";
	echo "<tr>
	<td>";
	echo "Filtres";
	echo "</td> </tr>";
	echo "<tr>
	<td>";
	// Recherche de projets à base de liste déroulante - Mot clé
	$query="SELECT  libelle_mot_cle FROM projets
	INNER JOIN mot_cle_projet
	ON projets.id_proj=mot_cle_projet.id_proj
	INNER JOIN mots_cles
	ON mot_cle_projet.id_mot_cle=mots_cles.id_mot_cle";
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);

	echo "Mot clé";
	echo "<select name='listetag'>";
	for ($i=0; $i<$nbligne; $i++)
	{

		echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
		echo "<br/>";

	}
	echo "</select>";

	echo "</td> </tr>";
	echo "<tr>
	<td>";
		// Recherche de projets à base de liste déroulante - Département
	$query="SELECT  nom_dpt FROM departements";
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);

	echo "Département";
	echo "<select name='listedpt'>";
	for ($i=0; $i<$nbligne; $i++)
	{

		echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
		echo "<br/>";

	}
	echo "</select>";


	echo "</td> </tr>";
	echo "<tr>
	<td>";
		// Recherche de projets à base de liste déroulante - Statut
	$query="SELECT  libelle_statut FROM statuts";
	$result=mysqli_query($link,$query);
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);

	echo "Statut du projet";
	echo "<select name='listestatut'>";
	for ($i=0; $i<$nbligne; $i++)
	{

		echo "<option value= ".$Tab[$i][0].">".$Tab[$i][0]."</option>";
		echo "<br/>";

	}
	echo "</select>";

	echo "</td> </tr>";

	echo "<tr>
	<td>";
	echo "<INPUT TYPE=SUBMIT  value='Valider'>" ;
	echo "</td> </tr>";
?>

</td>

<td>
<?php
	// Requete sans les préférences des projets

	//$query="SELECT  titre_proj, libelle_statut
	//FROM Projets
	//INNER JOIN Statuts
	//ON Projets.id_statut=Statuts.id_statut";
	//$result=mysqli_query($link,$query);
	//$Tab=mysqli_fetch_all($result);
	//$nbligne=mysqli_num_rows($result);
	//$nbcol=mysqli_num_fields($result);

	// Requete avec les préférences des projets

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


	for ($i=0; $i<$nblig_SP; $i++)
	{
		echo "<tr> <td>
		".$tab_SP[$i][0]."
		</td> </tr>
		<tr>
		<td>
		".$tab_SP[$i][1]."
		</td>
		<td>
		<a href='projet.php'> Consulter </a>
		</td>
		</tr>";
	}
	// <a href='projet.php?projet=".$id_proj."'> Consulter </a> exemple de bouton consulter si la page suivante été créer
	// (inutile dans le demonstrateur


	?>
</td>
</tr>
</table>
	<br/>
	<br/>
	<br/>
	<?php include("Pied-VALIDE.html"); ?>
</html>
