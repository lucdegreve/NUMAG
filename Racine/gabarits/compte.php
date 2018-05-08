<html>
<head>
	<?php
	include "Entete-VALIDE.php";
	include'Connexion_bdd.php';
	?>
	<meta charset="utf-8">
	<title>Mon compte</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
	//////// COLONNE DE GAUCHE \\\\\\\\\\\\
	$query="SELECT civilite, prenom, UPPER(nom_ind), type_prof, DATE_FORMAT(naissance, '%d/%m/%Y'), ad_ind, cp, UPPER(nom_commune), tel, mail
	FROM individus JOIN communes ON individus.id_commune=communes.id_commune JOIN profils ON individus.id_prof=profils.id_prof WHERE id_ind=$id_ind_co";
	$result=mysqli_query($link,$query);
	$tab=mysqli_fetch_all($result);
	?>

	<br/>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 text-center">
				<div class="jumbotron">
 
					<?php
					echo"<b> Votre Profil <br/></b>"
					echo $tab[0][0].". ".$tab[0][1]." ".$tab[0][2]." <br/>";
					$profil=$tab[0][3];
					if ($tab[0][0]=='Mme')
					{
						if($tab[0][3]=='Agriculteur')
						{
							$profil='Agricultrice';
						}
						if($tab[0][3]=='Étudiant')
						{
							$profil='Étudiante';
						}
						if($tab[0][3]=='Administrateur')
						{
							$profil='Administratrice';
						}
					}
					echo $profil."<br/><br/>";
					?>

					<hr class="my-4">
					<?php echo "<b>Date de naissance</b><br/>".$tab[0][4]." <br/><br/>";?>

					<hr class="my-4">
					<?PHP echo "<b>Adresse</b><br/>".$tab[0][5]."<br/>".$tab[0][6]." ".$tab[0][7]." <br/><br/>"; ?>

					<hr class="my-4">
					<?php echo "<b>Téléphone</b><br/>".$tab[0][8]." <br/><br/>"; ?>

					<hr class="my-4">
					<?php echo "<b>Mail</b><br/>".$tab[0][9]; ?>

					<hr class="my-4">
					<button type="button" class="btn btn-outline-info">Modifier mes infos</button>
				</div>
			</div>


			<?php
			/////// COLONNE DE DROITE \\\\\\\\\\
			$query = "SELECT id_mot_cle, libelle_mot_cle FROM mots_cles ORDER BY libelle_mot_cle";
			$result=mysqli_query($link,$query);
			$tab = mysqli_fetch_all($result);
			$nblig=mysqli_num_rows($result);

			$query1 = "SELECT * FROM centres_interet WHERE id_ind=$id_ind_co";
			$result1 = mysqli_query($link, $query1);
			$tab1 = mysqli_fetch_all($result1);
			$nblig1=mysqli_num_rows($result1);
			?>

			<div class="col-lg-6">
				<div class="jumbotron">

					<?PHP
					echo '<form action="maj_des_CI.php" method="post" name="form1">';
					  echo '<div class="form-check">';
					    for ($i=0; $i<$nblig; $i++){
					      $verif = 0;
					      for ($j=0; $j<$nblig1; $j++){
					        if ($tab[$i][0]==$tab1[$j][1]){
					          echo '<input class="form-check-input" type="checkbox" name="centre[]" value='.$tab[$i][0].' checked>';
					          echo "<option> ".$tab[$i][1]." </option>";
					          $verif++;
					        }
					      }
					      if ($verif==0){
					        echo '<input class="form-check-input" type="checkbox" name="centre[]" value='.$tab[$i][0].'>';
					        echo "<option> ".$tab[$i][1]." </option>";
					      }
					    }
					    echo'</div>';
					  echo '<input type="submit" class="btn btn-info" value="Valider les modifications"></input>';
					echo '</form>';
					?>

				</div>
			</div>
			<?php include("Pied-VALIDE.html"); ?>
</body>
</html>
