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
    </div>
  </div>

<?php Include("Pied-VALIDE.html");?>
</body>
</html>
