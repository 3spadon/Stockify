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
                <b><i class="icon-arrow-right"> </i> <i class="icon-equalizer"> </i> Mon compte</b>
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
              <a class="nav-link" href="rapports.php">
                <span data-feather="bar-chart-2"></span>
                <i class="icon-notebook"> </i> Rapports
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
        <div class="col-md-9 mx-auto">

          <h1><i class="icon-equalizer"></i> Réglages du compte</h2>
          <hr class="separateur">
          <h3>Dernière connexion au compte</h3>
          <p>Votre dernière connexion était <?php echo(getLastConnection());?>.</p>
          <br>
          <h3>Modifier mon mot de passe</h3>
          <p id="passwordComplianceText">Pour rappel: votre mot de passe doit avoir une longueur d'au moins 8 caractères, contenir au moins une majuscule et une minuscule.</p>
          <form id="changePasswordForm" action="changePassword.php" method="post">
          <div class="row">
            <div class="col-md-8 mb-3">
              <label for="password">Mot de passe actuel</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-key"></i></span>
                </div>
                <input type="password" class="form-control" name="oldPassword" id="oldPassword"  required>
                <div class="invalid-feedback">
                  Veuillez entrer un mot de passe.
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="password">Nouveau mot de passe</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-key"></i></span>
                </div>
                <input type="password" class="form-control" name="newPassword" id="newPassword"  required>
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
            <button class="btn btn-primary btn-block" id="btnChangePassword" onclick="checkForm; return false;"> Modifier mon mot de passe</button>
            </div>
            </form>
          </div>
          <p id="message" hidden>Erreur</p> <!--Message d'erreur/succès caché-->
          <?php
          //Si l'URL contient un paramètre 'err' c'est que les vérifications côté serveur ont détécté un problème.
          //On affiche donc un message d'erreur personnalisé en fonction du problème détecté.
          if($_GET['err']=='wrongPassword'){ $messageErreur="<b>Le mot de passe actuel est erroné !</b>"; }
          if($_GET['err']=='passwordDontMatch'){ $messageErreur="<b>Les mots de passe ne correspondent pas !</b>"; }
          if($_GET['err']){echo("<script>spawnError('".$messageErreur."');</script>");}
          if($_GET['passwordChange']){echo("<script>spawnSuccess('<b>Votre mot de passe a correctement été modifié.</b>');</script>");}
          ?>
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
  <script src="js/changePasswordForm.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
