<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
//Vérification de la connexion utilisateur
include('checkUser.php');
check_user();
 ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Vincent BOUCHEZ">

  <link rel="stylesheet" type="text/css" href="css/landing-page.css" media="all"/>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <title>Accueil</title>
</head>

<body>
  <h1>Bonjour <?php echo($_SESSION['username']); ?>, sois le bienvenue sur ton panel Stockify Premium !</h2>
  <br>
  <p>Dernière connexion : <?php echo($_SESSION['dateDerniereConnexion']);?></p>
  <a href="deconnexion.php"><button class="btn" id="btn_deconnexion">Déconnexion</button></a>
</body>
</html>
