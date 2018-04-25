<!-- Cette page affiche le r�capitulatif des observations men�es sur un d�partement -->



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>
		WAZO - Projet Techno. Web
	</title>
	<!-- D�claration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
	
<script>
function date(x){
var d = new Date();
document.getElementById("demo").innerHTML = d.toUTCString();
}
</script>

</head>

<body>

<div id="global">
	
	<!-- DIV Ent�te -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>
	
	<br/><br/>
	<!-- Requete pour sortir les donn�es qu'on va afficher -->
	<?php
	//on r�cup�re les valeurs s�lectionn�es sur la page d'avant
	$id_dpt=$_GET["Liste_dpt"];
	$trim=$_GET["Liste_trim"];
	
	//on cherche le nom du dpt (on connait que son id)
	$link=mysqli_connect('localhost','root','','oiseaudb2018');
	$query="SELECT id_dpt, nom_dpt
	FROM departements";
		
	$res=mysqli_query($link,$query);
	$tab=mysqli_fetch_all($res);
	$nbl=mysqli_num_rows($res);
	$nbc=mysqli_num_fields($res);
	
	for ($i=0;$i<$nbl;$i++){
		if ($tab[$i][0]==$id_dpt){
			$nom_dpt=$tab[$i][1];
		}
	}
	
	//on d�finie les mois qui serviront de bornes pour le trimestre
	for ($k=0;$k<4;$k++){
		if ($trim==1){
			$min=1;
			$max=3;
		}
		if ($trim==2){
			$min=4;
			$max=6;
		}
		if ($trim==3){
			$min=7;
			$max=9;
		}
		if ($trim==4){
			$min=10;
			$max=12;
		}
	}
	
	
	//On va chercher le seuil minimum
	$seuil=$_GET["seuil"];
	
	//Requ�te pour qui prend en compte le trimestre et le d�partement
	$link=mysqli_connect('localhost','root','','oiseaudb2018');
	$query="SELECT observations.date, observations.nombre, oiseaux.nom_commun, communes.nom_commune
	FROM observations, communes, oiseaux
	WHERE observations.id_commune=communes.id_commune AND observations.id_oiseau=oiseaux.id_oiseau AND communes.id_dpt='$id_dpt' 
	AND month(observations.date)>=$min AND month(observations.date)<=$max AND observations.nombre>=$seuil
	GROUP BY observations.date";
	
	$res=mysqli_query($link,$query);
	$tab=mysqli_fetch_all($res);
	$nbl=mysqli_num_rows($res);
	$nbc=mysqli_num_fields($res);
	
		
	//Titre
	echo '<b>Bilan des '.$nbl.' observations faites en '.$nom_dpt.' ('.$id_dpt.') durant le trimestre '.$trim." 
	par groupe d'au moins ".$seuil.' individus.</b><br/><br/>' ;
	
	
	//on parcourt le tableau pour n'afficher que les observations r�pondants aux crit�res s�lectionn�s en p.1
	for ($i=0;$i<$nbl;$i++){
	
			//pour le formatage de la date
			$date = date_create($tab[$i][0]);
			echo ($i+1).'. Le '.date_format($date, 'd/m/Y').', '.$tab[$i][1].' individus de '.$tab[$i][2].' ont �t� observ�s � '.$tab[$i][3].'.<br/><br/>';
				
		
	}
	//si "indice" n'a pas boug�, alors rien a �t� affich�. On affiche donc un message d'erreur
	if($i==0){
			echo'Aucune observation r�pondant aux crit�res s�lectionn�s';
	}
	?>
	<br/><br/>
	<form action="Groupe.php" method="GET" name="form1">
	<!-- Bouton de retour � la page de s�lection des param�tres-->	
		<input type="submit" name=bt_retour" value="Retour">
	<form/>
	<br/>
	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	
	
	</div><!-- #global -->
	
</body>
</html>