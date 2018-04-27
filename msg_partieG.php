Diane
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
                    
                    //Rechercher dans les contacts
                    echo "<form method='GET' name='form1'>";
                        echo "<input type='text' name='contact' value=''>";
                        echo "<input type='submit' name='submitcontact' value='Rechercher'>";
                    echo "</form>";
                    
                    //On crée une scroll bar verticale pour afficher les contacts
                    echo '<div style="height:600px; overflow-y:scroll;">';
                    
                    //En cliquant sur un contact, on ouvre la conversation avec ce contact
                    echo "<form action '' method='GET' name='form2'>";
                    
                    //Si rien n'est entré dans la barre de recherche
                    if (empty($_GET['contact']))
                    {
                        $query="SELECT INDIV.nom_indiv, INDIV.prenom_indiv, MP.id_mp, MP.titre, MP.date, MP.lecture
                        FROM INDIV
                        INNER JOIN MP
                        ON INDIV.id_indiv=MP.id_exp OR INDIV.id_indiv=MP.id_desti
                        GROUP BY INDIV.id_indiv
                        ORDER BY MP.date";
                        /*select indiv.nom_indiv, indiv.prenom_indiv, conv.id_conv, mp.date, mp.lecture
                        from indiv
                        join conv on conv.id_indiv = indiv.id_indiv
                        join mp on*/
                        //On sélectionne uniquement les personnes avec qui l'utilisateur est en contact
                        
                        $results=mysqli_query($connexion,$query);
                        echo "<ul>";
                        while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))         // on parcourt le résultat de la requête
                        {
                            $NOM=$row['nom_indiv'];                                   // contient le nom du contact
                            $PRENOM=$row['prenom_indiv'];                             // contient le prenom du contact
                            //Si on a un msg non lu de la part de ce contact alors on l'affiche en gras
                            if (MP.lecture==0)
                            {
                                echo "<li><b><input type='submit' name='submitcontact' value='$PRENOM $NOM'></b></li>";       // pour chaque contact, on fait une nouvelle ligne dans la liste
                            }
                            else
                            {
                                echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";              // pour chaque contact, on fait une nouvelle ligne dans la liste
                            }
                        }
                        echo "</ul>";
                    }
                    
                    //Si on a entré qqchose dans la barre de recherche
                    else
                    {
                        $query1="SELECT INDIV.nom_indiv, INDIV.prenom_indiv, MP.id_mp, MP.titre, MP.date, MP.lecture
                        FROM INDIV
                        INNER JOIN MP
                        ON INDIV.id_indiv=MP.id_indiv
                        WHERE INDIV.nom_indiv=$_GET['contact'] OR INDIV.prenom_indiv=$_GET['contact']
                        ORDER BY MP.date";
                        //On sélectionne uniquement parmis les contacts ceux dont le nom ou le prénom est égal à ce qui a été entré
                        $results1=mysqli_query($connexion,$query1)
                        
                        //Si la requête ne retourne rien
                        if (mysqli_num_rows($results1)==0)
                        {
                            echo "Ce contact n'existe pas.";
                        }
                        //Si la requête retourne des contacts on les affiche
                        else
                        {
                            echo "<ul>";
                            while ($row=mysqli_fetch_array($results1,MYSQLI_BOTH))         // on parcourt le résultat de la requête
                            {
                                $NOM=$row['nom_indiv'];                                   // contient le nom du contact
                                $PRENOM=$row['prenom_indiv'];                             // contient le prenom du contact
                                
                                //Si on a un msg non lu de la part de ce contact alors on l'affiche en gras
                                if (MP.lecture==0)
                                {
                                    echo "<li><b><input type='submit' name='submitcontact' value='$PRENOM $NOM'></b></li>";   // pour chaque contact, on fait une nouvelle ligne dans la liste
                                }
                                else
                                {
                                    echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";          // pour chaque contact, on fait une nouvelle ligne dans la liste
                                }
                            }
                            echo "</ul>";
                        }
                    }
                    echo "</form>";
                    
                    echo '</div>';
                    
                    //À faire :
                    
                    //On affiche les contacts par ordre de derniers msg décroissant -> Nico
                    //Si on a un msg non lu de la part d'un contact, on affiche le contact différemment -> moi OK
                    //En cliquant sur un contact, on ouvre la conversation avec ce contact -> moi OK ?
                    //On affiche différemment le contact à qui on est en train d'écrire
                ?>
	</div>

	<!-- DIV Pied de page -->		
	<?php include("DIVPied.html"); ?>	


</div>

</body>
</html>