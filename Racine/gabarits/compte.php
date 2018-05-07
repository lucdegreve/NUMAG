<!--Page utilisateur-->

<!--Affichage des centres d'intérêts-->
<?php
    include("Entete-NC.php");
    include("connexion_bdd.php");
    
    $query = "SELECT id_mot_cle, libelle_mot_cle FROM mots_cles ORDER BY libelle_mot_cle";
    $result=mysqli_query($link,$query);
    echo "patate";
    
    $query1 = "SELECT * FROM centres_interet WHERE id_ind=1";
    $result1 = mysqli_query($link, $query1);
    
    echo '<form action="maj_des_CI.php" method="post" name="form1">';
        while ($row=mysqli_fetch_array($result,MYSQLI_BOTH))
                {
                        echo '<div class="form-check">';
                        $id=$row["id_mot_cle"];
                        $nom =$row["libelle_mot_cle"];
                        $row1 = mysqli_fetch_array($result1, MYSQLI_BOTH);
                        
                        $idsel=$row1['id_mot_cle'];
                        echo $idsel;
                        //on pré-coche les CI entrés précédemment
                        if ($row1['id_mot_cle']==$row['id_mot_cle'])
                        {
                            echo '<input class="form-check-input" type="checkbox" name="centre[]" value='.$id.' checked>';
                            echo "<option> ".$nom." </option>";
                        }
                        
                        //on affiche décoché les CI non entrés précédemment
                        else
                        {
                            echo '<input class="form-check-input" type="checkbox" name="centre[]" value='.$id.'>';
                            echo "<option> ".$nom." </option>";
                        }
                        
                        echo'</div>';
                }
        echo '<input type="submit" class="btn btn-info" value="Valider les modifications"></input>';
    echo '</form>';
?>