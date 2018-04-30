<HTML>
Bonjour

<FORM action="Resultat_recherche_st.php" method="GET" onsubmit="return valider()" name="form2">
    Qu'est-ce que vous recherchez ?<br />
    
<?php
			
			// Liste déroulante pour choisir le tag pour la reherche de stage
			echo "<select name='listetag'>";
			$tag=array('','Pintades', 'Orge', 'Apiculture', 'Maraichage', 'Ecologie', 'Oléoprotéagineux', 'Viticulture', 'INRA', 'Légumes', 'Fraises', 
			'Machinisme', 'Limousine');
			for ($j=0; $j<=11; $j++)
			{
				echo ("<option value= ".$tag[$j].">".$tag[$j]."</option>");
			}
			?>
</form>

</HTML>