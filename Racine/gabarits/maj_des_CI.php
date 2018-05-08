<!-- Code : Diane Ophélie-->
<!-- Cette page met à jour les centres d'intéret depuis la page profil, et retourne à la page profil.
Elle n'affiche rien en elle-même -->

<?php
include "Entete-VALIDE.php";
Include("connexion_bdd.php");

//Liste CI      //Liste modif           //Action

//OK            //OK                    //pas touche
//.             //OK                    //ajout aux CI (compteur 5)
//OK            //.                     //supression des CI

//Liste CI avant toute opération

//Liste modif
$LISTE = array();

foreach ($_POST['centre'] as $centre)
{
    $LISTE[] = $centre;
    //Si le CI coché est déjà présent dans les CI, on le laisse
    $query0 = "SELECT * FROM centres_interet WHERE id_ind=$id_ind_co AND id_mot_cle=$centre";
    $result0 = mysqli_query($link, $query0);
    $tab0=mysqli_fetch_array($result0,MYSQLI_BOTH);
    
    //Si le CI coché n'est pas présent dans les CI, on l'ajoute
    if ($tab0['id_mot_cle']== NULL)
    {
        $query1="INSERT INTO centres_interet (id_ind, id_mot_cle, compteur)
        VALUES ($id_ind_co, $centre, 5)";
        $result1=mysqli_query($link, $query1);
    }
}

//Si on a décoché un CI, on l'enlève de la table des CI
//=si il y a un CI dans la table qui n'est pas coché

$query2 = "SELECT id_mot_cle FROM centres_interet WHERE id_ind=$id_ind_co";
$result2 = mysqli_query($link, $query2);

while ($row=mysqli_fetch_array($result2,MYSQLI_BOTH))
{
    $supp=0;
    for ($i=0; $i<count($LISTE); $i++)
    {
        if ($LISTE[$i]==$row[0])
        {
            $supp=1;
        }
    }
    if ($supp==0)
    {
        $query3="DELETE FROM centres_interet WHERE (id_ind=$id_ind_co AND id_mot_cle=$row[0])";
        $result3=mysqli_query($link, $query3);
    }
}

//Ouvre la page
header('Location: compte.php');
  exit();
?>