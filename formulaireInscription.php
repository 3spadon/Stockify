
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Vincent BOUCHEZ">

  <link rel="stylesheet" type="text/css" href="css/inscription.css" media="all"/>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Vendor CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <title>Stockify|Inscription</title>
</head>
<body>

  <h2>Apprenez-nous en un peu plus sur vous...</h2>
  <form action="inscription.php" method="post">
        <div class="formInput">
          <p>Courriel</p>
          <?php
          if($_POST["email"]){ //Si l'utilisateur a déjà entré son email sur la page d'accueil
            $inpEmail=htmlentities($_POST["email"]); //On nettoie l'adresse de toute balise HTML avec htmlentities
            echo('<input name="email" type="email" value="'.$inpEmail.'" required><br>');
          }
          else{//Si pas d'email entré alors le champ texte est vide
            echo('<input name="email" type="email" placeholder="Adresse email" required><br>');
          }
          ?>
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
</form>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
