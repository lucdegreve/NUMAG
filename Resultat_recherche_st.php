Script Par Manuel, Marie, Julien L. 
Affichage des résultats d'une recherche

<?php
	$link=mysqli_connect('localhost','root','','BDD_racine');
	
	// récupération des données de la recherche
	$mot_cle=$_GET["libelle_mot_cle"];
	$lieu=$_GET["listedpt"];
	$mois=$_GET["listemois"];
	$periode_st=$_GET["periode_st"];
	
	//On met dans un tableau tous les résultats des stages de la base de données
	$query="SELECT periode_st, mois_debut_st, nom_dpt, libelle_mot_cle, titre_st, id_st
	FROM Stages 
	INNER JOIN Mots_cles
	ON Stages.id_mot_cle=Mots_cles.id_mot_cle
	INNER JOIN Departements
	ON Stages.id_dpt=Departements.id_dpt";
	
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
	$compteur=0;	
	{
		if ($Tab[$nombreligneeffectuées,0]=$periode_st)
		{	
			$compteur=$compteur+1;
		}
		if ($Tab[$nombreligneeffectuées,1]=$mois)
		{	
			$compteur=$compteur+1;
		}
		if ($Tab[$nombreligneeffectuées,2]=$lieu)
		{	
			$compteur=$compteur+1;
		}
		if int strpos ( string $mot_cle , mixed $Tab[$nombreligneeffectuées,3])=FALSE
		{	
			$compteur=$compteur;
		}
		else
		{
			$compteur=$compteur+1;
		}
		
		// On mémorise dans des listes le numéro des lignes quand au moins un critère est présent
		//  Ces listes sont créées par rapport aux nombres de correspondances entre recherche et stage de la base de donnée
		if $compteur=4
		{
			array_push($L4,$nombreligneeffectuées);
		}
		if $compteur=3
		{
			array_push($L3,$nombreligneeffectuées);
		}
		if $compteur=2
		{
			array_push($L2,$nombreligneeffectuées);
		}
		if $compteur=1
		{
			array_push($L1,$nombreligneeffectuées);
		}
	nombreligneeffectuées=nombrecolonneseffectuées+1;
	
	
	
	
	
	
	

	
	
	// Affichage de chaque tableau : On affiche les titres de chaque stage avec le lien vers l'offre 
	
	echo '<table>';
	$i=0;
	
	while ($i<count($L4)-1)
	{
		echo '<tr>';
		echo href="lien.php?lestage=$id_st">$Tab[$L4[$i]][4];
		$i++;
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L3)-1)
	{
		echo '<tr>';
		echo href="lien.php?lestage=$id_st">$Tab[$L3[$i]][4];
		$i++;
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L2)-1)
	{
		echo '<tr>';
		echo <a href="lien.php?lestage=$id_st">$Tab[$L2[$i]][4] </a>;
		$i++;
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L4)-1)
	{
		echo '<tr>';
		echo href="lien.php?lestage=$id_st">$Tab[$L1[$i]][4];
		$i++;
		echo '</tr>';
	}
	echo '</table>';
	echo '<br/>';
?>