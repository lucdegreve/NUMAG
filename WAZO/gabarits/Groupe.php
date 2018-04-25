<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		WAZO - Projet Techno. Web
	</title>
	<!-- D�claration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
	<script>
	<!-- Couleur sur la case s�lectionn�e -->
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
	
	<!-- DIV Ent�te -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>

	<!-- Requ�te pour construire le tableau � partir duquel sera construite la liste  -->
	<?php 
		// D�partements
		$link=mysqli_connect('localhost','root','','oiseaudb2018');
		$query="SELECT id_dpt, nom_dpt FROM departements";
		
		$res=mysqli_query($link,$query);
		$tabdpt=mysqli_fetch_all($res);
		$nbldpt=mysqli_num_rows($res);
		$nbcdpt=mysqli_num_fields($res);
	?>
	
	
	
	<br/><br/>
	<form action="Recap_dates.php" method="GET" name="form1">

		
	<!-- Liste des d�partements -->
		D�partement :
			<?php echo '<select name="Liste_dpt" size=1>';
			$i=0;
			while ($i<$nbldpt){
				echo '<option value="'.$tabdpt[$i][0].'">'.$tabdpt[$i][1].' </option>';				
				$i++;
			}
		echo'</select>';?><br/><br/>
	
	<!-- Choix du trimestre -->
		P�riode de l'ann�e:
			<?php echo '<select name="Liste_trim" size=1>';
			for ($i=1;$i<=4;$i++){
				echo '<option value="'.$i.'">Trimestre '.$i.' </option>';				
			}
		echo'</select>';?><br/><br/>
		
	<!-- le seuil est rentr� � la main par l'utilisateur. Lorsqu'il clique sur la case elle pase en turquoise pour bien sp�cifier qu'il peut �crire -->	
		Veuillez entrer un seuil minimum pour les groupes:
		<input type="text" value="10" name="seuil" onfocus="focusFunction(this)" onblur="blurFunction(this)"><br/><br/>
		
	<!-- Bouton pour passer � la page suivante -->		
		<input type="submit" name=bt_recherche" value="Rechercher">
	<form/>
	
	

	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	
	
	</div><!-- #global -->
	
</body>
</html>