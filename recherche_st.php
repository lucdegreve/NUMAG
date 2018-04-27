Script permettant de faire une recherche parmi les offres de stages
By Manuel, Julien Louet et Marie


<html>
	<head>
		<meta charset="UTF-8">
		<!-- On valide ci-dessous que l'étudiant a bien rentré un nombre de semaines concernant la durée du stage  -->
		<!-- L'étudiant peut choisir de laisser une case vide ou de remplir toutes les cases s'il veut une recherche plus ou moins précise 
			donc pas de message d'alerte s'il laisse une case incomplète-->
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
		
		<!-- ouverture de la fenetre pop up pour les tags -->
		<script type="text/javascript">
		function open_popup_test()
		{
		window.open("recherche_tag_st.php", "recherche_tag_st", "toolbar=yes, status=yes, scrollbars=yes, resizable=no, width=300, height=300");
		}
		</script>
		</head>
	<body>
	
	Rechercher un stage
	<BR/><BR/>
	
	<!-- Création d'un formulaire de recherche, rubrique mot clé, lieu de stage, mois de début et durée du stage -->
	<FORM action="Resultat_recherche_st.php" method="GET" onsubmit="return valider()" name="form1">
		
		<BR/>
		<TABLE>
		<TR>
			<TD>Mot clé</TD>
		</TR>
		<TR>
			<TD><a href="javascript:open_popup_test()">Ajouter des mots clés</a><br><br></TD>
			
		</TR>
		<BR/><BR/>
		<TR>
			<TD>Lieu</TD>
		</TR>
		<TR>
		<TD>
			<?php
			
			// Liste déroulante pour choisir le département où l'étudiant souhaite faire son stage (que en Nouvelle Aquitaine pour l'instant)
			echo '<select name='listedpt'>';
			$dpt=array('Pyrénées Atlantiques','Landes','Lot et Garonne','Gironde','Dordogne','Corrèze','Haute-Vienne','Creuse','Charentes','Charentes-maritimes','Deux-sèvres','Vienne');
			for ($j=0; $j<=11; $j++)
			{
				echo ("<option value= ".$dpt[$j].">".$dpt[$j]."</option>");
			}
			?>
		</TD>
		</TR>
		<BR/><BR/>
		<TR>
		<TD>Mois de début</TD>
		</TR>
		<TR>
		<TD>
			<?php
			
			//Liste déroulante pour choisir le mois de début
			echo '<select name='listemois'>';
			$mois=array('janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre');
			for ($i=0; $i<=11; $i++)
			{ echo ("<option value= ".$mois[$i].">".$mois[$i]."</option>");
			}
			?>	
		</TD>
		
		<!-- L'étudiant peut ici indiquer sa durée de stage en semaine, il peut soit de rien mettre dans la case soit mettre un nombre -->
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
		<INPUT border=0 src="loupe.jpg" width=50px height=50px TYPE=image  name="bt_submit" value=submit align="middle">
	</FORM>
	</body>
</html>