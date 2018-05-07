<!DOCTYPE html>
<!-- Code Diane, bootstrap Mayeul -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Messagerie</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include "Entete-VALIDE.php" ?>
    <?php
    Session_start();
    ?>
<br>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-5">
      <div class="jumbotron HauteurMax">
        <h2>Contact</h2>
        <hr class="my-4">
        <?php
            $id_ind_co=$_SESSION['id_ind_co'];

            Include("connexion_bdd.php");

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
                    while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))
                    {
                      echo "<form action='' method='GET' name='form2'>";
                        echo "<ul class='liste-group-flush'>";

                          $NOM=$row['nom_ind'];                     // contient le nom du contact
                          $PRENOM=$row['prenom'];                   // contient le prenom du contact
                          $CONTACT=$row['id_compte'];               // contient l'id du contact
                          $lecture=$row['lu'];                      // si le dernier msg à été lu ou non
                          // on transmet l'id du contact sélectionné en caché
                          ?>
                          <input type='hidden' name='idcontact' value='<?php echo $CONTACT; ?>'>
                          <input class='list-group-item list-group-item-action' type='submit' name='submitcontact' value='<?php echo $PRENOM." ".$NOM; ?>'>
                          <?php
                          //Si on a un msg non lu de la part de ce contact alors on met une image à côté du contact ?
                          /*if ($lecture==0)
                          {
                              echo "<img src='image.jpg' height=15px>";
                          }*/

                        echo "</ul>";
                      echo "</form>";
                    }
            }

            //Si on a entré qqchose dans la barre de recherche
            else
            {
                // on récupère l'entrée de la recherche
                $RECHERCHE=$_GET['contact'];

                //On sélectionne uniquement, parmis les contacts de l'utilisateur connecté, ceux dont le nom ou le prénom est égal à ce qui a été entré
                $query1="SELECT prenom, nom_ind, lu, id_compte, id_ind FROM individus i
                JOIN (SELECT CASE WHEN id_dest=$id_ind_co THEN id_expe ELSE id_dest END AS id_compte, MAX(date_mp) AS inter, lu
                FROM messages_prives WHERE (id_dest=$id_ind_co OR id_expe=$id_ind_co) GROUP BY id_compte) r
                ON i.id_ind=r.id_compte
                WHERE (CONCAT(prenom, ' ', nom) LIKE '%$RECHERCHE%' OR CONCAT(nom, ' ', prenom) LIKE '%$RECHERCHE%')
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
                    echo "<ul class='liste-group'>";
                    // on parcourt le résultat de la requête
                    while ($row=mysqli_fetch_array($results1,MYSQLI_BOTH))
                        {
                          $NOM=$row['nom_ind'];                     // contient le nom du contact
                          $PRENOM=$row['prenom'];                   // contient le prenom du contact
                          $CONTACT=$row['id_ind'];                  // contient l'id du contact
                          $lecture=$row['lu'];                      // si le dernier msg à été lu ou non
                            echo "<form action='' method='GET' name='form3'>";
                                echo "<input type='hidden' name='idcontact' value=".$CONTACT.">";
                                echo "<li><input type='submit' class='list-group-item list-group-item-action' name='submitcontact' value='$PRENOM $NOM'><span class='badge badge-light'>Nouveau message</span></li>";

                                //Si on a un msg non lu de la part de ce contact alors on met une image ?
                                if ($lecture==0)
                                {
                                    echo "<span class='badge badge-light'>Nouveau message</span>";
                                }
                            echo "</form>";
                        }
                    echo "</ul>";
                }
            }
            //Recherche
            ?>
            <br>
            <hr class="my-4">
            <form method='GET' name='form1'>
              <div class='form-group'>
                <div class="row">
                  <div class="col-lg-9">
                    <?php  echo "<input type='hidden' name='contact' value=".$CONTACT.">"; ?>
                    <input type='text' class="form-control" name='contact' value=''>
                  </div>
                  <div class="col-lg-3">
                    <input type='submit' name='submitcontact' class="btn btn-info center-block" value='Rechercher'>
                  </div>
                </div>
              </div>
            </form>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="jumbotron HauteurMax">
        <?php
        $id_ind_co=$_SESSION['id_ind_co'];
        if (@isset($_GET['idcontact'])){
          $contact=$_GET['idcontact'];
        }

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
          messages_prives.id_mp, DATE_FORMAT(messages_prives.date_mp, '%d/%m/%y %H:%i') as date, messages_prives.lu, messages_prives.texte, id_dest
          FROM individus
          JOIN messages_prives
          ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_dest
          WHERE (messages_prives.id_expe = $id_ind_co OR messages_prives.id_dest = $id_ind_co)
          AND (messages_prives.id_expe = $contact OR messages_prives.id_dest = $contact)
          GROUP BY id_mp
          ORDER BY messages_prives.date_mp";
          $results=mysqli_query($link,$query);
          $query3="SELECT prenom, nom_ind FROM individus WHERE id_ind=".$contact;
          $results3=mysqli_query($link,$query3);
          $tab=mysqli_fetch_all($results3);
        }

        //Si un contact a été selectionné on affiche la conversation
        ?>
        <div class='container-fluid'><?php
          if (!empty($contact))
          {
          ?>
            <div class="row">
              <?php
              //1ère colonne : msg du contact, 2ème colonne : msg de l'utilisateur connecté
              echo '<h3>'.$tab[0][0].' '.$tab[0][1].', Vous</h3>';
              //on parcourt la requête des msg
              ?>
            </div>
            <hr class="my-4">
            <div class="row">
              <?php
              while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))
              {
                $IDMP=$row['id_mp'];
                $TEXTE=$row['texte'];
                $DATE=$row['date'];
                $dest=$row['id_dest'];
                if ($dest==$id_ind_co){ ?>
                  <div class="col-lg-6">
                    <div class="card" style="width: 18rem;">
                      <div class="card-header">
                        <?php echo"<h6 class='card-subtitle mb-2 text-muted min-size'><i>".$tab[0][0]." ".$tab[0][1]." - ".$DATE."</i></h6>";
                            $query1="UPDATE messages_prives SET lu = '1' WHERE id_mp=$IDMP";
                            $results1=mysqli_query($link,$query1);
                        ?>
                      </div>
                      <div class="card-body">
                        <p class="card-text"><?php echo"$TEXTE"; ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                  </div>
                <?php
                }
                else { ?>
                  <div class="col-lg-6">
                  </div>
                  <div class="col-lg-6">
                      <div class="card" style="width: 18rem">
                        <div class="card-header">
                          <?php echo"<h6 class='card-subtitle mb-2 text-muted min-size'><i>Vous - ".$DATE."</i></h6>"; ?>
                        </div>
                        <div class="card-body">
                          <p class="card-text"><?php echo"$TEXTE"; ?></p>
                        </div>
                      </div>
                    </div>
                <?php
                } ?>
              <?php
              } ?>
            </div>
          </div>
          <br>
        <div class="container-fluid">
          <br>
          <hr class="my-4">
          <form method="GET">
            <div class='form-group'>
              <div class="row">
                <div class="col-lg-9">
                  <!-- En cliquant, le message 'Tapez votre message ici' par défault disparait ; on entre le msg -->
                  <input  type='text' class="form-control" onfocus="this.value=''" value="Tapez votre message ici" size="80" name="message">
                </div>
                <div class="col-lg-3">
                  <!-- On transmet en caché l'id du destinataire et de l'utilisateur connecté -->
                  <input type='hidden' name='id_ind_co' value='$id_ind_co'>
                  <input type='hidden' name='idcontact' value='<?php echo $contact; ?>'>
                  <input type="submit" value="Envoyer" name="bt" class="btn btn-info center-block">
                </div>
              </div>
            </div>
          </form>
        </div>
        <?php
        }
        else {
          ?>
          <div class="container">
            <div class="alert alert-info center-block center-vertical" role="alert">
              <h4>Aucun contact sélectionné</h4>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>


    <?php include "Pied-VALIDE.html" ?>
  </body>
</html>
