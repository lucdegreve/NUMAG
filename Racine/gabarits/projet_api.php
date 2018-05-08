<!-- Julien (corps projet), Ophélie & Liantsoa & Diane (Partie forum)

<!--- Forum sous le projet d'apiculture biologique. On a simulé le forum en créant un individu 0 appelé forum à qui les personnes envoient des messages. 
On a utilisé la table message_prives pour stocker les messages du forum. La personne connectée a la possibilité d'evoyer un message sur le forum--->

<?php
Include("Entete-VALIDE.php");
mysqli_set_charset($link, 'UTF-8');
?>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		Accueil
	</title>
</head>

<body>

  <br>
  <div class="container">
  	<br>
  	<div class="row">
      <div class="col-lg-5">
        <!-- Création du formulaire central : Description du stage -->
        <div>
          <h3>Projet d'apiculture biologique</h3>
          <hr class="my-4">
        </div>
      </div>
    </div>
    <div class="jumbotron HauteurAuto">
      <div class="row">
        <div class="col-lg-6">
          <h4>Description du projet</h4>
          <br><br>
          <p>
            Bonjour, je m'appelle Thomas et je suis un apiculteur actuellement en train d'utiliser le moins de produits pesticides possible <br/>
            J'ai vu sur ce site (www.apiculturebio.com) qu'il y avait un guide très détaillé afin de progresser d'une apiculture standard à une biologique <br/>
            J'aimerais donc réaliser cette transition, et aimerait avoir l'avis de personnes pondérant sur ce même sujet ou ayant déjà franchi le pas.
          </p>
        </div>
        <div class="col-lg-6">
          <img src='picto/Api.jpg'/ width="400" height="225" display="block" margin-left="auto" margin-right="auto">
        </div>
      </div>
      <br/>
      <div>
        <h6>Tags : </h6>
        <p>
          Apiculture, Biologique, Projet, Transition
        </p>
      </div>
    </div>
    <div class="row">
      <h5>Partie forum</h5>
      <br/><br/><br/>   
	  <?php

include ("connexion_bdd.php");

$forum = 0; // id du forum dans la table individus
			

if (@isset($_GET['bt']))
{
	$bt=$_GET['bt'];
    $contact=$_GET['idcontact'];
    $message = $_GET['message'];
    $query2="INSERT INTO messages_prives (id_dest, id_expe, texte, date_mp, lu) VALUES ($contact, $id_ind_co, '$message', NOW(), 0)";
    $results2=mysqli_query($link,$query2);
}


//Requête pour récupérer tous les messages envoyés au forum. 

$query="SELECT individus.id_ind, individus.nom_ind, individus.prenom,
          messages_prives.id_mp, DATE_FORMAT(messages_prives.date_mp, '%d/%m/%y %H:%i') as date, messages_prives.lu, messages_prives.texte, id_dest
          FROM individus
          JOIN messages_prives
          ON individus.id_ind = messages_prives.id_expe OR individus.id_ind = messages_prives.id_dest
          WHERE (messages_prives.id_dest = $forum)
          GROUP BY id_mp
          ORDER BY messages_prives.date_mp";
		  
$results=mysqli_query($link,$query);
echo '<table>';
while ($row=mysqli_fetch_array($results,MYSQLI_BOTH)){
	$IDMP=$row['id_mp'];
	$TEXTE=$row['texte'];
	$DATE=$row['date'];
	$NOM= $row['nom_ind'];
	$PRENOM= $row['prenom'];
	echo '<tr><th>'.$PRENOM.' '.$NOM.'<br/></th></tr>';
	echo "<tr><td>$TEXTE<br/><i>$DATE</i> <br/></td><td></td></tr>";
}
echo '</table>';

echo '<form method="GET">';

//En cliquant, le message 'Tapez votre message ici' par défault disparait. On entre le msg
?>
<input type="text" onfocus="this.value=''" value="Tapez votre message ici" size="80" name="message">
<?php
//On transmet en caché l'id du destinataire et de l'utilisateur connecté
echo "<input type='hidden' name='id_ind_co' value='$id_ind_co'>";
echo "<input type='hidden' name='idcontact' value='$forum'>";
echo '<input type="submit" value="Envoyer" name="bt">';
echo '</form>';
              
?>
    </div>
  </div>

<?php Include("Pied-VALIDE.html");?>
</body>
</html>
