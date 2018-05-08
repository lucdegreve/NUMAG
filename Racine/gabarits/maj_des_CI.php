<!-- Code : Diane -->
<!-- Cette page met à jour les centres d'intéret depuis la page profil, et retourne à la page profil.
Elle n'affiche rien en elle-même -->

<?php
include "Entete-VALIDE.php";
Include("connexion_bdd.php");

//Pour chaque CI sélectionné on l'ajoute dans la table centres_interet avec une valeur de 5.
foreach($_POST['centre'] as $centre)
{
    $query="SELECT * FROM centres_interet WHERE id_ind=$id_ind_co AND id_mot_cle=$centre";
    $result = mysqli_query($link, $query);
    $tab=mysqli_fetch_array($result,MYSQLI_BOTH);
    
    //s'il y a déjà un centre d'intéret correspondant on fait rien, sinon on l'ajoute dans la base
    if ($centre!=$tab['id_mot_cle'])
    {
        $query1="INSERT INTO centres_interet (id_ind, id_mot_cle, compteur)
        VALUES ($id_ind_co, $centre, 5)";
        $result1=mysqli_query($link, $query1);
    }
}

//Ouvre la page
header('Location: compte.php');
  exit();
?>