<!-- Cette page met à jour les alertes projet
Code : Luc Degreve

<?php
header('Content-Type: text/html; charset=UTF-8');
include'Connexion_bdd.php';

$id_proj=$_GET["idp"];
$url=$_GET["url"];

// Marque l'alerte comme vu
$modifProjet="UPDATE Alertes_Projet SET vu_proj =1 where id_proj=".$id_proj;
#$modifProjet="DELETE FROM Alertes_Projet where id_proj=".$id_proj;

$resultPm=mysqli_query($link, $modifProjet);

//Ouvre le projet
header('Location: '.$url);
  exit();
?>