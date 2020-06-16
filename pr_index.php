<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Vincent BOUCHEZ">

  <link rel="stylesheet" type="text/css" href="style.css" media="all"/>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <title>Accueil</title>
</head>
<?php
session_start();
//VŽrification de la connexion utilisateur
include('lastConnection.php');
include('checkUser.php');
check_user();
 ?>
<body>
  <h1>Bonjour <?php echo($_SESSION['username']); ?>, sois la bienvenue sur ton panel Stockify Premium !</h2>
  <br><br>
  <p>Derniere connexion : <?php getLastConnection();?>  (pas encore fonctionnel)</p>
  <a href="deconnexion.php"><button class="btn" id="btn_deconnexion">Deconnexion</button></a>
</body>
</html>
