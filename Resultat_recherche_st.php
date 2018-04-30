Script Par Manuel, Marie, Julien L. 
Affichage des résultats d'une recherche
<?php 
session_start ();
?>

<html>
<body>
<?php
	$link=mysqli_connect('localhost','root','','BDD_racine');
	
	// récupération des données de la recherche
	$mot_cle=$_SESSION ["tag"];
	$lieu=$_GET["listedpt"];
	$mois=$_GET["listemois"];
	$periode_st=$_GET["periode_st"];
	
	//On met dans un tableau tous les résultats des stages de la base de données
	$query="SELECT stages.periode_st, stages.mois_debut_st, departements.nom_dpt, 
	mots_cles.libelle_mot_cle, stages.titre_st, stages.id_st, stages.url_st
	FROM stages
	INNER JOIN mot_cle_stage
	ON stages.id_st=mot_cle_stage.id_st
	INNER JOIN mots_cles
	ON mot_cle_stage.id_mot_cle=mots_cles.id_mot_cle
	INNER JOIN departements
	ON stages.id_dpt=departements.id_dpt";
	
	$result=mysqli_query($link,$query);
	
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	
	
	$nombrecolonneseffectuées=0;
	$nombreligneeffectuées=0;
	$L4=array();
	$L3=array();
	$L2=array();
	$L1=array();
	
	// On cherche tout d'abord à noté chaque recherche et selon le résultat (compteur =0=aucun des critères de recherche n'apprait dans la base de données
	// compteur = 4 = les quatre critères se retrouve dans la description de stage où l'on regarde.)
	
	while ($nombreligneeffectuées<$nbligne)
		
	{
		$compteur=0;
		if ($Tab[$nombreligneeffectuées][0]=$periode_st)
		{	
			$compteur=$compteur+1;
		}
		if ($Tab[$nombreligneeffectuées][1]=$mois)
		{	
			$compteur=$compteur+1;
		}
		if ($Tab[$nombreligneeffectuées][2]=$lieu)
		{	
			$compteur=$compteur+1;
		}
		$cherche=strpos($Tab[$nombreligneeffectuées][3], $mot_cle );
		if ($cherche = false)
		{	
			$compteur=$compteur;
		}
		else
		{
			$compteur=$compteur+1;
		}
		
		// On mémorise dans des listes le numéro des lignes quand au moins un critère est présent
		//  Ces listes sont créées par rapport aux nombres de correspondances entre recherche et stage de la base de donnée
		if ($compteur==4)
		{
			array_push($L4,$nombreligneeffectuées);
		}
		if ($compteur==3)
		{
			array_push($L3,$nombreligneeffectuées);
		}
		if ($compteur==2)
		{
			array_push($L2,$nombreligneeffectuées);
		}
		if ($compteur==1)
		{
			array_push($L1,$nombreligneeffectuées);
		}
	$nombreligneeffectuées=$nombreligneeffectuées+1;
	}
	
	
	
	
	


	
	
	// Affichage de chaque tableau : On affiche les titres de chaque stage avec le lien vers l'offre 
	
	echo '<table>';
	$i=0;
	
	while ($i<count($L4)-1)
	{
		echo '<tr>';
		$titre=$L4[$i];
		echo " <a href='.$Tab[$titre][6].'>'.$Tab[$titre][4].'</a>";
		$i++;
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L3)-1)
	{
		echo '<tr>';
		$titre=$L3[$i];
		echo "<a href='lien.php?lestage=$id_st'>'.$Tab[$titre][4].' </a>";
		$i++;
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L2)-1)
	{
		echo '<tr>';
		$titre=$L2[$i];
		echo "<a href='lien.php?lestage=$id_st'>'.$Tab[$titre][4].' </a>";
		$i++;
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L4)-1)
	{
		echo '<tr>';
		$titre=$L1[$i];
		echo "<a href='lien.php?lestage=$id_st'>'.$Tab[$titre][4].' </a>";
		$i++;
		echo '</tr>';
	}
	echo '</table>';
	echo '<br/>';
?>
</body>
</html>