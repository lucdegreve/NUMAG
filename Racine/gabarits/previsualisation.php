<!--Manuel Marie et Julien -->
Previsualisation
<?php

session_start();
$tab=$_SESSION['tab'];
$id_ind_co=$_SESSION["id_ind_co"];
$description=$_GET["desc_proj"];
$duree=$_GET["duree"];
$titre=$_GET["titre_proj"];
$etat=$_GET["etatprojet"];
$date=$_GET["date_proj"];
$sout=1;
$listetags=array();
$i=0;
Include("Connexion_bdd.php");
	
	//On récupère les coordonnées de l'agriculteur grâce à l'id_ind_co
	$query="SELECT individus.id_ind, individus.nom_ind, individus.prenom, individus.tel, individus.mail, communes.nom_commune
			FROM individus inner join communes
			ON individus.id_commune=communes.id_commune
			WHERE individus.id_ind='".$id_ind_co."'";

	
	$result=mysqli_query($link,$query);
	
	$Tab_res=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
								# on insère tout dans un tableau 
echo" <table border=1>			
	<tr><td>
	".$titre."
	</td>
	<td>
	Contacts
	</td>
	</tr>
	<tr><BR/><td>
	Description du projet
	<BR/>
	".$description."
	<BR/>
	Lieu
	<BR/>";
	echo $Tab_res[0][5];
	
	echo"Durée du projet
	<BR/>
	".$duree."
	<br/>
	Tags
	<br/>
	";
	while ($i<count($tab))
	{	
		echo $tab[$i];
		echo ', ';
		$i++;
	}
	
	
echo "<br/>
	Etat
	<BR/>
	".$etat."
	</td><td>		
	Nom : ".$Tab_res[0][1]." 
	<BR/>
	Prénom : ".$Tab_res[0][2]."
	<BR/>
	Téléphone : ".$Tab_res[0][3]."
	<BR/>
	Mail : ".$Tab_res[0][4]."
	<BR/>
	</td>
	</tr>
	</table>";
	?>
	
	<form method="GET" action="creation_projet.php">	<!-- boutons retour et valider -->
	<INPUT TYPE="SUBMIT" name="retour" value="Retour">
	</form>
	
	<form method="GET" action="accueil_projet.php">
	<?php
	//requête d'insertion
	$query2="SELECT id_proj from projets";
	$result2=mysqli_query($link,$query2);
	$Tab_res2=mysqli_fetch_all($result2);
	$nbligne2=mysqli_num_rows($result2);
	$nbcol2=mysqli_num_fields($result2);
	
	$id_statut=0;
	if ($etat=='En-lancement')
		$id_statut=1;
	if ($etat=='En-cours')
		$id_statut=2;
	else
		$id_statut=3;
		
	
	$query_insert="insert into projets (id_proj, id_statut, id_ind, id_sout, titre_proj, desc_proj, date_proj, duree, url_proj)
	values ('$nbligne2', '$id_statut', '$sout', '$titre', '$description', '$date', '$duree', )";
	$rs_insert=mysqli_query($link,$query_insert);
	?>
	<INPUT TYPE="SUBMIT" name="bt_submit" value="Valider">
	</form>
	