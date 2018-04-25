<html>
    <body>
        <div>
            <!-- Début du php -->
            <?php
            session_start();
            $titre="Messagerie Privée";
            $balises = true;
            include("identifiants.php");
            include("debut.php");
            include("functions.php");
            //include("includes/bbcode.php");
            include("menu.php");
            $action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';

            switch($action) //On switch sur $action
            {
                case "consulter": //Si on veut lire un message
             
                    
                    echo'<p><i>Vous êtes icitron</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagerieprivee.php">Messagerie privée</a> --> Consulter un message</p>';
                    $id_mess = (int) $_GET['id']; //On récupère la valeur de l'id
                    echo '<h1>Consulter un message</h1><br /><br />';

                    //La requête nous permet d'obtenir les infos sur ce message :
                    $query = $db->prepare('SELECT  mp_expediteur, mp_receveur, mp_titre,               
                    mp_time, mp_text, mp_lu, membre_id, membre_pseudo, membre_avatar,
                    membre_localisation, membre_inscrit, membre_post, membre_signature
                    FROM forum_mp
                    LEFT JOIN forum_membres ON membre_id = mp_expediteur
                    WHERE mp_id = :id');
                    $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
                    $query->execute();
                    $data=$query->fetch();

                    // Attention ! Seul le receveur du mp peut le lire !
                    if ($id == $data['mp_receveur']) erreur(ERR_WRONG_USER);
                       
                    //bouton de réponse
                    echo'<p><a href="./messagerieprivee.php?action=repondre&amp;dest='.$data['mp_expediteur'].'">
                    <img src="./images/repondre.gif" alt="Répondre" 
                    title="Répondre à ce message" /></a></p>';
                    
                    // Affichage du message
                    
                    echo'<table>';
                    echo'<tr>';
                    echo'<th class="vt_auteur"><strong>Auteur</strong></th>';          
                    echo'<th class="vt_mess"><strong>Message</strong></th>';     
                    echo'</tr>';
                    echo'<tr>';
                    echo'<td>';
                    echo'<strong>
                    <a href="./voirprofil.php?m='.$data['membre_id'].'&amp;action=consulter">
                    '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</a></strong></td>
                    <td>Posté à '.date('H\hi \l\e d M Y',$data['mp_time']).'</td>';
                    echo "</tr><tr><td>";
                        
                    //Ici des infos sur le membre qui a envoyé le mp
                    echo'<p><img src="./images/avatars/'.$data['membre_avatar'].'" alt="" />
                    <br />Membre inscrit le '.date('d/m/Y',$data['membre_inscrit']).'
                    <br />Messages : '.$data['membre_post'].'
                    <br />Localisation : '.stripslashes(htmlspecialchars($data['membre_localisation'])).'</p>
                    </td><td>';
                        
                    echo code(nl2br(stripslashes(htmlspecialchars($data['mp_text'])))).'
                    <hr />'.code(nl2br(stripslashes(htmlspecialchars($data['membre_signature'])))).'
                    </td></tr></table>';
                        if ($data['mp_lu'] == 0) //Si le message n'a jamais été lu
                    {
                        $query->CloseCursor();
                        $query=$db->prepare('UPDATE forum_mp 
                        SET mp_lu = :lu
                        WHERE mp_id= :id');
                        $query->bindValue(':id',$id_mess, PDO::PARAM_INT);
                        $query->bindValue(':lu','1', PDO::PARAM_STR);
                        $query->execute();
                        $query->CloseCursor();
                    }
                        
                break; //La fin !
                
                case "nouveau": //Nouveau mp
                       
                   echo'<p><i>Vous êtes iciboulette</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagerieprivee.php">Messagerie privée</a> --> Ecrire un message</p>';
                   echo '<h1>Nouveau message privé</h1><br /><br />';
                   echo'<form method="post" action="postok.php?action=nouveaump" name="formulaire">';
                   echo'<p>';
                   echo'<label for="to">Envoyer à : </label>';
                   echo'<input type="text" size="30" id="to" name="to" />';
                   echo'<br />';
                   echo'<label for="titre">Titre : </label>';
                   echo'<input type="text" size="80" id="titre" name="titre" />';
                   echo'<br /><br />';
                   echo'<br /><br />';

                   echo'<textarea cols="80" rows="8" id="message" name="message"></textarea>';
                   echo'<br />';
                   echo'<input type="submit" name="submit" value="Envoyer" />';
                   echo'<input type="reset" name="Effacer" value="Effacer" /></p>';
                   echo'</form>';

                break;
                
                case "repondre": //On veut répondre
                   echo'<p><i>Vous êtes icitrouille</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagerieprivee.php">Messagerie privée</a> --> Ecrire un message</p>';
                   echo '<h1>Répondre à un message privé</h1><br /><br />';

                   $dest = (int) $_GET['dest'];
                   echo'<form method="post" action="postok.php?action=repondremp&amp;dest=<?php echo $dest ?>" name="formulaire">';
                   echo'<p>';
                   echo'<label for="titre">Titre : </label><input type="text" size="80" id="titre" name="titre" />';
                   echo'<br /><br />';
                   echo'<textarea cols="80" rows="8" id="message" name="message"></textarea>';
                   echo'<br />';
                   echo'<input type="submit" name="submit" value="Envoyer" />';
                   echo'<input type="reset" name="Effacer" value="Effacer"/>';
                   echo'</p></form>';
                
                break;

                
                //Si rien n'est demandé ou s'il y a une erreur dans l'url 
                //On affiche la boite de mp.
                default;
                    
                    echo'<p><i>Vous êtes icinéma</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagerieprivee.php">Messagerie privée</a>';
                    echo '<h1>Messagerie Privée</h1><br /><br />';

                    /*$query=$db->prepare('SELECT mp_lu, mp_id, mp_expediteur, mp_titre, mp_time, membre_id, membre_pseudo
                    FROM mp
                    LEFT JOIN forum_membres ON forum_mp.mp_expediteur = forum_membres.membre_id
                    WHERE mp_receveur = :id ORDER BY mp_id DESC');
                    $query->bindValue(':id',$id,PDO::PARAM_INT);
                    $query->execute();*/
                    
                    $connexion=mysqli_connect('localhost:3306', 'root', 'root','Fofo');
                    $query0="SELECT * FROM mp WHERE mp_receveur = '2' ORDER BY mp_id DESC";
                    $results0=mysqli_query($connexion,$query0);
                    $row=mysqli_fetch_array($results0,MYSQLI_BOTH);
                    echo "$row[0]";
                    echo'<p><a href="./messagerieprivee.php?action=nouveau">
                    <img src="./images/nouveau.gif" alt="Nouveau" title="Nouveau message" />
                    </a></p>';
                    if (rowCount($query0)>0)
                    {
                        
                        echo'<table>';
                        echo'<tr>';
                        echo'<th></th>';
                        echo'<th class="mp_titre"><strong>Titre</strong></th>';
                        echo'<th class="mp_expediteur"><strong>Expéditeur</strong></th>';
                        echo'<th class="mp_time"><strong>Date</strong></th>';
                        echo'<th><strong>Action</strong></th>';
                        echo'</tr>';

                        
                        //On boucle et on remplit le tableau
                        while ($data = $query0->fetch())
                        {
                            echo'<tr>';
                            //Mp jamais lu, on affiche l'icone en question
                            if($data['mp_lu'] == 0)
                            {
                            echo'<td><img src="./images/message_non_lu.gif" alt="Non lu" /></td>';
                            }
                            else //sinon une autre icone
                            {
                            echo'<td><img src="./images/message.gif" alt="Déja lu" /></td>';
                            }
                            echo'<td id="mp_titre">
                            <a href="./messagerieprivee.php?action=consulter&amp;id='.$data['mp_id'].'">
                            '.stripslashes(htmlspecialchars($data['mp_titre'])).'</a></td>
                            <td id="mp_expediteur">
                            <a href="./voirprofil.php?action=consulter&amp;m='.$data['membre_id'].'">
                            '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</a></td>
                            <td id="mp_time">'.date('H\hi \l\e d M Y',$data['mp_time']).'</td>
                            <td>
                            <a href="./messagerieprivee.php?action=supprimer&amp;id='.$data['mp_id'].'&amp;sur=0">supprimer</a></td></tr>';
                        } //Fin de la boucle
                        $query->CloseCursor();
                        echo '</table>';

                    } //Fin du if
                    else
                    {
                        echo'<p>Vous n avez aucun message privé pour l instant, cliquez
                        <a href="./index.php">ici</a> pour revenir à la page d index</p>';
                    }
            } //Fin du switch
            ?>
            <!-- Fin du php -->
        </div>
    </body>
</html>