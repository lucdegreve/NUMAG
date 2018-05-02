<!-- Diane & Nico -->
<?php
Session_start();
?>
<?php
$id_ind_co=$_SESSION['id_ind_co'];
$nomcontact=$_GET['submitcontact'];
$contact=$_GET['idcontact'];

INCLUDE"connexion_bdd.php"

$bt=$_GET['bt'];
if (@isset($bt))
{
    $contact=$_GET['idcontact'];
    $id_ind_co=$_SESSION['id_ind_co'];
    $message = $_GET['message'];
    $query2="INSERT INTO messages_prives (id_dest, id_expe, texte, date_mp, lu) VALUES ($contact, $id_ind_co, '$message', NOW(), 0)";
    $results2=mysqli_query($link,$query2);
}

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
        //En cliquant, le messaage par défault disparait
        ?>
        <input type="text" onfocus="this.value=''" value="Tapez votre message ici" size="80" name="message">
        <?php
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