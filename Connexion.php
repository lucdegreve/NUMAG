<!-- Code effectué par Clément Turbillier -->
<!-- Ce code est fait en exploitant les possibilités de Bootstrap, il s'agit du formulaire d'inscription du site
les containers et containers fluids structurent la page d'inscription 
Cette page permet à une personne de se connecter au site
Des validations sont mises en place grace aux données de bootstrap-->

<?
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title> Formulaire de connexion </title>
		
		<!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<?
	session_start();
	$query_ind="SELECT id_ind, mail, mdp
	FROM Individus
	GROUP BY id_ind"; 
	$result_ind=mysqli_query($link,$query_ind);
	$tab_ind=mysqli_fetch_all($result_ind);
	$nblig_ind=mysqli_num_rows($result_ind);
	$nbcol_ind=mysqli_num_fields($result_ind);
	?>
		<br/>
		<br/>
		<br/>
		<form>
			<div class="container">
				<div class="form-group">
					<label for="exampleInputEmail1"> Adresse mail </label>
					<input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="entrez email" required>
					<small id="emailHelp" class="form-text text-muted"> Cette adresse mail est confidentielle </small>
				</div>
			  <div class="form-group">
				<label for="exampleInputPassword1"> Mot de passe </label>
				<input type="password" class="form-control" id="mdp" placeholder="entrez mot de passe" required>
				<small id="emailHelp" class="form-text text-muted"> Votre mot de passe doit contenir au moins 5 caractères </small>
			  </div>
			  <button type="submit" class="btn btn-primary"> Connexion </button>
			  
			  
			  
			  'Si jamais les codes sont pas vérifiés message d'erreur'
			  'Sinon mise dans la variable start session $id_ind_co mettre l'identifiant du mec qui vient de se connecter 
			  $_SESSION["id_ind_co"]= La variable que je récupère , 
			  'Après signaler aux autres comment la récupérer 
			  Refaire session (bien mettre avant le html premier truc écrit 
			  $id_ind_co=$_SESSION["id_ind_co"]
			  
			</div>
		</form>
	</body>