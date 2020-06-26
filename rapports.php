<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Stockify | Pour un investissement accessible √† tous">
  <meta name="author" content="Vincent BOUCHEZ">

  <title>Stockify|Accueil</title>

  <link href="css/main.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <script src="js/loginForm.js"></script>
</head>
<?php
session_start();
//Vérification de la connexion utilisateur
include('checkUser.php');
check_user();
 ?>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="pr_index.php"><b>Stockify</b> | Accueil</a>
      <a href="deconnexion.php"><button class="btn btn-primary" id="btn_deconnexion"><i class="icon-login"> </i> Déconnexion</button></a>
  </nav>

  <!-- Masthead -->
  <header class="">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item nav-user">
              <i class="icon-user"><?php echo(" ".$_SESSION['username']);?></i>
            </li>
            <hr class="separateur">
            <li class="nav-item">
              <a class="nav-link" href="monCompte.php">
                <span data-feather="home"></span>
                <i class="icon-equalizer"> </i> Mon compte
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tendances.php">
                <span data-feather="file"></span>
                <i class="icon-graph"> </i> Tendances
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actualite.php">
                <span data-feather="shopping-cart"></span>
                <i class="icon-globe"> </i> Actualité
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="communaute.php">
                <span data-feather="users"></span>
                <i class="icon-people"> </i> Communauté
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="rapports.php">
                <span data-feather="bar-chart-2"></span>
                <b><i class="icon-arrow-right"> </i> <i class="icon-notebook"> </i> Rapports</b>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="previsions.php">
                <span data-feather="layers"></span>
                <i class="icon-clock"> </i> Prévisions
              </a>
            </li>
        </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
