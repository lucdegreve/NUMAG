<?php
Session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Apropos.php -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		Oiseaux - Projet Techno. Web
	</title>
	<!-- Déclaration de la feuille de style -->
	<link rel="stylesheet" type="text/css" href="styles/maFeuilleDeStyle.css" media="all" />
</head>
<body>

<!-- Section Global -->
<div id="global">
	
	<!-- DIV Entête -->
	<?php include("DIVEntete.html"); ?>
	<!-- DIV Navigation (Menus) -->
	<?php include("DIVNavigation.html"); ?>
        <!-- Fonctions utilisées -->
	<?php include ("Fonctions.php"); ?>

	<!-- Section Contenu : contenu central de la page -->
	<div id="contenu">
                <i><b>Messages</b></i>
                <br/>
                <?php
                    $connexion=mysqli_connect('localhost', 'root', '','oiseaudb2018'); // connexion au serveur MySQL
                    mysqli_set_charset($connexion,"utf8");                      // pour les caractères spéciaux
                    $query="SELECT INDIV.nom_indiv, INDIV.prenom_indiv, MP.id_mp, MP.titre, MP.date, MP.lecture
                    FROM INDIV
                    INNER JOIN MP
                    ON INDIV.id_indiv=MP.id_indiv
                    GROUP BY INDIV.nom_indiv
                    ORDER BY MP.date";
                    $results=mysqli_query($connexion,$query);
                    echo "<ul>";
                    while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))         // on parcourt le résultat de la requête
                    {
                        $NOM=$row['nom_indiv'];                              // contient le nom de l'observateur
                        $PRENOM=$row['prenom_indiv'];                             // contient l'identifiant de l'observateur
                        echo "<li>$PRENOM</li>";              // pour chaque observateur de la requête, on crée une nouvelle ligne dans la LD
                    }
                    echo "</ul>";

                    if (empty($_GET['listeobs']))                               // Si l'observateur n'est pas encore choisi :
                    {
                        echo "<form action='' method='GET' name='form1'>";      // création du formulaire observateur renvoyant la même page
                            $query0="SELECT * FROM observateurs INNER JOIN observations ON observateurs.id_observateur=observations.id_observateur GROUP BY observateurs.id_observateur ORDER BY nom_observateur";
                                                                                // on crée une requête sélectionnant uniquement les observateurs ayant réalisé des observations
                            $results0=mysqli_query($connexion,$query0);
                            echo "Sélectionner un observateur : ";
                            echo "<select name = 'listeobs'>";                  // création de la LD des observateurs
                                while ($row0=mysqli_fetch_array($results0,MYSQLI_BOTH))         // on parcourt le résultat de la requête
                                {
                                    $OBS=$row0['nom_observateur'];                              // contient le nom de l'observateur
                                    $IDOBS=$row0['id_observateur'];                             // contient l'identifiant de l'observateur
                                    echo "<option value = '$IDOBS'>$OBS</option>";              // pour chaque observateur de la requête, on crée une nouvelle ligne dans la LD
                                }
                            echo "</select>";
                            echo "<input type='submit' name='submitobs' value='Afficher'>";     // on renvoi l'identifiant de l'observateur sélectionné
                        echo "</form>";
                        echo "<br/>";
                    }
                ?>
	</div>

	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	


</div>

</body>
</html>