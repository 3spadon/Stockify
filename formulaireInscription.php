
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Vincent BOUCHEZ">

  <link rel="stylesheet" type="text/css" href="css/landing-page.css" media="all"/>
  <link rel="stylesheet" type="text/css" href="css/inscription.css" media="all"/>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Vendor CSS-->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <title>Stockify|Inscription</title>
</head>
<body>

  <!-- <form action="inscription.php" method="post">
        <div class="formInput">
          <p>Courriel</p>

        </div>
        <div class="formInput">
          <p>Nom d'utilisateur</p>
          <input name="username" type="text" placeholder="Nom d'utilisateur" required>
        </div>
        <div class="formInput">
          <p>Mot de passe (Majuscule, minuscule, chiffres, lettres et au moins 8 caractères)</p>
          <input name="password" type="password" placeholder="Mot de passe" minlength=8 required>
          <input name="passwordBis" type="password" placeholder="Confirmer le mot de passe" required>
        </div>
        <div class="formInput">
          <p>Nom</p>
          <input name="username" type="text" placeholder="Nom" autofocus required>
        </div>
        <div class="formInput">
          <p>Prénom</p>
          <input name="username" type="text" placeholder="Prénom" required>
        </div>
        <div class="formInput">
          <p>Date de naissance</p>
          <input name="dateNaissance" type="date"required>
        </div>
        <div class="formInput newsletter">
          <p>J'accepte de recevoir la newsletter</p><input name="newsletter" type="checkbox">
        </div>
        <input type="submit" action="inscription.php"class="btn btn-primary validerInscription" value="Valider">
  </div>
</form> -->

<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php"><b>Stockify</b> | L'investissement accessible pour tous</a>

</nav>

<div class="container formulaireInscription">
  <div class="row">
    <div class=" col-md-2 order-md-1"></div>
    <div class=" col-md-8 order-md-1">
      <p id="messageErreur" class="messageErreur" hidden></p>

      <h4 class="mb-3">Cela ne prendra qu'un instant...</h4>
      <hr class="mb-4">
      <form class="needs-validation" action="inscription.php" method="post" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Prénom</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder=""  required>
            <div class="invalid-feedback">
              Veuillez entrer un prénom valide.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Nom</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" required>
            <div class="invalid-feedback">
              Veuillez entrer un nom valide.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="country">Pays</label>
            <select class="custom-select d-block w-100" id="country" name="country" required>
              <option value="">Choisir...</option>
              <option>France</option>
              <option>Belgique</option>
              <option>Luxembourg</option>
              <option>Suisse</option>
              <option>Andorre</option>

            </select>
            <div class="invalid-feedback">
              Veuillez séléctionner un pays valide.
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="zip">Code postal</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
            <div class="invalid-feedback">
              Veuillez entrer un code postal.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="mb-3">
          <label for="email">Email</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="icon-envelope-open"></i></span>
            </div>
            <input name="email" type="email" class="form-control" <?php if($_POST["email"]){$inpEmail=htmlentities($_POST["email"]);echo('value="'.$inpEmail.'"');}?> required>
          <div class="invalid-feedback">
            Veuillez entrer une adresse email valide.
          </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Nom d'utilisateur</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="icon-user"></i></span>
            </div>
            <input type="text" class="form-control" id="username" name="username" placeholder="" required>
            <div class="invalid-feedback" style="width: 100%;">
              Un nom d'utilisateur est requis.
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="password">Mot de passe</label>
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
          <div class="col-md-6 mb-3">
            <label for="passwordBis">Confirmer le mot de passe</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-key"></i></span>
              </div>
              <input type="password" class="form-control" name="passwordBis" id="passwordBis" required>
              <div class="invalid-feedback">
                Veuillez confirmer mot de passe.
              </div>
            </div>
          </div>
        </div>

        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input chk_newsletter" id="save-info">
          <label class="custom-control-label" for="save-info"> <i class="icon-feed"> </i>J'accepte de recevoir un courriel d'information de temps en temps</label>
          <p>(Nous ne vous spammerons pas c'est promis !)</p>
        </div>


        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" action="inscription.php" type="submit">Terminer mon inscription</button>
      </form>
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
    <script src="js/form-inscription-validation.js"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/signupForm.js"></script>
<?php
if($_GET['err']=='noInput'){ $messageErreur="<b>Certains champs n\'ont pas été renseignés !</b>"; }
if($_GET['err']=='EmailAlreadyExists'){ $messageErreur="<b>Un utilisateur est déjà inscrit avec cette adresse mail.</b>"; }
if($_GET['err']=='UsernameAlreadyExists'){ $messageErreur="<b>Ce nom d'utilisateur n'est pas disponible, veuillez en choisir un différent.</b>"; }
if(($_GET['err'])&&($_GET['field'])){ echo("<script>spawnError('".$messageErreur."','".$_GET['field']."');</script>"); }
if($_GET['err']){echo("<script>spawnError('".$messageErreur."','');</script>");}
?>
</body>
</html>
