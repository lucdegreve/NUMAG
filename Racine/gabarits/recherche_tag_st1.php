<HTML><!--manu .. Création d'un questionnaire qui ira sur le pop up-->
<head>
	<title>Tags</title>
</head>
<body>
<?php include("Entete-VALIDE.php"); ?>
		<br/>
<div class="container">
	<div class="card border-info mb-3 center-block" style="max-width: 18rem;">
	  <div class="card-header">Choisissez des tags</div>
	  <div class="card-body">
			<form method="GET" action="test_checkbox.php">
				<div class="form-group">
					<div class="form-check">
						<?php
						Include("Connexion_bdd.php");
						$query="SELECT libelle_mot_cle
						FROM mots_cles ";
						$result=mysqli_query($link,$query);
						$Tab=mysqli_fetch_all($result);
						$nbligne=mysqli_num_rows($result);
						for ($j=0; $j<$nbligne; $j++)
						{
							echo '<input class="form-check-input" type="checkbox" name ="jury[]" value='.$Tab [$j][0].'>';
							echo '<label class="form-check-label" for="jury[]">'.$Tab [$j][0].'</label>';
							echo "<br/>";
						}
						?>
					</div>
				</div>
				<hr class="my-4">
				<input type= "submit" name="soumettre" class="btn btn-lg btn-info center-block" value="Soumettre">
			</form>
		</div>
	</div>
</div>

	<br/>
	<?php include("Pied-VALIDE.html"); ?>
</form>
</body>
