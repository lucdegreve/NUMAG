<!-- Cette page met à jour les alertes message
Code : Luc Degreve

<?php
header('Content-Type: text/html; charset=UTF-8');
$link=mysqli_connect('localhost','root','numag2018','bdd_racine_beta_27.04.5');

$id_expe=$_GET["id_expe"];


// Marque l'alerte comme vu
$modifMessage="UPDATE messages_prives SET vu_proj =1";
//$modifMessage="UPDATE messages_prives SET vu_proj =1 where id_expe=".$id_expe;

$resultMm=mysqli_query($link, $modifMessage);

//Ouvre la messagerie
header('Location: http://localhost/numag/Racine/gabarits/messagerie.php');
//header('Location: https://www.agro-bordeaux.fr/');
  exit();
?>