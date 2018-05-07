<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page est la dernière des trois pages de formulaire d'inscription à remplir pour un agriculteur
Il suffit de cocher les cases voulues
Des validations sont mises en place grace aux données de bootstrap-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Formulaire d'inscription </title>
		
		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<?php 
		//$link = mysqli_connect('localhost','root','','bdd_racine_beta_27.04.5');
        include 'Connexion_bdd.php';
		$nom_exp=$_GET['nom_exp'];
		$sirene=$_GET['sirene'];
		$libel_type_prod=$_GET['libel_type_prod'];
		$desc_exp=$_GET['desc_exp'];
		$ad_exp=$_GET['ad_exp'];
		$commune_exp=$_GET['commune_exp'];
                $id_ind=$_GET['id_ind'];
                
                //Insertion des données de l'exploitation
		$query0="INSERT INTO exploitations(id_commune, sirene, nom_exp, ad_exp, desc_exp)
                VALUES (3, '$sirene', '$nom_exp', '$ad_exp', '$desc_exp')";
		$result0=mysqli_query($link,$query0);
                
                //Récupération de l'id de l'exploitation créée
                $id_exp=mysqli_insert_id($link);
                
                //Insertion des types de production
                $query1="SELECT * FROM types_production WHERE libelle_type_prod='$libel_type_prod'";
                $result1=mysqli_query($link,$query1);
                $nbligne = mysqli_num_rows($result1);
                if ($nbligne==0)        //ce type n'existe pas encore
                {
                    //Création du type de production
                    $query2="INSERT INTO types_production (libelle_type_prod)
                    VALUES ('$libel_type_prod')";
                    $result2=mysqli_query($link,$query2);
                    
                    //Sélectionne l'id du type crée
                    $id_type_prod=mysqli_insert_id($link);
                    
                    //Ajoute le type de production à l'exploitation
                    $query3="INSERT INTO exploitation_typeprod (id_exp, id_type_prod)
                    VALUES ($id_exp, $id_type_prod)";
                    $result3=mysqli_query($link,$query3);
                }
                else    //ce type existe
                {
                    //Sélectionne l'id du type
                    $row1=mysqli_fetch_array($result1,MYSQLI_BOTH);
                    $id_type_prod=$row1['id_type_prod'];
                    
                    //Ajoute le type de production à l'exploitation
                    $query3="INSERT INTO exploitation_typeprod (id_exp, id_type_prod)
                    VALUES ($id_exp, $id_type_prod)";
                    $result3=mysqli_query($link,$query3);
                }
		
                $query = "SELECT id_mot_cle, libelle_mot_cle FROM mots_cles";
		$result=mysqli_query($link,$query);
                
                //PROB NICO PAJOT TYPE DE PRODUCTION
		?>
	</head>
	<body>
		<?php include("Entete-NC.php"); ?>
		<br/>
		<br/>
		<div class="container">
			<div class="card border-info mb-3">
				<span style="color: info;">
				<div class="card-header">Formulaire d'inscription pour agriculteurs</div>
				</span>
					<div class="container">
						<br/>
						Veuillez renseigner vos centres d'interets
						<br/>
						<br/>
					</div>
					<div class="container">
						<div class="form-row">
							<form action="Tentative.php" method="post">
									<?php
										while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
											{
												echo'<div class="form-check">';
												$id=$row["id_mot_cle"];
												$nom =$row["libelle_mot_cle"];
												echo'<input class="form-check-input" type="checkbox" name="centre[]" value='.$id.' >';
												echo "<option> ".$nom." </option>";
												echo'</div>';
											}	
                                                                        ?>
                                                                <?php echo'<input type="hidden" name="id_ind" value='.$id_ind.'>';?>
								<input type="submit" class="btn btn-info" value="suite" ></input>
							</form>
						</div>
					</div>
			</div>
		</div>
		<?php include("Pied-VALIDE.html"); ?>
	</body>