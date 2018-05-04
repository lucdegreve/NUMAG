	<!--Script par Manuel, Julien et Marie-->
	<head>
	<?php Include("Entete-VALIDE.php");?>
	<br/>
	<br/>

	<script type="text/javascript">
        function open_popup_test()
        {{
        window.open("recherche_tag_st1.php", "recherche_tag_st", "toolbar=yes, status=yes, scrollbars=yes, resizable=no, width=300, height=300");
		}   
       // window.close();
		}
        
		function valider(){
				var ok=1;
				message ="";
				if (document.form2.titre_proj.value =="") 
				{
					ok=ok-1;
					message =message + "Veuillez saisir un titre de projet \n";
				}
				if (document.form2.desc_proj.value =="") 
				{
					ok=ok-1;
					message =message + "Veuillez saisir une description \n";
				}
				if (document.form2.date_proj.value =="") 
				{
					ok=ok-1;
					message =message + "Veuillez saisir une date de début de projet \n";
				}
				if (document.form2.duree.value =="") 
				{
					ok=ok-1;
					message =message + "Veuillez saisir une durée du projet \n";
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
	<form method="GET" action="previsualisation.php" onsubmit="return valider()" name='form2'> 
	<table border=1 style="width:1%">
	<tr><td>
	Titre du projet						<!-- Création du premier tableau à remplir par l'exploitant -->
	</td></tr><tr><td>
	<INPUT TYPE='TEXT' name='titre_proj'>
	</td></tr><tr><td>
	Description du projet
	</td></tr><tr><td>
	<INPUT TYPE='TEXT' name='desc_proj'>
	</td></tr><tr>	<td>
	Durée du projet
	</td></tr><tr><td>
	<INPUT TYPE='TEXT' name='duree' >
	</td></tr><tr><td>
	Date de publication
	</td></tr>
	<tr><td>
	<INPUT TYPE='date' name='date_proj'>
	</td></tr>
	</table>
	 
	<table border=1 style="width:1%">					<!-- Création du deuxième tableau à rentrer par l'agriculteur. Il contient aussi une liste déroulante -->
	<tr><td>
	Statut du projet
	</td></tr>
	<tr><td>
	<?php
			echo '<select name=etatprojet>';
			$etatprojet=array('Non-débuté','En-cours','Terminé');
			for ($i=0; $i<=2; $i++)
				echo ("<option value= ".$etatprojet[$i].">".$etatprojet[$i]."</option>");
	?>
	</td></tr><tr><td>
	Lien Mimosa
	</td></tr>
	<tr><td>
	<INPUT TYPE='TEXT' name='lien_mimosa'>
	</td></tr>
	</table>
	<TD><a href="javascript:open_popup_test()">Ajouter des mots clés</a><br><br></TD>
	 
	<INPUT TYPE="SUBMIT" name="bt_submit" value="Visualiser"><!-- Création du bouton valider-->
	</form>
	</body>
	<br/>
	<br/>
	<br/>
	<?php Include("Pied-VALIDE.html");?>
	
</html>
