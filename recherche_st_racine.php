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
		<link rel="stylesheet" type="text/css" href="Feuille_Style.css" media="all" />
	</head>
	<body>
	
	<div id="global">
	
	<!-- DIV Entête -->
	<?php include("Entete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>


	<div id="contenu">
	
	<div id="unisombre">
	Rechercher un stage
	</div>
	<!-- Création d'un formulaire de recherche, rubrique mot clé, lieu de stage, mois de début et durée du stage -->
	<FORM action="Resultat_recherche_st.php" method="GET" onsubmit="return valider()" name="form1">
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
		<TD>
			<?php
			
			// Liste déroulante pour choisir le département où l'étudiant souhaite faire son stage (que en Nouvelle Aquitaine pour l'instant)
			echo "<select name='listedpt'>";
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
			echo "<select name='listemois'>";
			$mois=array('janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre');
			for ($i=0; $i<=11; $i++)
			{ echo ("<option value= ".$mois[$i].">".$mois[$i]."</option>");
			}
			?>	
		</TD>
		
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
		</TABLE>
		
		<BR/>
		<INPUT border=0 src="loupe.jpg" width=50px height=50px TYPE=image  name="bt_submit" value=submit align="middle">
		
		</div><!-- #contenu -->

	<!-- DIV Pied de page -->		
	<?php include("Pied_de_Page.html"); ?>	


	</div><!-- #global -->
	</FORM>
	</body>
</html>