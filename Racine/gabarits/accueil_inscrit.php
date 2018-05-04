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
	
	<!-- Ordonner les centres d'intérêt du profil en cours et de tous les autres profils pour pouvoir les comparer et sélectionner les profils apparentés-->
	<!-- Ne pas afficher proposition de connexion si déjà connectés -->
	<?php
	
	//Requête permettant de sortir la liste des inscrits pour les compter	
	$query_inscrits="SELECT distinct id_ind FROM Centres_interet WHERE id_ind <> ".$id_ind_co."";   
	$result_inscrits=mysqli_query($link,$query_inscrits);
	$tab_inscrits=mysqli_fetch_all($result_inscrits);
	$nblig_inscrits=mysqli_num_rows($result_inscrits); //Donne le nombre d'identifiants différents = nombre d'inscrits sur la plateforme
	$nbcol_inscrits=mysqli_num_fields($result_inscrits); 
	
	//echo'<BR/>';
	//echo'Tableau avec identifiants des inscrits sauf le connecté';
	//echo'<BR/>';
	//var_dump($tab_inscrits);//POUR VERIFIER
	
	//Requête dans une boucle permettant de sortir les 3 centres d interet principaux par inscrit avec le score correspondant à ceux du connectés
	//Faire boucle permettant de faire tableau
	$pos=0;
	for ($id=1;$id<=$nblig_inscrits+1;$id++){ //id représente l'identifiant de l'utilisateur, il commence donc à 1 
		if ($id <> $id_ind_co){
			$query_selection_profils="SELECT id_ind, id_mot_cle FROM Centres_interet WHERE id_ind = ".$id." ORDER BY compteur DESC LIMIT 3"; //requête sortant les 3 premiers mots clé pour l'identifiant id sans le faire pour l'id du connecté
			$result_selection_profils=mysqli_query($link,$query_selection_profils);
			$tab_selection_profils=mysqli_fetch_all($result_selection_profils);
			$nblig_selection_profils=mysqli_num_rows($result_selection_profils); 
			$nbcol_selection_profils=mysqli_num_fields($result_selection_profils); 
			$k=0;
			//Construction du tableau
			while($k<$nblig_selection_profils) 
			{
				$j=0;
				while($j<$nbcol_selection_profils) 
				{
					$tab_profils[$pos][$j]=$tab_selection_profils[$k][$j];
					$j++;
				}
				$k++;
				$pos++;
			}	
		}
	}

	//echo'<BR/>';
	//echo'Tableau avec identifiants, id des mots clé';
	//echo'<BR/>';
	//var_dump($tab_profils);//POUR VERIFIER
	
	//Requête sortant la liste des mots clé associés à leurs scores pour l'individu connecté
	$query_mots_cle_co="SELECT id_ind, id_mot_cle, compteur FROM Centres_interet WHERE id_ind = ".$id_ind_co." ORDER BY compteur DESC";   
	$result_mots_cle_co=mysqli_query($link,$query_mots_cle_co);
	$tab_mots_cle_co=mysqli_fetch_all($result_mots_cle_co);
	$nblig_mots_cle_co=mysqli_num_rows($result_mots_cle_co); 
	$nbcol_mots_cle_co=mysqli_num_fields($result_mots_cle_co); 
	
	//echo'Tableau de mes mots clé';
	//echo'<BR/>';	
	//var_dump($tab_mots_cle_co); //POUR VERIFIER 
	
	$nblig_profils=count($tab_profils);
	
	for ($j=0;$j<$nblig_mots_cle_co;$j++){
		for ($m=0;$m<$nblig_profils;$m++){
			if ($tab_mots_cle_co[$j][1]==$tab_profils[$m][1]){
				$tab_profils[$m][2]=$tab_mots_cle_co[$j][2];
			}
			else{
				if (empty($tab_profils[$m][2])){
					$tab_profils[$m][2]=0;
				}
				else{
				$tab_profils[$m][2]=$tab_profils[$m][2];
				}
			}
		}
	}
	
	//echo'Tableau avec identifiants, identifiants des mots clé et scores par mot clé';
	//echo'<BR/>';	
	//var_dump($tab_profils); //POUR VERIFIER 
	
	//Faire somme des scores par individu pour faire score total
	$c=0;	
	for($i=0;$i<$nblig_profils;$i=$i+3){
		$tab_inscrits[$c][1]=$tab_profils[$i][2]+$tab_profils[$i+1][2]+$tab_profils[$i+2][2];
		$c++;
	}

	//echo'Tableau avec identifiants et scores finaux';
	//echo'<BR/>';
	//var_dump($tab_inscrits); // POUR VERIFIER
	
	//Tri du tableau avec les scores finaux pour faire classement 
	$NBL=count($tab_inscrits);
    for ($i=0; $i<$NBL; $i++)
    {
        $identifiant[$i]=$tab_inscrits[$i][0];
        $score[$i]=$tab_inscrits[$i][1];
    }    
    array_multisort($score, SORT_DESC,$identifiant, SORT_ASC);
	
	for ($i=0; $i<$NBL; $i++)
    {
        $tab_inscrits[$i][0]=$identifiant[$i];
        $tab_inscrits[$i][1]=$score[$i];
	}
	//echo'Tableau trié';
	//echo'<BR/>';
	//var_dump($tab_inscrits);
	
	//Construction de la requête récupérant la table Individus
	$RequeteIndiv = "SELECT id_ind, prenom, nom_ind, id_prof FROM Individus";
	//Execution de la requete et production du recordset
	$ResultIndiv = mysqli_query($link,$RequeteIndiv);
	//Traitement du recordset
	$TabIndiv = mysqli_fetch_all($ResultIndiv);
	
	//Programmation de l'envoi de la demande de contact (si on clique sur le bouton 'Ajouter ce contact' --> voir après) 
	if (@isset($_GET['bt']))
	{
		$bt=$_GET['bt'];
		$IdSugg=$_GET['idcontact'];
		$query2="INSERT INTO messages_prives (id_dest, id_expe, texte, date_mp, lu) VALUES ($IdSugg, $id_ind_co, 'Ceci est le tout début de votre historique des messages directs', NOW(), 0)";
		$results2=mysqli_query($link,$query2);
	}
	for ($j=0; $j<$NBL; $j++)
	{
		$IdSugg = $tab_inscrits[$j][0];
		$k = 0;
		$verif = false;
		while ($k<count($TabIndiv) AND $verif == false)
		{
			if ($IdSugg == $TabIndiv[$k][0])
			{
				echo "<B>".$TabIndiv[$k][1]." ".$TabIndiv[$k][2]."</B>";
				echo "<br/>";
				if ($TabIndiv[$k][3] == 1)
				{
					echo "Agriculteur";
				}
				else
				{
					echo "Etudiant";
				}
				echo "<br/>";				
				//Ajouter en contact (à mettre dans la boucle)
				echo '<form method="GET">';
					//On transmet en caché l'id du destinataire et de l'utilisateur connecté
					echo "<input type='hidden' name='id_ind_co' value='$id_ind_co'>";
					echo "<input type='hidden' name='idcontact' value='$IdSugg'>";
					echo '<input type="submit" value="Ajouter ce contact" name="bt">';
				echo '</form>';
				echo "<br/>";
				$verif = true;
			}
			$k++;
		}
	}
	?>
	<br/><br/>
	</div>
	
	<!-- On définit ici une section 'actualites' -->
	<div id="actualites">
	<B>Actualites</B>
	<br/><br/>
	
	<?php
	//Récuperation des scores des actualités ordonnées
	$query_SA="SELECT id_actu, SUM(Centres_interet.Compteur) AS Score_actu 
	FROM Centres_interet, Mots_cles, mot_cle_actu 
	WHERE Centres_interet.id_ind=".$id_ind_co." 
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
	$query_SP="SELECT id_proj, SUM(Centres_interet.Compteur) AS Score_projet
	FROM Centres_interet, Mots_cles, mot_cle_projet 
	WHERE Centres_interet.id_ind=".$id_ind_co."
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
	//var_dump($tab_trie);
	
	//Construction des requêtes récupérant les tables Actualités et Projets
	$RequeteActu = "SELECT id_actu, titre_actu, url_actu, date_actu, desc_actu FROM Actualites";
	$RequeteProj = "SELECT id_proj, titre_proj, date_proj, duree, url_proj, desc_proj FROM projets";
	//Execution des requetes et production des recordset
	$ResultActu = mysqli_query($link,$RequeteActu);
	$ResultProj = mysqli_query($link,$RequeteProj);
	//Traitement des recordset
	$TabActu = mysqli_fetch_all($ResultActu);
	$TabProj = mysqli_fetch_all($ResultProj);
	
	for ($j=0; $j<$NBL; $j++)
	{
		$id = $tab_trie[$j][0];
		$k = 0;
		$verif = false;
		while ($k<count($TabActu) AND $verif == false)
		{
			if ($id == $TabActu[$k][0])
			{
				$date = $TabActu[$k][3];
				$jour = substr($date, -2, 2);
				$mois = substr($date, -5, 2);
				$annee = substr($date, -10, 4);
				echo "<B>".$TabActu[$k][1]."</B> - ".$jour."/".$mois."/".$annee;
				echo "<br/>";
				echo "<A href = ".$TabActu[$k][2]."> ".$TabActu[$k][2]." </A>";
				echo "<br/>";
				echo $TabActu[$k][4];
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
					$date = $TabProj[$k][2];
					$jour = substr($date, -2, 2);
					$mois = substr($date, -5, 2);
					$annee = substr($date, -10, 4);
					echo "<B>".$TabProj[$k][1]."</B> - ".$jour."/".$mois."/".$annee;
					echo "<br/>";
					echo "Durée : ".$TabProj[$k][3];
					echo "<br/>";
					echo $TabProj[$k][5];
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
	$RequeteContacts = "SELECT id_autre_ind, prenom, nom_ind, type_msg, date_derniere_interaction 
	FROM (SELECT CASE WHEN id_dest=".$id_ind_co." THEN id_expe ELSE id_dest END as id_autre_ind, 
	CASE WHEN id_dest=".$id_ind_co." THEN 'Message reçu' ELSE 'Message envoyé' END as type_msg, 
	max(date_mp) as date_derniere_interaction 
	FROM individus i, messages_prives m WHERE m.id_dest=".$id_ind_co." OR m.id_expe=".$id_ind_co." 
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
		$date = $TabContacts[$i][4];
		$jour = substr($date, -11, 2);
		$mois = substr($date, -14, 2);
		$annee = substr($date, -19, 4);
		$heure = substr($date, -8, 5);
		echo $TabContacts[$i][3]." le ".$jour."/".$mois."/".$annee." à ".$heure;
		echo "<br/><br/>";
	}
	?>
	</div>

	<!-- DIV Pied de page -->
	
	
</body>

</html>