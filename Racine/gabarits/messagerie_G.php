<!-- Diane & Nico -->
<?php
Session_start();
?>
<?php
    //$id_ind_co=$_SESSION['id_ind_co'];        //récupère l'identifiant de l'utilisateur connecté
    $id_ind_co=1;
    $_SESSION['id_ind_co']=$id_ind_co;
    
    $connexion=mysqli_connect('localhost', 'root', '','bdd_racine_beta_27.04'); // connexion au serveur MySQL
    mysqli_set_charset($connexion,"utf8");                      // pour les caractères spéciaux
    
    //Si rien n'est entré dans la barre de recherche
    if (empty($_GET['contact']))
    {
        //On sélectionne uniquement les personnes avec qui l'utilisateur connecté est en contact
        $query="SELECT prenom, nom_ind, lu, id_compte FROM individus i
        JOIN (SELECT CASE WHEN id_dest=$id_ind_co THEN id_expe ELSE id_dest END AS id_compte, MAX(date_mp) AS inter, lu
        FROM messages_prives WHERE (id_dest=$id_ind_co OR id_expe=$id_ind_co) GROUP BY id_compte) r
        ON i.id_ind=r.id_compte ORDER BY inter DESC";
        
        $results=mysqli_query($connexion,$query);
        
        // début de la liste des contacts
        echo "<ul>";
        // on parcourt le résultat de la requête
        while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))
        {
            echo "<form action='' method='GET' name='form2'>";
                $NOM=$row['nom_ind'];                     // contient le nom du contact
                $PRENOM=$row['prenom'];                   // contient le prenom du contact
                $CONTACT=$row['id_compte'];               // contient l'id du contact
                $lecture=$row['lu'];                      // si le dernier msg à été lu ou non
                
                // on transmet l'id du contact sélectionné en caché
                echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'>";
                
                //Si on a un msg non lu de la part de ce contact alors on met une image à côté du contact ?
                /*if ($lecture==0)
                {
                    echo "<img src='image.jpg' height=15px>";
                }*/
                echo '</li>';
                
            echo "</form>";
        }
        echo "</ul>";
    }
    
    //Si on a entré qqchose dans la barre de recherche
    else
    {
        // on récupère l'entrée de la recherche
        $RECHERCHE=$_GET['contact'];
        
        //On sélectionne uniquement, parmis les contacts de l'utilisateur connecté, ceux dont le nom ou le prénom est égal à ce qui a été entré
        $query1="SELECT prenom, nom_ind, lu, id_compte FROM individus i
        JOIN (SELECT CASE WHEN id_dest=$id_ind_co THEN id_expe ELSE id_dest END AS id_compte, MAX(date_mp) AS inter, lu
        FROM messages_prives WHERE (id_dest=$id_ind_co OR id_expe=$id_ind_co) GROUP BY id_compte) r
        ON i.id_ind=r.id_compte
        WHERE (nom_ind='$RECHERCHE' OR prenom='$RECHERCHE')
        ORDER BY inter DESC";
        
        $results1=mysqli_query($connexion,$query1);
        
        //Si la requête ne retourne rien
        if (mysqli_num_rows($results1)==0)
        {
            echo "Ce contact n'existe pas.";
        }
        
        //Si la requête retourne des contacts, on les affiche
        else
        {
            // début de la liste des contacts
            echo "<ul>";
            // on parcourt le résultat de la requête
            while ($row=mysqli_fetch_array($results1,MYSQLI_BOTH))
                {
                    echo "<form action='' method='GET' name='form3'>";
                        $NOM=$row['nom_ind'];                     // contient le nom du contact
                        $PRENOM=$row['prenom'];                   // contient le prenom du contact
                        $CONTACT=$row['id_ind'];                  // contient l'id du contact
                        $lecture=$row['lu'];                      // si le dernier msg à été lu ou non
                        
                        echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                        echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";
                        
                        //Si on a un msg non lu de la part de ce contact alors on met une image ?
                        /*if ($lecture==0)
                        {
                            echo "<img src='image.jpg' height=50px>";
                        }*/
                    echo "</form>";
                }
            echo "</ul>";
        }
    }
?>