<html>
	<head>
		<meta charset="UTF-8">
		<script type="text/javascript">
			function valider(){
				var ok=1;
				message ="";
				var a = document.form1.periode_st.value
				if ( a!="" && isNaN(a)) 
				{
					ok=ok-1;
					message ="Veuillez saisir un nombre de semaines valide \n";
				}
				if (ok==1)
				{
					return true;
				}
				else 
				{
					alert(message);
					return false ;
				}
			}	
		</script>
		<!-- Déclaration de la feuille de style -->	
		<link rel="stylesheet" type="text/css" href="maFeuilleDeStyle.css" media="all" />
	</head>
	<body>
	<BR/><BR/>
	
	<!-- Création d'un formulaire de recherche, rubrique mot clé, lieu de stage, mois de début et durée du stage -->
	<FORM action="Resultat_recherche_st.php" method="GET" onsubmit="return valider()" name="form1">
		Rechercher un stage
		<BR/>
		<TABLE>
		<TR>
			<TD>Mot clé</TD>
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
			
			// Liste déroulante pour choisir le département où l'étudiant souhaite faire son stage (que en Nouvelle Aquitaine pour l'instant)
			echo '<select name='listedpt'>';
			$dpt=array('Pyrénées Atlantiques','Landes','Lot et Garonne','Gironde','Dordogne','Corrèze','Haute-Vienne','Creuse','Charentes','Charentes-maritimes','Deux-sèvres','Vienne');
			for ($j=0; $j<=11; $j++)
			{
				echo ("<option value= ".$dpt[$j].">".$dpt[$j]."</option>");
			}
			?>
		</TR>
		<BR/><BR/>
		<TR>
		<TD>Mois de début</TD>
		</TR>
		<TR>	
			<?php
			
			//Liste déroulante pour choisir le mois de début
			echo '<select name='listemois'>';
			$mois=array('janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre');
			for ($i=0; $i<=11; $i++)
			{ echo ("<option value= ".$mois[$i].">".$mois[$i]."</option>");
			}
			?>	
			
		
		<!-- L'étudiant peut ici indiquer sa durée de stage en semaine, il peut soit de rien mettre dans la case soit mettre un nombre
		(il aura un message d'alerte s'il met autre chose qu'un nombre) -->
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