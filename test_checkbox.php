<!--Algo par manuel.. permet de trouver les tags cochés et des les mettre en stock pour les réutiliser après-->
<?php
session_start();

if(isset($_GET['jury'])){ //sera vrai si au moins un moins un checkbox a été cochée
 
	/*foreach($_GET['jury'] as $choix){
 
		echo $choix."; "; //ex. : 12 16 23 31 ...							
	}
	*/
	$tab=$_GET['jury'];
	$_SESSION['tab']=$tab;
	var_dump($tab);
}
echo '<script type="text/javascript">
    window.close();
    </script>';

?>