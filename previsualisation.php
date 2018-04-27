
Previsualisation
<?php

session_start();
$tab=$_SESSION['tab'];
$nom=$_GET["nom_ind"];			# on récupère toutes les données
$prenom=$_GET["prenom"];
$telephone=$_GET["tel"];
$description=$_GET["desc_proj"];
#$lieu_st=$_GET[""]; le lieu pas encore mis car il manque la base de donnée.. Il suffira d'intégrer la valeur à l'aide d'une requete sql
$duree=$_GET["duree"];
$titre=$_GET["titre_proj"];
$etat=$_GET["etatprojet"];
$listetags=array();
$i=0;
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
	Durée du projet
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
	Nom : ".$nom." 
	<BR/>
	Prénom : ".$prenom."
	<BR/>
	Téléphone : ".$telephone."
	<BR/>
	</td>
	</tr>
	</table>";
	
	
	?><form method="GET" action="creation_projet.php">	<!-- boutons retour et valider -->
	<INPUT TYPE="SUBMIT" name="retour" value="Retour">
	</form>
	
	<INPUT TYPE="SUBMIT" name="bt_submit" value="Valider">