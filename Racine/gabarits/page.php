<!-- Diane -->
<?php
Session_start();
?>
<?php
$id_ind_co=$_SESSION['id_ind_co'];
$nomcontact=$_GET['submitcontact'];
$contact=$_GET['idcontact'];

$connexion=mysqli_connect('localhost:3306', 'root', 'root','BDD');
$query="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
messages_prives.id_mp, messages_prives.date_mp, messages_prives.lu, messages_prives.texte, id_rece
FROM individus
JOIN messages_prives
ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_rece
WHERE (messages_prives.id_expe = $id_ind_co OR messages_prives.id_rece = $id_ind_co) AND (messages_prives.id_expe = $contact OR messages_prives.id_rece = $contact)
GROUP BY id_mp
ORDER BY messages_prives.date_mp";
$results=mysqli_query($connexion,$query);
if (!empty($contact))
{
    echo '<table><tr><th>'.$nomcontact.'</th><th>Vous</th></tr>';
    while ($row=mysqli_fetch_array($results,MYSQLI_BOTH))
    {
        $TEXTE=$row['texte'];
        $DATE=$row['date_mp'];
        $RECE=$row['id_rece'];
        
        if ($RECE==$id_ind_co)
        {
            echo "<tr><td width='300';>$TEXTE<br/>$DATE</td><td width='300';></td></tr>";
        }
        else
        {
            echo "<tr><td width='300';></td><td width='300';>$TEXTE<br/>$DATE</td></tr>";
        }
    }
    echo '</table>';
}
?>