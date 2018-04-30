Script de la fenetre pop-up, permettant de sélectionner un tag
By Manuel, Julien Louet et Marie


<HTML>


<FORM action="resultat_tag_st.php" method="GET" onsubmit="return valider()" name="form2">
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
<INPUT TYPE=SUBMIT  value='Valider'> 

</form>

</HTML>