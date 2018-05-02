Script stockant la valeur du tag de la recherche de stage et qui ferme la fenetre pop-up
By Manuel, Julien Louet et Marie


<?php 
session_start ();
?>

<html>
<?php
	
	// Stockage du tag
	$_SESSION ["tag"]=$_GET['listetag'];
	?>
	<!-- Fermeture fenetre pop-up -->
	<script type="text/javascript">
	window.close();
	</script>

</html>