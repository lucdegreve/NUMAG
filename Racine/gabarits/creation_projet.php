	<!--Script par Manuel, Julien et Marie-->
	<head>
		<?php Include("Entete-VALIDE.php");?>
		<br/>
		<br/>
		<title>Création de projet</title>
		<script type="text/javascript">
	        function open_popup_test()
	        {{
	        window.open("recherche_tag_st1.php", "recherche_tag_st", "toolbar=yes", "status=yes", "scrollbars=yes", "resizable=yes", "fullscreen=yes");
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
		<div class="container">
			<div class="jumbotron">
				<h2>Création de projet</h2>
				<hr class="my-4">
				<form method="GET" action="previsualisation.php" onsubmit="return valider()" name='form2'>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" class="form-control" name="titre_proj" placeholder="Entrer le titre">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="duree" placeholder="Entrer la durée">
							</div>
							<div class="form-group">
								<label for="date_proj"><p class="minilead">Entrer la date de publication</p></label>
								<input type="date" class="form-control" name="date_proj">
							</div>
							<div class="form-group">
						    <label for="etatprojet"><p class="minilead">Entrer la date de publication</p></label>
						    <select class="form-control" name="etatprojet">
						      <option>Non-débuté</option>
						      <option>En-cours</option>
						      <option>Terminé</option>
						    </select>
						  </div>
							<a href="javascript:open_popup_test()">Ajouter des mots clés</a>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
									<input type="text" class="form-control HauteurAuto" name="desc_proj" placeholder="Entrer la description du projet">
							</div>
							<div class="form-group">
								<input type="text" class="form-control VertMiimosa" name="lien_mimosa" placeholder="Lien Miimosa">
							</div>
						</div>
					</div>
					<hr class="my-4">
					<input type="submit" class="btn btn-block btn-info btn-lg center-block"name="bt_submit" value="Créer">
				</form>
			</div>
		</div>

		<?php Include("Pied-VALIDE.html");?>
</body>

</html>
