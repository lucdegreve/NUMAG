<!-- Diane -->
<?php
Session_start();
?>

<div id="contenu">
        <i><b>Messages</b></i>
        <br/>
        <?php
            //$id_ind_co=$SESSION_['id_ind_co'];        //récupère l'identifiant de l'utilisateur connecté
            $id_ind_co=1;
            
            $connexion=mysqli_connect('localhost', 'root', '','bdd_racine_beta_27.04'); // connexion au serveur MySQL
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
                /*$query="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
                messages_prives.id_mp, messages_prives.date_mp, messages_prives.lu
                FROM individus
                JOIN messages_prives
                ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_rece
                WHERE (messages_prives.id_expe = 1 OR messages_prives.id_rece = 1) AND id_ind!=1
                GROUP BY id_ind
                ORDER BY messages_prives.date_mp DESC";*/
                $query="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
                messages_prives.id_mp, messages_prives.date_mp, messages_prives.lu, id_convers
                FROM individus
                JOIN messages_prives
                ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_rece
                WHERE (messages_prives.id_expe = $id_ind_co OR messages_prives.id_rece = $id_ind_co) AND id_ind!=$id_ind_co
                GROUP BY id_ind
                ORDER BY messages_prives.date_mp DESC";
                //On sélectionne uniquement les personnes avec qui l'utilisateur connecté est en contact
                
                $results=mysqli_query($connexion,$query);
                echo "<ul>";
                while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))   // on parcourt le résultat de la requête
                {
                    echo "<form action='page.php' method='GET' name='form2'>";  //changer page.php avec la page affichant les messages/conversation
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
                /*$query1="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
                messages_prives.id_mp, messages_prives.date_mp, messages_prives.lu
                FROM individus
                JOIN messages_prives
                ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_rece
                WHERE (messages_prives.id_expe = 1 OR messages_prives.id_rece = 1) AND id_ind!=1 AND (nom_ind='$RECHERCHE' OR prenom='$RECHERCHE')
                GROUP BY id_ind";*/
                $query1="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
                messages_prives.id_mp, messages_prives.date_mp, messages_prives.lu, id_convers
                FROM individus
                JOIN messages_prives
                ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_rece
                WHERE (messages_prives.id_expe = $id_ind_co OR messages_prives.id_rece = $id_ind_co) AND id_ind!=$id_ind_co AND (nom_ind='$RECHERCHE' OR prenom='$RECHERCHE')
                GROUP BY id_ind";
                //On sélectionne uniquement, parmis les contacts de l'utilisateur connecté, ceux dont le nom ou le prénom est égal à ce qui a été entré
                
                $results1=mysqli_query($connexion,$query1);
                
                //Si la requête ne retourne rien
                if (mysqli_num_rows($results1)==0)
                {
                    echo "Ce contact n'existe pas.";
                }
                
                //Si la requête retourne des contacts, on les affiche
                else
                {
                    echo "<ul>";
                    while ($row=mysqli_fetch_array($results1,MYSQLI_BOTH))        // on parcourt le résultat de la requête
                        {
                            echo "<form action='page.php' method='GET' name='form3'>";  //changer page.php avec la page affichant les messages/conversation
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
            //En cliquant sur un contact, on ouvre la conversation avec ce contact -> moi OK
            //On affiche différemment le contact à qui on est en train d'écrire
        ?>
</div>