<!--Script Par Manuel, Marie, Julien L. Affichage des résultats d'une recherche -->
<?php 
session_start ();
?>

<html>
<body>
<?php
	$link=mysqli_connect('localhost','root','','bdd_racine');
	
	// récupération des données de la recherche
	$mot_cle=$_GET ['listetag'];
	$lieu=$_GET["listedpt"];
	$mois=$_GET["listemois"];
	$periode_st=$_GET["periode_st"];
	$nombreligneeffectuées=0;
	
	//On met dans un tableau tous les résultats des stages de la base de données
	$query="SELECT stages.periode_st, stages.mois_debut_st, departements.nom_dpt, stages.titre_st, stages.id_st, stages.url_st 
	FROM stages
	INNER JOIN departements
	ON stages.id_dpt=departements.id_dpt";
	

	
	$result=mysqli_query($link,$query);
	
	$Tab=mysqli_fetch_all($result);
	$nbligne=mysqli_num_rows($result);
	$nbcol=mysqli_num_fields($result);
	
	

	
	$nombrecolonneseffectuées=0;
	
	$L4=array();
	$L3=array();
	$L2=array();
	$L1=array();
	
	// On cherche tout d'abord à noté chaque recherche et selon le résultat (compteur =0=aucun des critères de recherche n'apprait dans la base de données
	// compteur = 4 = les quatre critères se retrouve dans la description de stage où l'on regarde.)
	
	while ($nombreligneeffectuées<$nbligne)
		
	{
		$compteur=0;
		if ($Tab[$nombreligneeffectuées][0]==$periode_st)
		{	
			$compteur=$compteur+1;
		}
		if ($Tab[$nombreligneeffectuées][1]==$mois)
		{	
			$compteur=$compteur+1;
		}
		if ($Tab[$nombreligneeffectuées][2]==$lieu)
		{	
			$compteur=$compteur+1;
		}
		$query2="SELECT mots_cles.libelle_mot_cle FROM mots_cles 
	INNER JOIN mot_cle_stage
	ON mot_cle_stage.id_mot_cle=mots_cles.id_mot_cle
	WHERE mot_cle_stage.id_st=1+".$nombreligneeffectuées;
	$result2=mysqli_query($link,$query2);
	
	$Tab2=mysqli_fetch_all($result2);
	$nbligne2=mysqli_num_rows($result2);
	$nbcol2=mysqli_num_fields($result2);
	$k=0;
	while ($k<$nbligne2)
	{
		if ($Tab2[$k][0]==$mot_cle)
		{	
			$compteur=$compteur+1;
		}
		$k=$k+1;
	}
		// On mémorise dans des listes le numéro des lignes quand au moins un critère est présent
		//  Ces listes sont créées par rapport aux nombres de correspondances entre recherche et stage de la base de donnée
		if ($compteur==4)
		{
			array_push($L4,$nombreligneeffectuées);
		}
		if ($compteur==3)
		{
			array_push($L3,$nombreligneeffectuées);
		}
		if ($compteur==2)
		{
			array_push($L2,$nombreligneeffectuées);
		}
		if ($compteur==1)
		{
			array_push($L1,$nombreligneeffectuées);
		}
	$nombreligneeffectuées=$nombreligneeffectuées+1;
	}

	


	
	
	// Affichage de chaque tableau : On affiche les titres de chaque stage avec le lien vers l'offre 
	$i=0;
	?>
		Résultat de recherche de stage
	<!-- ouverture de la fenetre pop up pour les tags -->
		<script type="text/javascript">
		function open_popup_test()
		{
		window.open("recherche_tag_st.php", "recherche_tag_st", "toolbar=yes, status=yes, scrollbars=yes, resizable=no, width=300, height=300");
		}
		
		window.close();
		</script>
		</head>
	<body>
	
	<BR/><BR/>
	
	<!-- Création d'un formulaire de recherche, rubrique mot clé, lieu de stage, mois de début et durée du stage -->
	<FORM action="Resultat_recherche_st.php" method="GET" onsubmit="return valider()" name="form1">
		
		<BR/>
		<TABLE>
		<TR>
			<TD>Mot clé</TD>
		</TR>
		<TR>
		<TD>
			<?php
			
			//Liste déroulante pour choisir le mois de début
			echo "<select name='listemois'>";
			$mois=array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
			for ($i=0; $i<=11; $i++)
			{ echo ("<option value= ".$mois[$i].">".$mois[$i]."</option>");
			}
			echo "</select>";
			?>
		</TD>
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
			$mois=array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
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
	<?php
		echo '<table>';
	while ($i<count($L4))
	{
		echo '<tr>';
		echo '<td>';
		$idst=$L4[$i];
		echo "L4".$idst;
		echo "<a href='offre_st.php?lestage=".$idst."'>".$Tab[$idst][3]." </a>";
		$i++;
		echo '</td>';
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L3))
	{
		
		echo '<tr>';
		echo '<td>';
		$idst=$L3[$i];
		echo "L3".$idst;
		echo "<a href='offre_st.php?lestage=".$idst."'>".$Tab[$idst][3]." </a>";
		$i++;
		echo '</td>';
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L2))
	{
		echo '<tr>';
		echo '<td>';
		$idst=$L2[$i];
		echo "L2".$idst;
		echo "<a href='offre_st.php?lestage=".$idst."'>".$Tab[$idst][3]." </a>";
		$i++;
		echo '</td>';
		echo '</tr>';
	}
		$i=0;
	while ($i<count($L1))
	{
		echo '<tr>';
		echo '<td>';
		$idst=$L1[$i];
		echo "L1".$idst;
		echo "<a href='offre_st.php?lestage=".$idst."'>".$Tab[$idst][3]." </a>";
		$i++;
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '<br/>';
?>
</body>
</html>