<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','','bdd_racine_beta_27.04');

$id_st=$_GET["ids"];
$url=$_GET["url"];


// Marque l'alerte comme vu
$modifStage="UPDATE Alertes_Stage SET vu_st =1 where id_st=".$id_st;
#$modifProjet="DELETE FROM Alertes_Projet where id_proj=".$id_proj;

$resultsm=mysqli_query($link, $modifStage);

//Ouvre le stage 
header('Location: '.$url);
  exit();
