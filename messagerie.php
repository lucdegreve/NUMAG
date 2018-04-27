<html>
<head>
</head>
<body>
	<?php
	$link=mysqli_connect('localhost','root','','oiseaudb2018');
	$query="SELECT prenom, nom_ind FROM Individus WHERE id_ind=";
	$result=mysqli_query($link,$query);
	$tab=mysqli_fetch_all($result);
	$nblig=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	echo $tab[0][0]." ".$tab[0][1];
	$query="SELECT date_mp, texte, id_exp FROM Messages_prives WHERE (id_dest= AND id_exp=) OR (id_dest= AND id_exp=) ORDER BY date_mp";
	$result=mysqli_query($link,$query);
	$tab=mysqli_fetch_all($result);
	$nblig=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	?>
	<form method="" Action="">
		<input type="text" value="Tapez votre message ici" onfocus="if(this.value=='Tapez votre message ici') this.value='';" size="100" name="message">
		<input type="submit" value="Envoyer" name="bt">
	</form>
</body>
</html>