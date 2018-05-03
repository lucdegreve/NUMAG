ZAZA & MC
<br/><br/>

<?php
	//Récupérer l'identifiant du compte 
	session_start();
	$id_ind_co=$_SESSION["id_ind_co"];
	//Connexion au serveur
	$link = mysqli_connect('localhost', 'root', '', 'racine');
	//Afficher correctement les caractères spéciaux 
	mysqli_set_charset($link, 'UTF-8');
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		Accueil
	</title>
	<B>ACCUEIL</B>
	<br/><br/>
	<!-- Déclaration de la feuille de style -->
	
</head>

<body>
	<!-- DIV Entête-->
	
	
	<!-- On définit ici une section 'suggestions' -->
	<div id="suggestions">
	<B>Suggestions</B>
	<br/><br/>
	</div>
	
	<!-- On définit ici une section 'actualites' -->
	<div id="actualites">
	<B>Actualites</B>
	<br/><br/>
	
	<?php
	//$link=mysqli_connect('localhost', 'root', '', 'racine');
	//INCLUDE 'Connexion_bdd.php';
	
	//Récuperation des scores des actualités ordonnées 
	//ATTENTION A BIEN RENTRER LE BON ID_IND ET NON PAS L'ID 1
	$query_SA="SELECT id_actu, SUM(Centres_interet.Compteur) AS Score_actu 
	FROM Centres_interet, Mots_cles, mot_cle_actu 
	WHERE Centres_interet.id_ind=1 
	AND Centres_interet.id_mot_cle=Mots_cles.id_mot_cle 
	AND Mots_cles.id_mot_cle=Mot_cle_actu.id_mot_cle 
	GROUP BY id_actu 
	ORDER BY Score_actu DESC"; //SA = Score actualité 
	$result_SA=mysqli_query($link,$query_SA);
	$tab_SA=mysqli_fetch_all($result_SA);
	$nblig_SA=mysqli_num_rows($result_SA);
	$nbcol_SA=mysqli_num_fields($result_SA);
	//var_dump($tab_SA);	

	//Récuperation des scores des projets ordonnés 
	//ATTENTION A BIEN RENTRER LE BON ID_IND ET NON PAS L'ID 1
	$query_SP="SELECT id_proj, SUM(Centres_interet.Compteur) AS Score_projet
	FROM Centres_interet, Mots_cles, mot_cle_projet 
	WHERE Centres_interet.id_ind=1 
	AND Centres_interet.id_mot_cle=Mots_cles.id_mot_cle 
	AND Mots_cles.id_mot_cle=Mot_cle_projet.id_mot_cle 
	GROUP BY id_proj
	ORDER BY Score_projet DESC"; //SP = Score projet 
	$result_SP=mysqli_query($link,$query_SP);
	$tab_SP=mysqli_fetch_all($result_SP);
	$nblig_SP=mysqli_num_rows($result_SP);
	$nbcol_SP=mysqli_num_fields($result_SP);
	//var_dump($tab_SP);
	
	//Concaténer actu et projets 
	$tab_tot=array_merge($tab_SA, $tab_SP);
	//var_dump($tab_tot);
	
	$NBL=count($tab_tot);
	for ($i=0; $i<$NBL; $i++)
	{
		$identifiant[$i]=$tab_tot[$i][0];
		$score[$i]=$tab_tot[$i][1];
	}	
	array_multisort($score, SORT_DESC, $identifiant, SORT_ASC);
	for ($i=0; $i<$NBL; $i++)
	{
		$tab_trie[$i][0]=$identifiant[$i];
		$tab_trie[$i][1]=$score[$i];
	}
	
	//Construction des requêtes récupérant les tables Actualités et Projets
	$RequeteActu = "SELECT id_actu, titre_actu, url_actu, day(date_actu), month(date_actu), year(date_actu), desc_actu FROM Actualites";
	$RequeteProj = "SELECT id_proj, titre_proj, day(date_proj), month(date_proj), year(date_proj), duree, url_proj, desc_proj FROM projets";
	//Execution des requetes et production des recordset
	$ResultActu = mysqli_query($link,$RequeteActu);
	$ResultProj = mysqli_query($link,$RequeteProj);
	//Traitement des recordset
	$TabActu = mysqli_fetch_all($ResultActu);
	$TabProj = mysqli_fetch_all($ResultProj);
	
	//var_dump($tab_trie);
	for ($j=0; $j<$NBL; $j++)
	{
		$id = $tab_trie[$j][0];
		$k = 0;
		$verif = false;
		while ($k<count($TabActu) AND $verif == false)
		{
			if ($id == $TabActu[$k][0])
			{
				echo "<B>".$TabActu[$k][1]."</B> - ".$TabActu[$k][3]."/".$TabActu[$k][4]."/".$TabActu[$k][5];
				echo "<br/>";
				echo "<A href = ".$TabActu[$k][2]."> ".$TabActu[$k][2]." </A>";
				echo "<br/>";
				echo $TabActu[$k][6];
				echo "<br/><br/>";
				$verif = true;
			}
			$k++;
		}
		if ($verif == false)
		{
			$k = 0;
			while ($k<count($TabProj) AND $verif == false)
			{
				if ($id == $TabProj[$k][0])
				{
					echo "<B>".$TabProj[$k][1]."</B> - ".$TabProj[$k][2]."/".$TabActu[$k][3]."/".$TabActu[$k][4];
					echo "<br/>";
					echo "Durée : ".$TabProj[$k][5];
					echo "<br/>";
					echo $TabProj[$k][7];
					echo "<br/><br/>";
					$verif = true;
				}
				$k++;
			}
		}
	}
	?>
	<br/><br/>
	</div>

	<!-- On définit ici une section 'contacts' -->
	<div id="contacts">
	<B>Contacts</B>
	<br/><br/>
	<!-- Passage au codage PHP -->
	<?php
	//Connexion au serveur
	//$link = mysqli_connect('localhost', 'root', '', 'racine');
	//Afficher correctement les caractères spéciaux 
	//mysqli_set_charset($link, 'UTF-8');
	//Construction de la requête récupérant les contacts avec qui le compte a intéragi
//Insérer le $id_ind_co !!!!!!
	$RequeteContacts = "SELECT id_autre_ind, prenom, nom_ind, type_msg, date_derniere_interaction 
	FROM (SELECT CASE WHEN id_dest=1 THEN id_expe ELSE id_dest END as id_autre_ind, 
	CASE WHEN id_dest=1 THEN 'Message reçu' ELSE 'Message envoyé' END as type_msg, 
	max(date_mp) as date_derniere_interaction 
	FROM individus i, messages_prives m WHERE m.id_dest=1 OR m.id_expe=1 
	GROUP BY id_autre_ind ORDER BY date_derniere_interaction desc) V1 
	JOIN individus i ON V1.id_autre_ind=i.id_ind";
	//Execution de la requete et production du recordset
	$ResultContacts = mysqli_query($link,$RequeteContacts);
	//Traitement du recordset
	$TabContacts = mysqli_fetch_all($ResultContacts);
	$NbLignesContacts=mysqli_num_rows($ResultContacts);
	//Afficher les contacts les uns en dessous des autres 
	for ($i=0; $i<$NbLignesContacts; $i++)
	{
		echo $TabContacts[$i][1]." ".$TabContacts[$i][2];
		echo "<br/>";
		echo $TabContacts[$i][3]." - ".$TabContacts[$i][4];
		echo "<br/><br/>";
	}
	?>
	</div>

	<!-- DIV Pied de page -->
	
	
</body>
</html>