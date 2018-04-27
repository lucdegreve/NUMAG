	
	
	
	<table border=1>
	<tr>
	Titre du projet
	</tr>
	<tr>
	<INPUT TYPE='TEXT' name='titre_proj'>
	</tr><tr>
	Description du projet
	</tr><tr>
	<INPUT TYPE='TEXT' name='desc_proj'>
	</tr><tr>	
	Durée du projet
	</tr><tr>
	<INPUT TYPE='TEXT' name='duree' >
	</tr><tr>
	Date de publication
	</tr>
	<tr>
	<INPUT TYPE='TEXT' name='date_proj'>
	</tr>
	</table>
	
	
	
	<table border=1>
	<tr>
	Statut du projet
	</tr>
	<tr>
	<?php
			echo '<select name='etatprojet'>';
			$etatprojet=array('Non débuté','En cours','Terminé')
			for ($i=0; $i<=2; $i++)
				echo ("<option value= ".$etatprojet[$i].">".$etatprojet[$i]."</option>");
	?>
	</tr><tr>
	Nom
	</tr><tr>
	<INPUT TYPE='TEXT' name='nom_ind'>
	</tr><tr>	
	Prénom
	</tr><tr>
	<INPUT TYPE='TEXT' name='prenom' >
	</tr><tr>
	Téléphone
	</tr>
	<tr>
	<INPUT TYPE='TEXT' name='tel'>
	</tr><tr>
	Lien Mimosa
	</tr>
	<tr>
	<INPUT TYPE='TEXT' name='lien_mimosa'>
	</tr>
	</table>
	<form method="GET" action="previsualisation.php">
	<INPUT TYPE="SUBMIT" name="bt_submit" value="Valider">