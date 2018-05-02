<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','','bdd_racine_beta_27.04');

$id_proj=$_GET["idp"];
$url=$_GET["url"];

// Marque l'alerte comme vu
$modifProjet="UPDATE Alertes_Projet SET vu_proj =1 where id_proj=".$id_proj;
#$modifProjet="DELETE FROM Alertes_Projet where id_proj=".$id_proj;

$resultPm=mysqli_query($link, $modifProjet);

//Ouvre le projet
header('Location: '.$url);
  exit();
