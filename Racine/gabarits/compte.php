<!--Page utilisateur-->
<html>
<head>
	<?php
	include "Entete-VALIDE.php";
	include'Connexion_bdd.php';
	?>
	<meta charset="utf-8">
	<title>Mon compte</title>
</head>
<body>
<?php
$query="SELECT civilite, prenom, UPPER(nom_ind), type_prof, DATE_FORMAT(naissance, '%d/%m/%Y'), ad_ind, cp, UPPER(nom_commune), tel, mail FROM individus JOIN communes ON individus.id_commune=communes.id_commune JOIN profils ON individus.id_prof=profils.id_prof WHERE id_ind=$id_ind_co";
$result=mysqli_query($link,$query);
$tab=mysqli_fetch_all($result);
echo $tab[0][0].". ".$tab[0][1]." ".$tab[0][2]." <br/>";
echo $tab[0][3]."<br/><br/>";
echo "Date de naissance <br/>".$tab[0][4]." <br/><br/>";
echo "Adresse <br/>".$tab[0][5]."<br/>".$tab[0][6]." ".$tab[0][7]." <br/><br/>";
echo "Téléphone <br/>".$tab[0][8]." <br/><br/>";
echo "Mail <br/>".$tab[0][9];
include("Pied-VALIDE.html");
?>
</body>
</html>