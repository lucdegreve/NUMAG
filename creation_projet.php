	
	
	<form method="GET" action="previsualisation.php" name='form1'> 
	<table border=1 style="width:1%">
	<tr><td>
	Titre du projet						<!-- Création du premier tableau à remplir par l'exploitant -->
	</td></tr><tr><td>
	<INPUT TYPE='TEXT' name='titre_proj'>
	</td></tr><tr><td>
	Description du projet
	</td></tr><tr><td>
	<INPUT TYPE='TEXT' name='desc_proj'>
	</td></tr><tr>	<td>
	Durée du projet
	</td></tr><tr><td>
	<INPUT TYPE='TEXT' name='duree' >
	</td></tr><tr><td>
	Date de publication
	</td></tr>
	<tr><td>
	<INPUT TYPE='TEXT' name='date_proj'>
	</td></tr>
	</table>
	 
	<table border=1 style="width:1%">					<!-- Création du deuxième tableau à rentrer par l'agriculteur. Il contient aussi une liste déroulante -->
	<tr><td>
	Statut du projet
	</td></tr>
	<tr><td>
	<?php
			echo '<select name=etatprojet>';
			$etatprojet=array('Non débuté','En cours','Terminé');
			for ($i=0; $i<=2; $i++)
				echo ("<option value= ".$etatprojet[$i].">".$etatprojet[$i]."</option>");
	?>
	</td></tr><tr><td>
	Nom
	</td></tr><tr><td>
	<INPUT TYPE='TEXT' name='nom_ind'>
	</td></tr><tr>	<td>
	Prénom
	</td></tr><tr><td>
	<INPUT TYPE='TEXT' name='prenom' >
	</td></tr><tr><td>
	Téléphone
	</td></tr>
	<tr><td>
	<INPUT TYPE='TEXT' name='tel'>
	</td></tr><tr><td>
	Lien Mimosa
	</td></tr>
	<tr><td>
	<INPUT TYPE='TEXT' name='lien_mimosa'>
	</td></tr>
	</table>
	
	 
	<INPUT TYPE="SUBMIT" name="bt_submit" value="Valider"><!-- Création du bouton valider-->
	</form>