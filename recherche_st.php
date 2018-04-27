<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
	<BR/><BR/>
	<FORM action="Resultat_recherche_st.php" method="GET" name="form1">
		Rechercher un stage
		<BR/>
		<TABLE>
		<TR>
			<TD>Mots clés</TD>
		</TR>
		<TR>
			<TD><INPUT TYPE='TEXT' name='libelle_mot_cle'></TD>
		</TR>
		<BR/><BR/>
		<TR>
			<TD>Lieu</TD>
		</TR>
		<TR>
			<?php
			echo '<select name='listedpt'>';
			$dpt=array('Pyrénées Atlantiques','Landes','Lot et Garonne','Gironde','Dordogne','Corrèze','Haute-Vienne','Creuse','Charentes','Charentes-maritimes','Deux-sèvres','Vienne')
			for ($j=0; $j<=11; $j++)
				echo ("<option value= ".$dpt[$j].">".$dpt[$j]."</option>");
			?>
		</TR>
		<BR/><BR/>
		<TR>
		<TD>Date de début</TD>
		</TR>
		<TR>	
			<?php
			echo '<select name='listemois'>';
			$mois=array('janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre')
			for ($i=0; $i<=11; $i++)
				echo ("<option value= ".$mois[$i].">".$mois[$i]."</option>");
			?>	
		</TR>
		<BR/><BR/>
			<TD>Durée du stage</TD>
		</TR>
		<TR>
			<TD><INPUT TYPE='TEXT' name='periode_st'>semaines</TD>
		</TR>
		<BR/><BR/>
		<TR>
		</TABLE>
		
		<BR/>
		<INPUT TYPE="SUBMIT" name="bt_submit" value="loupe.jpg">
	</FORM>
	</body>
</html>