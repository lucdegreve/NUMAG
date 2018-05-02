<!-- Diane -->
<?php
Session_start();
?>
<?php
    //$id_ind_co=$_SESSION['id_ind_co'];        //récupère l'identifiant de l'utilisateur connecté
    $id_ind_co=3;
    $_SESSION['id_ind_co']=$id_ind_co;
    
    $connexion=mysqli_connect('localhost:3306', 'root', 'root','BDD'); // connexion au serveur MySQL
    mysqli_set_charset($connexion,"utf8");                      // pour les caractères spéciaux
    
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
            echo "<form action='' method='GET' name='form2'>";
            $NOM=$row['nom_ind'];                     // contient le nom du contact
            $PRENOM=$row['prenom'];                   // contient le prenom du contact
            $CONTACT=$row['id_ind'];                  // contient l'id du contact
            $lecture=$row['lu'];                      // si le dernier msg à été lu ou non
            
            echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
            echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";
            
            //Si on a un msg non lu de la part de ce contact alors on met une image
            if ($lecture==0)
            {
                echo "<img src='image.jpg' height=50px>";
            }
            
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
                    echo "<form action='' method='GET' name='form3'>";
                    $NOM=$row['nom_ind'];                     // contient le nom du contact
                    $PRENOM=$row['prenom'];                   // contient le prenom du contact
                    $CONTACT=$row['id_ind'];                  // contient l'id du contact
                    $lecture=$row['lu'];                      // si le dernier msg à été lu ou non
                    
                    echo "<input type='hidden' name='idcontact' value='$CONTACT'>";
                    echo "<li><input type='submit' name='submitcontact' value='$PRENOM $NOM'></li>";
                    
                    //Si on a un msg non lu de la part de ce contact alors on met une image
                    if ($lecture==0)
                    {
                        echo "<img src='image.jpg' height=50px>";
                    }
                    
                    echo "</form>";
                }
            echo "</ul>";
        }
    }
    
    //À faire :
    
    //On affiche les contacts par ordre de derniers msg décroissant -> Nico
    //Si on a un msg non lu de la part d'un contact, on affiche le contact différemment -> moi OK
    //En cliquant sur un contact, on ouvre la conversation avec ce contact -> moi OK
    //On affiche différemment le contact à qui on est en train d'écrire
    
    
?>