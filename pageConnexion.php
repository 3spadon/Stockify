<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Vincent BOUCHEZ">

  <link rel="stylesheet" type="text/css" href="css/style.css" media="all"/>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <script src="js/loginForm.js"></script>
  <title></title>
</head>

<body>
  <h1>Connexion</h1>
  <form action="authentication.php" method="post" id="authentication">
      <p id="err" hidden></p>
      <?php
      if($_GET['err']=='no_given_credentials'){ $messageErreur='Veuillez renseigner vos identifiants !'; }
      if($_GET['err']=='wrong_credentials'){ $messageErreur='Identifiants incorrects !'; }
      if($_GET['err']=='no_user_logged'){ $messageErreur='Vous devez vous identifier pour acceder a la partie premium !'; }
      if($_GET['err']){ echo("<script>spawnError('".$messageErreur."');</script>"); }
      ?>
      <div id="inputs">
          <input id="username" name="username" type="text" placeholder="Username" autofocus required><br>
          <input id="password" name="password" type="password" placeholder="Password" required><br>
          <div id="center"><input type="submit" action="authentication.php" id="submit" value="Connexion"></div>
      </div>
  </form>

</body>
</html>
