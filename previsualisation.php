
Previsualisation
<?php
$nom=$_GET["nom_ind"]
$prenom=$_GET["prenom"]
$telephone=$_GET["tel"]
$description=$_GET[""]
$lieu_st=$_GET[""]
$duree=$_GET[""]
$titre=$_GET["titre_proj"]
$etat=$_GET["etatprojet"]

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
	Etat
	<BR/>
	".$etat."
	</td><td>		
	Nom : ".$nom." 
	<BR/>
	Prénom : ".$prenom."
	<BR/>
	Téléphone : ".telephone."
	<BR/>
	</td>
	</tr>
	</table>";
	
	
	?><form method="GET" action="creation_projet.php">
	<INPUT TYPE="SUBMIT" name="retour" value="Retour">
	</form>
	
	<INPUT TYPE="SUBMIT" name="bt_submit" value="Valider">