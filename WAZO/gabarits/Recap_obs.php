<!-- Cette page affiche le récapitulatif des oiseaux observés par un membre sur un département donné -->



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		WAZO - Projet Techno. Web
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
	
</head>

<body>

<div id="global">
	
	<!-- DIV Entête -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>
<br/><br/>
	<?php 
		//On récupère les choix de l'utilisateur
		$id_obs=$_GET["Liste_obs"];
		$id_dpt=$_GET["Liste_dpt"];
			
		
		// Requête récap des observations 
		$link=mysqli_connect('localhost','root','','oiseaudb2018');
		$query="SELECT observations.id_commune, SUM(observations.nombre), observations.id_oiseau, observations.id_observateur, communes.id_dpt,
		oiseaux.nom_commun
		FROM observations, oiseaux, communes
		WHERE observations.id_commune=communes.id_commune AND observations.id_oiseau=oiseaux.id_oiseau AND communes.id_dpt='$id_dpt' 
		AND observations.id_observateur='$id_obs'
		GROUP BY observations.id_oiseau
		";
		
		$res=mysqli_query($link,$query);
		$tab=mysqli_fetch_all($res);
		$nbl=mysqli_num_rows($res);
		$nbc=mysqli_num_fields($res);
		
		//On cherche le nombre le plus élevé
		$grd=$tab[0][1];
		for ($i=0;$i<$nbl;$i++){
			if ($tab[$i][1]>$grd){
				$grd=$tab[$i][1];
				$indice=$i;
			}
		}

		//Création de la table des résultats
		echo'<table border=5>';
		echo'<tr>';
		
		//Ajout des titres
		echo '<td>Oiseau</td>';
		echo '<td>Quantité</td>';
		echo'</tr>';
		
		//Ajout des données issues de la requête
		$i=0;
		while ($i<$nbl){
			echo'<tr>';
			if ($i==$indice){
				echo '<td><font color = #F79F81>'.$tab[$i][5].'</font></td>';
				echo '<td><font color = #F79F81>'.$tab[$i][1].'</font></td>';	
			}
			else{
				echo '<td>'.$tab[$i][5].'</td>';
				echo '<td>'.$tab[$i][1].'</td>';	
			}
			echo'</tr>';
		
		
			$i++;
		}
		//si la requete n'affiche rien, le tableau sera vide avec quand même les titres : il n'est pas nécessaire ici de mettre un message d'erreur
		echo'</table>';
	?>
	<br/><br/>
	<form action="Observation.php" method="GET" name="form1">
	<!-- Bouton de retour à la page de sélection des paramètres-->	
		<input type="submit" name=bt_retour" value="Retour">
	<form/>
<br/>
	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	
	
	</div><!-- #global -->
	
</body>
</html>