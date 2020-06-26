
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Vincent BOUCHEZ">

  <link rel="stylesheet" type="text/css" href="css/landing-page.css" media="all"/>
  <link rel="stylesheet" type="text/css" href="css/main.css" media="all"/>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Vendor CSS-->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <title>Stockify|Inscription réussie</title>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php"><b>Stockify</b> | L'investissement accessible pour tous</a>
</nav>

<div class="container main">
  <div class="row">
    <div class=" col-md-2 order-md-1"></div>
    <div class=" col-md-8 order-md-1">
      <h4 class="mb-3">Une dernière étape...</h4>
      <hr class="mb-4">
      <p>Félicitations, vous vous êtes correctement inscrit !</p>
      <p class="crossed">Il ne vous reste plus qu'à confirmer votre adresse <b><?php echo($_GET['email']);?></b>.</p>
      <p class="crossed">pour cela rendez-vous sur votre boîte mail. Dans les minutes à venir vous allez recevoir un courriel de notre part contenant un lien d'activation. Cliquez sur ce lien, vous aurez ensuite accès à votre compte Stockify et serez en mesure de profiter de nos services.</p>
      <p style="color:darkred;"><b>Cette fonctionnalité n'étant pas encore disponible, vous avez accès à votre compte dès maintenant !</b></p>
      <a href="index.php"><b>Retour sur la page d'accueil</b></a>
    </div>
  </div>
  </div>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">A propos</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Règles d'utilisation</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Politique de confidentialité</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Stockify 2020. Tous droits réservés.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div> <!-- formulaireInscription -->
    </div>  <!-- Row -->
  </div> <!-- Container -->
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="vendor/jquery/jquery.slim.min.js"><\/script>')</script><script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
