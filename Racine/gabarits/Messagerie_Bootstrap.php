<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Messagerie</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include "Entete-VALIDE.html" ?>
    <?php
    Session_start();
    ?>
<br>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4">
      <div class="jumbotron HauteurMax">

        <?php
            //$id_ind_co=$_SESSION['id_ind_co'];        //récupère l'identifiant de l'utilisateur connecté
            $id_ind_co=1;
            $_SESSION['id_ind_co']=$id_ind_co;

            $link=mysqli_connect('localhost', 'root', '','bddtest');
            //include "localhost/NUMAG/Connexion_bdd.php";

            //Si rien n'est entré dans la barre de recherche
            if (empty($_GET['contact']))
            {
                //On sélectionne uniquement les personnes avec qui l'utilisateur connecté est en contact
                $query="SELECT prenom, nom_ind, lu, id_compte FROM individus i
                JOIN (SELECT CASE WHEN id_dest=$id_ind_co THEN id_expe ELSE id_dest END AS id_compte, MAX(date_mp) AS inter, lu
                FROM messages_prives WHERE (id_dest=$id_ind_co OR id_expe=$id_ind_co) GROUP BY id_compte) r
                ON i.id_ind=r.id_compte ORDER BY inter DESC";

                $results=mysqli_query($link,$query);

                // début de la liste des contacts

                // on parcourt le résultat de la requête
                    echo "<form action='' method='GET' name='form2'>";
                      echo "<ul class='liste-group-flush'>";
                        while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))
                        {
                          $NOM=$row['nom_ind'];                     // contient le nom du contact
                          $PRENOM=$row['prenom'];                   // contient le prenom du contact
                          $CONTACT=$row['id_compte'];               // contient l'id du contact
                          $lecture=$row['lu'];                      // si le dernier msg à été lu ou non
                          // on transmet l'id du contact sélectionné en caché

                          echo"<input type='hidden' name='idcontact' value='<?php $CONTACT ?>'>";
                          echo "<input class='list-group-item list-group-item-action' type='submit' name='submitcontact' value='".$PRENOM." ".$NOM."'>
                          </input>";

                          //Si on a un msg non lu de la part de ce contact alors on met une image à côté du contact ?
                          /*if ($lecture==0)
                          {
                              echo "<img src='image.jpg' height=15px>";
                          }*/
                          }
                      echo "</ul>";
                    echo "</form>";
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

                $results1=mysqli_query($link,$query1);

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
            //Recherche
            ?>
            <br>
            <form method='GET' name='form1'>
              <div class='form-group'>
                <input type='email' name='contact' value=''>
                <input type='submit' name='submitcontact' value='Rechercher'>
              </div>
            </form>

      </div>
    </div>
    <div class="col-lg-8">
      <div class="jumbotron HauteurMax">
        <?php
        $id_ind_co=$_SESSION['id_ind_co'];
        if (@isset($_GET['idcontact'])){
        $contact=$_GET['idcontact'];
        }
        $link=mysqli_connect('localhost', 'root', '','bddtest');
        //include "localhost/NUMAG/Connexion_bdd.php";

        if (@isset($_GET['bt']))
        {
        $bt=$_GET['bt'];


            $contact=$_GET['idcontact'];
            $id_ind_co=$_SESSION['id_ind_co'];
            $message = $_GET['message'];
            $query2="INSERT INTO messages_prives (id_dest, id_expe, texte, date_mp, lu) VALUES ($contact, $id_ind_co, '$message', NOW(), 0)";
            $results2=mysqli_query($link,$query2);
        }

        if (@isset($contact)){
        //On sélectionne les messages échangés entre l'utilisateur connecté et celui qu'il a sélectionné dans la partieG
        $query="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
        messages_prives.id_mp, DATE_FORMAT(messages_prives.date_mp, '%d/%m/%y %h:%i') as date, messages_prives.lu, messages_prives.texte, id_dest
        FROM individus
        JOIN messages_prives
        ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_dest
        WHERE (messages_prives.id_expe = $id_ind_co OR messages_prives.id_dest = $id_ind_co)
        AND (messages_prives.id_expe = $contact OR messages_prives.id_dest = $contact)
        GROUP BY id_mp
        ORDER BY messages_prives.date_mp";
        $results=mysqli_query($link,$query);

        $query3="SELECT prenom, nom_ind FROM individus WHERE id_ind=$contact";
        $results3=mysqli_query($link,$query3);
        $tab=mysqli_fetch_all($results3);
        }

        //Si un contact a été selectionné on affiche la conversation
        if (!empty($contact))
        {
            //1ère colonne : msg du contact, 2ème colonne : msg de l'utilisateur connecté
            echo '<table><tr><th>'.$tab[0][0].' '.$tab[0][1].'</th><th>Vous</th></tr>';
            //on parcourt la requête des msg
            while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))
            {
                $IDMP=$row['id_mp'];
                $TEXTE=$row['texte'];
                $DATE=$row['date'];
                $dest=$row['id_dest'];

                $query1="UPDATE messages_prives SET lu = '1' WHERE id_mp=$IDMP";
                $results1=mysqli_query($link,$query1);

                if ($dest==$id_ind_co)
                {
                    echo "<tr><td width='300';>$TEXTE<br/><i>$DATE</i></td><td width='300';></td></tr>";
                }
                else
                {
                    echo "<tr><td width='300';></td><td width='300';>$TEXTE<br/><i>$DATE</i></td></tr>";
                }
            }
            echo '</table>';
            echo '<form method="GET">';
                //En cliquant, le message 'Tapez votre message ici' par défault disparait ; on entre le msg
                ?>
                <input type="text" onfocus="this.value=''" value="Tapez votre message ici" size="80" name="message">
                <?php
                //On transmet en caché l'id du destinataire et de l'utilisateur connecté
                echo "<input type='hidden' name='id_ind_co' value='$id_ind_co'>";
                echo "<input type='hidden' name='idcontact' value='$contact'>";
                echo '<input type="submit" value="Envoyer" name="bt">';
            echo '</form>';
        }
        else
        {
            echo "Aucun contact sélectionné.";
        }
        ?>
      </div>
    </div>

  </div>

</div>








    <?php include "Pied-VALIDE.html" ?>
  </body>
</html>
