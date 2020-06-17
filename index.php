<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Stockify | Pour un investissement accessible à tous">
  <meta name="author" content="Vincent BOUCHEZ">

  <title>Stockify</title>

  <link href="css/style.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.css" rel="stylesheet">
  <script src="js/loginForm.js"></script>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><b>Stockify</b> | Pour un investissement accessible à tous</a>
      <form action="authentication.php" method="post" id="authentication">
        <div id="loginForm">
            <input id="username" class="inpText" name="username" type="text" placeholder="Username" autofocus required>
            <input id="password" class="inpText" name="password" type="password" placeholder="Password" required>
            <input type="submit" action="authentication.php" id="btnSubmit" class="btn btn-primary" value="Connexion">
        </div>
        <p id="underLoginFormMessage" class="messageErreur" hidden></p>
        <?php
        if($_GET['logout']=='1'){ $messageErreur='Vous vous êtes correctement déconnecté.'; echo("<script>spawnError('".$messageErreur."','green');</script>");}
        if($_GET['err']=='no_given_credentials'){ $messageErreur='Veuillez renseigner vos identifiants !'; }
        if($_GET['err']=='wrong_credentials'){ $messageErreur='Identifiants incorrects !'; }
        if($_GET['err']=='no_user_logged'){ $messageErreur='Vous devez vous identifier pour accéder à la partie premium !'; }
        if($_GET['err']){ echo("<script>spawnError('".$messageErreur."','#9a3b71');</script>"); }
        ?>
      </div>
    </form>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Comprendre la bourse n'a jamais été aussi facile, qu'est-ce que tu attends ?</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form action="formulaireInscription.php" method="post">
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Entrez votre adresse email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">S'inscrire!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Lorem ipsum</h3>
            <p class="lead mb-0">Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsums!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Lorem ipsum</h3>
            <p class="lead mb-0">Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Lorem ipsum</h3>
            <p class="lead mb-0">Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Lorem ipsum</h2>
          <p class="lead mb-0">Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Lorem ipsum</h2>
          <p class="lead mb-0">Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Lorem ipsum</h2>
          <p class="lead mb-0">Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Ce que les gens pensent de nous...</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
            <h5>Clémence E.</h5>
            <p class="font-weight-light mb-0">"Stockify est juste fantastique! Je ne peux que vous le conseiller, vous ne le regretterez pas."</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
            <h5>Frédéric S.</h5>
            <p class="font-weight-light mb-0">"Depuis que j'utilise Stockify j'ai presque triplé mes revenus boursiers. <br>Merci Stockify!"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
            <h5>Marie-Laure W.</h5>
            <p class="font-weight-light mb-0">"Je ne pourrais jamais assez remercier l'équipe Stockify, c'est tout simplement un service d'utilité publique!"</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Prêt à rejoindre la communauté ?</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form action="formulaireInscription.php" method="post">
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Entrez votre adresse email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" action="formulaireInscription.php" class="btn btn-block btn-lg btn-primary">S'inscrire !</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

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
