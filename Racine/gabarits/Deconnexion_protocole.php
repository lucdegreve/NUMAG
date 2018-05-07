<!-- Cette page met à jour les alertes projet
Code : Luc Degreve

<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
$id_ind_co=$_SESSION["id_ind_co"];
session_destroy();
unset($id_ind_co);


//Ouvre la page
header('Location: Index.php');
  exit();
?>