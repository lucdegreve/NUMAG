<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <?php include "Entete-VALIDE.php" ?>
    <meta charset="utf-8">
    <title>Résultat recherche stage</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
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
 <!--   <script type="text/javascript">
      function open_popup_test()
      {
      window.open("recherche_tag_st.php", "recherche_tag_st", "toolbar=yes, status=yes, scrollbars=yes, resizable=no, width=300, height=300");
      }

      window.close();
    </script>

  </head>
  <body>
-->
<?php
	Include("Connexion_bdd.php");

    // récupération des données de la recherche
	@$mot_cle=$_GET ['tag'];
	$lieu=$_GET["dpt"];
	$mois=$_GET["mois"];
	$periode_st=$_GET["periode"];
	$nombreligneeffectuées=0;
  $i=0;

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
			array_push($L4,$Tab[$nombreligneeffectuées][4]);
		}
		if ($compteur==3)
		{
			array_push($L3,$Tab[$nombreligneeffectuées][4]);
		}
		if ($compteur==2)
		{
			array_push($L2,$Tab[$nombreligneeffectuées][4]);
		}
		if ($compteur==1)
		{
			array_push($L1,$Tab[$nombreligneeffectuées][4]);
		}
	$nombreligneeffectuées=$nombreligneeffectuées+1;
	}

?>
    <br>
    <div class="container-fluid">
      <br>
      <div class="row">
        <div class="col-lg-4">
          <div class="jumbotron HauteurMax">
            <h3>Modifier votre recherche</h3>
            <hr class="my-4">
            <form>
                <div class="form-group">
                  <label for="exampleSelect1">Choisissez un département</label>
                  <select class="form-control" id="dpt">
                    <option>Pyrénées Atlantiques</option>
                    <option>Landes</option>
                    <option>Lot et Garonne</option>
                    <option>Gironde</option>
                    <option>Dordogne</option>
                    <option>Corrèze</option>
                    <option>Haute-Vienne</option>
                    <option>Creuse</option>
                    <option>Charentes</option>
                    <option>Charentes-maritimes</option>
                    <option>Deux-sèvres</option>
                    <option>Vienne</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelect1">Choisissez le mois de début</label>
                  <select class="form-control" id="mois">
                    <option>Janvier</option>
                    <option>Février</option>
                    <option>Mars</option>
                    <option>Avril</option>
                    <option>Mai</option>
                    <option>Juin</option>
                    <option>Juillet</option>
                    <option>Août</option>
                    <option>Septembre</option>
                    <option>Octobre</option>
                    <option>Novembre</option>
                    <option>Décembre</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Choisissez la période</label>
                <select class="form-control" id="periode">
                  <option>6 semaines</option>
                  <option>3 mois</option>
                  <option>6 mois</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleSelect2">Choisissez un mot-clef</label>
                <select class="form-control" id="tags">
                  <option>Pintades</option>
                  <option>Orge</option>
                  <option>Apiculture</option>
                  <option>Maraichage</option>
                  <option>Ecologie</option>
                  <option>Oléoprotéagineux</option>
                  <option>Viticulture</option>
                  <option>INRA</option>
                  <option>Légumes</option>
                  <option>Fraises</option>
                </select>
              </div>
              <hr class="my-4">
              <button type="submit" class="btn btn-outline-info center-block">Modifier</button>
            </form>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="jumbotron HauteurMax">
            <h1>Résultat de la recherche</h1>
            <hr class="my-4">
            <br>
              <?php
                while ($i<count($L4))
                {
                  $idst=$L4[$i];
                  echo '<a href="offre_st.php?lestage='.$idst.'">'.$Tab[$idst][3].'</a><br/>';
                  $i++;
                  echo '<hr class="my-4">';
                }
                $i=0;
                while ($i<count($L3))
                {
                  $idst=$L3[$i];
                  echo "<a href='offre_st.php?lestage=".$idst."'>".$Tab[$idst][3]." </a><br/>";
                  $i++;
                  echo '<hr class="my-4">';
                }
                $i=0;
                while ($i<count($L2))
                {
                  $idst=$L2[$i];
                  echo "<a href='offre_st.php?lestage=".$idst."'>".$Tab[$idst][3]." </a><br/>";
                  $i++;
                  echo '<hr class="my-4">';
                }
                $i=0;
                while ($i<count($L1))
                {
                  $idst=$L1[$i];
                  echo "<a href='offre_st.php?lestage=".$idst."'>".$Tab[$idst][3]." </a><br/>";
                  $i++;
                  echo '<hr class="my-4">';
                }
              ?>
        </div>
      </div>
    </div>
    <br>
  </div>
  <?php include "Pied-VALIDE.html" ?>
  </body>
</html>
