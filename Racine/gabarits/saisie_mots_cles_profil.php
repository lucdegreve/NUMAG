<html>
<head>
	<meta charset="UTF-8">
	<!-- création des listes déroulantes principales et secondaires pour le choix des mots clés -->
</head>
<body>
	<?php
	//Création de la fonction pour faire les listes déroulantes 
	function liste($tab,$maliste)
	{
		echo'<select name="'.$maliste.'">';
		$nb=count($tab);
		for ($k=0;$k<$nb;$k++)
		{
			echo'<option value="'.$tab[$k][0].'">'. $tab[$k][1].'</option>';
		}
		echo'</select>';
	}
	
</body>
</html>
