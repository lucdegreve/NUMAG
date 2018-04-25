<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		WAZO - Projet Techno. Web
	</title>
	<!-- D�claration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />

</head>

<body>

<div id="global">
	
	<!-- DIV Ent�te -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>
	
	
	<!-- Requ�tes pour construire les tableaux � partir desquels seront construites les listes  -->
	<?php 
		// D�partements
		$link=mysqli_connect('localhost','root','','oiseaudb2018');
		$query="SELECT id_dpt, nom_dpt FROM departements";
		
		$res=mysqli_query($link,$query);
		$tabdpt=mysqli_fetch_all($res);
		$nbldpt=mysqli_num_rows($res);
		$nbcdpt=mysqli_num_fields($res);
		
		// Observateurs
		$link=mysqli_connect('localhost','root','','oiseaudb2018');
		$query="SELECT * FROM observateurs";
		
		$res=mysqli_query($link,$query);
		$tabobs=mysqli_fetch_all($res);
		$nblobs=mysqli_num_rows($res);
		$nbcobs=mysqli_num_fields($res);
	?>
	
	
	
	<br/><br/>
	<form action="Recap_obs.php" method="GET" name="form1">
	
	<!-- Liste des observateurs -->
		Observateur :
		<?php echo '<select name="Liste_obs" size=1>';
		$i=0;
			while ($i<$nblobs){
				echo '<option value="'.$tabobs[$i][0].'">'.$tabobs[$i][1].' </option>';				
				$i++;
			}
		echo'</select>';?>
		<br/><br/>
		
	<!-- Liste des d�partements -->
		D�partement :
			<?php echo '<select name="Liste_dpt" size=1>';
			$i=0;
			while ($i<$nbldpt){
				echo '<option value="'.$tabdpt[$i][0].'">'.$tabdpt[$i][1].' </option>';				
				$i++;
			}
		echo'</select>';?><br/><br/>
		
	<!-- Bouton pour passer � la page suivante -->	
		<input type="submit" name=bt_recherche" value="Rechercher">
	<form/>
	
	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	
	
	</div><!-- #global -->

</body>
</html>