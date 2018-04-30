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
        <!--  <script>
        function myFunction() {
            document.getElementById("demo").innerHTML = "<input type='hidden' name='contact' value=$CONTACT>";
        }
        <input type='hidden' name='listeobs' value=$IDOBS>  
        </script>  -->
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
                    $connexion=mysqli_connect('localhost:3306', 'root', 'root','BDD'); // connexion au serveur MySQL
                    mysqli_set_charset($connexion,"utf8");                      // pour les caractères spéciaux
                    
                    //Rechercher dans les contacts
                    echo "<form method='GET' name='form1'>";
                        echo "<input type='text' name='contact' value=''>";
                        echo "<input type='submit' name='submitcontact' value='Rechercher'>";
                    echo "</form>";
                    
                    //On crée une scroll bar verticale pour afficher les contacts si jamais il y a trop de contacts
                    echo '<div style="height:100px; width:300; overflow-y:scroll; border:#0000FF 1px solid;">';
                    
                    //En cliquant sur un contact, on ouvre la conversation avec ce contact
                    
                    //Si rien n'est entré dans la barre de recherche
                    if (empty($_GET['contact']))
                    {
                        $query="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
                        messages_prives.id_mp, messages_prives.date_mp, messages_prives.lu, id_convers
                        FROM individus
                        JOIN messages_prives
                        ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_rece
                        WHERE (messages_prives.id_expe = 1 OR messages_prives.id_rece = 1) AND id_ind!=1
                        GROUP BY id_ind
                        ORDER BY messages_prives.date_mp DESC";
                        /*select individus.nom_ind, individus.prenom, conversations.id_convers, conversations.date_inter, messages_prives.lu 
                        from individus
                        join conversations on conversations.id_ind_a = individus.id_ind
                        join messages_prives on conversations.id_convers = messages_prives.id_convers
                        order by conversations.date_inter*/
                        //On sélectionne uniquement les personnes avec qui l'utilisateur est en contact
                        
                        $results=mysqli_query($connexion,$query);
                        echo "<ul>";
                        while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))   // on parcourt le résultat de la requête
                        {
                            echo "<form action 'page.php' method='GET' name='form2'>";
                            $NOM=$row['nom_ind'];                     // contient le nom du contact
                            $PRENOM=$row['prenom'];                   // contient le prenom du contact
                            $CONTACT=$row['id_ind'];                  // contient l'id du contact
                            //$lecture=$row['lu'];                      // si le dernier msg à été lu ou non
                            
                            //Si on a un msg non lu de la part de ce contact alors on l'affiche en gras
                            /*if ($lecture==0)
                            {
                                echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                                echo "<li><b><input type='submit' name='submitcontact' value='$PRENOM $NOM'></b></li>";
                                // pour chaque contact, on fait une nouvelle ligne dans la liste
                            }
                            else
                            {
                                echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                                echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";
                                // pour chaque contact, on fait une nouvelle ligne dans la liste
                            }*/
                            
                            echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                            echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";
                            echo "</form>";
                        }
                        echo "</ul>";
                    }
                    
                    //Si on a entré qqchose dans la barre de recherche
                    else
                    {
                        $RECHERCHE=$_GET['contact'];
                        $query1="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
                        messages_prives.id_mp, messages_prives.date_mp, messages_prives.lu, id_convers
                        FROM individus
                        JOIN messages_prives
                        ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_rece
                        WHERE (messages_prives.id_expe = 1 OR messages_prives.id_rece = 1) AND id_ind!=1 AND (nom_ind='$RECHERCHE' OR prenom='$RECHERCHE')
                        GROUP BY id_ind";
                        //On sélectionne uniquement parmis les contacts ceux dont le nom ou le prénom est égal à ce qui a été entré
                        $results1=mysqli_query($connexion,$query1);
                        //Si la requête ne retourne rien
                        if (mysqli_num_rows($results1)==0)
                        {
                            echo "Ce contact n'existe pas.";
                        }
                        //Si la requête retourne des contacts on les affiche
                        else
                        {
                            echo "<ul>";
                            while ($row=mysqli_fetch_array($results1,MYSQLI_BOTH))        // on parcourt le résultat de la requête
                                {
                                    echo "<form action 'page.php' method='GET' name='form3'>";
                                    $NOM=$row['nom_ind'];                     // contient le nom du contact
                                    $PRENOM=$row['prenom'];                   // contient le prenom du contact
                                    $CONTACT=$row['id_ind'];                  // contient l'id du contact
                                    //$lecture=$row['lu'];                      // si le dernier msg à été lu ou non
                                    
                                    //Si on a un msg non lu de la part de ce contact alors on l'affiche en gras
                                    /*if ($lecture==0)
                                    {
                                        echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                                        echo "<li><b><input type='submit' name='submitcontact' value='$PRENOM $NOM'></b></li>";
                                        // pour chaque contact, on fait une nouvelle ligne dans la liste
                                    }
                                    else
                                    {
                                        echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                                        echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";
                                        // pour chaque contact, on fait une nouvelle ligne dans la liste
                                    }*/
                                    
                                    echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                                    echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";
                                    echo "</form>";
                                }
                            echo "</ul>";
                        }
                    }
                    
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