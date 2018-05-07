

<html>
	<head>
		<meta charset="utf-8">
		<title> Benchmark </title>

		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include("Entete-VALIDE.html"); ?>
		<br/>
		<form>
      <?php
      $link = mysqli_connect('localhost','root','','bdd_racine_beta_27.04.5');
      $query = "SELECT civilite, nom_ind, prenom, naissance, mail, mdp, tel, ad_ind FROM individus WHERE id_ind = 1";
      $results=mysqli_query($link,$query);
      $tab=mysqli_fetch_all($results);
			?>

	      <br/>
	      <br/>
	      <div class="container">
	        <div class="jumbotron">
						<?php
						for ($i=0; $i<count($results);$i++)
						{
							echo mysqli_fetch_field_direct($results, $i)->name." : ".$tab[0][$i];
							echo "<br/>";
						}
						?>
        	</div>
      	</div>
			}
    </form>
    <br/>
    <br/>
    <?php include("Pied-VALIDE.html"); ?>
  </body>
</html>
