<!-- Cette page met à jour les alertes message
Code : Luc Degreve

<?php
header('Content-Type: text/html; charset=UTF-8');
include'Connexion_bdd.php';

$id_expe=$_GET["id_expe"];
$id_dest=$_GET["id_dest"];


// Marque l'alerte comme vu
$modifMessage="UPDATE messages_prives SET lu =1";
//$modifMessage="UPDATE messages_prives SET vu_proj =1 where id_expe=".$id_expe;

$resultMm=mysqli_query($link, $modifMessage);

//Ouvre la messagerie
header('Location: Messagerie_Bootstrap.php?idcontact='.$id_dest);
//header('Location: https://www.agro-bordeaux.fr/');
  exit();
?>