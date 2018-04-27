Script de redaction d'une nouvelle offre de stage
By Manuel, Julien Louet et Marie

Attention script non fini car inutile pour le démonstrateur !


<html>
	<head>
	<!-- On veut que l'agricutlteur rentre toutes les données propre à son offre de stage -->
		<meta charset="UTF-8">
		<script type="text/javascript">
			function valider(){
				var ok=1;
				message ="";
				if (document.form2.titre_st.value =="") 
				{
					ok=ok-1;
					message =message + "Veuillez saisir un titre de stage \n";
				}
				if (document.form2.description_st.value =="") 
				{
					ok=ok-1;
					message =message + "Veuillez saisir une description \n";
				}
				var a = document.form2.periode_st.value
				if ( a!="" && isNaN(a)) 
				{
					ok=ok-1;
					message =message + "Veuillez saisir un nombre de semaines valide \n";
				}
				if (a=="") {
					ok=ok-1;
					message =message + "Veuillez saisir le nombre de semaines de durée du stage \n";
				}
				if (document.form2.libelle_mot_cle.value =="") 
				{
					ok=ok-1;
					message =message + "Veuillez saisir des mots clés relatif à votre offre \n";
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
	</head>
	<body>
	
	<!-- L'agriculteur doit remplir des données afin que les étudiants peuvent ensuite facilement rechercher des stages: Titre, mots clés,
	description, durée et mois de début -->
	
	
	<BR/><BR/>
	<FORM action="new_st.php" method="GET" onsubmit="return valider()" name="form2">
		<TABLE>
		<TR>
			<TD>Titre du stage</TD>
		</TR>
		<TR>
			<TD><INPUT TYPE='TEXT' name='titre_st'></TD>
		</TR>
		<BR/><BR/>
		<TR>
			<TD>Description du stage</TD>
		</TR>
		<TR>
			<TD><INPUT TYPE='TEXT' name='description_st'></TD>
		</TR>
		<BR/><BR/>
		
		<TR>
			<TD>Durée du stage</TD>
		</TR>
		<TR>
			<TD><INPUT TYPE='TEXT' name='periode_st'>semaines</TD>
		</TR>
		<BR/><BR/>
		<TR>
			<TD>Mots cles</TD>
		</TR>
		<TR>
			<TD><INPUT TYPE='TEXT' name='libelle_mot_cle'></TD>
		</TR>
		<BR/><BR/>
				<TD>Date de début</TD>
		<TR>	
			<?php
			echo '<select name='listemois'>';
			$mois=array('janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre')
			for ($i=0; $i<=11; $i++)
				echo ("<option value= ".$mois[$i].">".$mois[$i]."</option>");
			?>	
		</TR>
		<BR/><BR/>
		</TABLE>
		
		<INPUT TYPE="TEXT" name="post_st" value="poster un stage">
		<BR/>
		<INPUT TYPE="SUBMIT" name="envoi" value="poster">
	</FORM>
	</body>
</html>