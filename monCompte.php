<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Stockify | Pour un investissement accessible √† tous">
  <meta name="author" content="Vincent BOUCHEZ">

  <title>Stockify|Accueil</title>

  <link href="css/main.css" rel="stylesheet">
  <link href="css/monCompte.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <script src="js/changePasswordForm.js"></script>
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
              <a class="nav-link active" href="monCompte.php">
                <span data-feather="home"></span>
                Mon compte <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Tendances
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Actualité
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Communauté
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Rapports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Prévisions
              </a>
            </li>
        </ul>
        </div>
        <div class="col-md-9 mx-auto">

          <h1><i class="icon-settings"></i> Réglages du compte</h2>
          <hr class="separateur">
          <h3>Modifier mon mot de passe</h3>
          <p>Pour rappel: votre mot de passe doit avoir une longueur d'au moins 8 caractères, contenir au moins une majuscule et une minuscule.</p>
          <div class="row">
            <div class="col-md-8 mb-3">
              <label for="password">Mot de passe actuel</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-key"></i></span>
                </div>
                <input type="password" class="form-control" name="password" id="password" placeholder="" required>
                <div class="invalid-feedback">
                  Veuillez entrer un mot de passe.
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <form action="changePassword.php" method="post">
              <label for="password">Nouveau mot de passe</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-key"></i></span>
                </div>
                <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="" required>
                <div class="invalid-feedback">
                  Veuillez entrer un nouveau mot de passe.
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="passwordBis">Confirmer le mot de passe</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-key"></i></span>
                </div>
                <input type="password" class="form-control" name="newPasswordBis" id="newPasswordBis" required>
                <div class="invalid-feedback">
                  Veuillez confirmer le mot de passe.
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
            <button class="btn btn-primary btn-block" id="btnChangePassword" onclick="checkForm" type="submit"> Modifier mon mot de passe</button>
            </div>
            </form>
          </div>
          <p id="messageErreur" hidden>Erreur</p>
          <!-- <p>Dernière connexion : <?php //echo($_SESSION['dateDerniereConnexion']);?></p> -->
        </div>
      </div>
    </div>
  </header>



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
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
