<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recherche de stage</title>
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
    <script type="text/javascript">
    function open_popup_test()
    {
    window.open("recherche_tag_st.php", "recherche_tag_st", "toolbar=yes, status=yes, scrollbars=yes, resizable=no, width=300, height=300");
    }

    window.close();
    </script>

  </head>
  <body>
    <?php include "Entete-VALIDE.html" ?>
    <br/>
    <div class="container-fluid">
      <br>
      <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
          <div class="jumbotron">
            <h1 class="display-4">Recherchez un stage</h1>
            <hr class="my-4">
            <br/><br/>
            <form action="Result_Recherche_st.php" method="get">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleSelect1">Choisissez un département</label>
                    <select class="form-control" name="dpt">
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
                    <select class="form-control" name="mois">
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
                  <select class="form-control" name="periode">
                    <option>6 semaines</option>
                    <option>3 mois</option>
                    <option>6 mois</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label for="exampleSelect2">Choisissez un mot-clef</label>
                      <select multiple class="form-control" name="tag">
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
                </div>
              </div>
              <hr class="my-4">
              <input type="submit" class="btn btn-outline-info btn-lg center-block" value="Rechercher"></input>
            </form>
          </div>
        </div>
      </div>
      <br>
    </div>
    <br>
  <?php include "Pied-VALIDE.html" ?>
  </body>
</html>
