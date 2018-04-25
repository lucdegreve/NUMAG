<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		WAZO - Projet Techno. Web
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
	<script>
	<!-- Couleur sur la case sélectionnée -->
	function focusFunction(x) {
		x.style.background = "#A9F5F2";
	}
	function blurFunction(x) {
    
		x.style.background = "#FFFFFF";
	}
	</script>
</head>

<body>

<div id="global">
	
	<!-- DIV Entête -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>

	<!-- Requête pour construire le tableau à partir duquel sera construite la liste  -->
	<?php 
		// Départements
		$link=mysqli_connect('localhost','root','','oiseaudb2018');
		$query="SELECT id_dpt, nom_dpt FROM departements";
		
		$res=mysqli_query($link,$query);
		$tabdpt=mysqli_fetch_all($res);
		$nbldpt=mysqli_num_rows($res);
		$nbcdpt=mysqli_num_fields($res);
	?>
	
	
	
	<br/><br/>
	<form action="Recap_dates.php" method="GET" name="form1">

		
	<!-- Liste des départements -->
		Département :
			<?php echo '<select name="Liste_dpt" size=1>';
			$i=0;
			while ($i<$nbldpt){
				echo '<option value="'.$tabdpt[$i][0].'">'.$tabdpt[$i][1].' </option>';				
				$i++;
			}
		echo'</select>';?><br/><br/>
	
	<!-- Choix du trimestre -->
		Période de l'année:
			<?php echo '<select name="Liste_trim" size=1>';
			for ($i=1;$i<=4;$i++){
				echo '<option value="'.$i.'">Trimestre '.$i.' </option>';				
			}
		echo'</select>';?><br/><br/>
		
	<!-- le seuil est rentré à la main par l'utilisateur. Lorsqu'il clique sur la case elle pase en turquoise pour bien spécifier qu'il peut écrire -->	
		Veuillez entrer un seuil minimum pour les groupes:
		<input type="text" value="10" name="seuil" onfocus="focusFunction(this)" onblur="blurFunction(this)"><br/><br/>
		
	<!-- Bouton pour passer à la page suivante -->		
		<input type="submit" name=bt_recherche" value="Rechercher">
	<form/>
	
	

	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	
	
	</div><!-- #global -->
	
</body>
</html>