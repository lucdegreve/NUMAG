<!--Page utilisateur-->

<!--Affichage des centres d'intérêts-->
<?php
    include("Entete-NC.php");
    include("Connexion_bdd.php");

    $query = "SELECT id_mot_cle, libelle_mot_cle FROM mots_cles ORDER BY libelle_mot_cle";
    $result=mysqli_query($link,$query);
    $tab = mysqli_fetch_all($result);
    $nblig=mysqli_num_rows($result);

    $query1 = "SELECT * FROM centres_interet WHERE id_ind=2";
    $result1 = mysqli_query($link, $query1);
    $tab1 = mysqli_fetch_all($result1);
    $nblig1=mysqli_num_rows($result1);

    echo '<form action="maj_des_CI.php" method="post" name="form1">';
      echo '<div class="form-check">';
        for ($i=0; $i<$nblig; $i++){
          $verif = 0;
          for ($j=0; $j<$nblig1; $j++){
            if ($tab[$i][0]==$tab1[$j][1]){
              echo '<input class="form-check-input" type="checkbox" name="centre[]" value='.$tab[$i][0].' checked>';
              echo "<option> ".$tab[$i][1]." </option>";
              $verif++;
            }
          }
          if ($verif==0){
            echo '<input class="form-check-input" type="checkbox" name="centre[]" value='.$tab[$i][0].'>';
            echo "<option> ".$tab[$i][1]." </option>";
          }
        }
        echo'</div>';
      echo '<input type="submit" class="btn btn-info" value="Valider les modifications"></input>';
    echo '</form>';
?>
