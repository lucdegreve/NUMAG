<HTML><!--manu .. Création d'un questionnaire qui ira sur le pop up-->


<form method="GET" action="test_checkbox.php">
	<?php
			$link=mysqli_connect('localhost','root','','bdd_racine');
			$query="SELECT libelle_mot_cle 
			FROM mots_cles ";
			$result=mysqli_query($link,$query);
			$Tab=mysqli_fetch_all($result);
			$nbligne=mysqli_num_rows($result);
			for ($j=0; $j<$nbligne; $j++)
			{
				echo '<input type="checkbox" value='.$Tab [$j][0].'/>'.$Tab [$j][0].' </br>';
			}
			echo "</select>";
			?>

<input type= "submit" name="soumettre" size="10" value="soumettre">
</form>