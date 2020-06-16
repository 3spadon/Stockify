<?php
function check_user(){
  session_start();
  $mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);
  // Si problème de connexion à la DB -> message d'erreur
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  if (!empty($_SESSION['username']) && !empty($_SESSION['password'])){ //Si les session pseudo et mot de passe ont été initialisées
      //on forme la requête SQL
      $sql= "SELECT * FROM `utilisateurs` WHERE `username` LIKE '".$_SESSION['username']."' AND `password` LIKE SHA1('".$_SESSION['password']."')";

      //Si la requête ne renvoie rien c'est qu'elle est malformée, potentiellement une injection SQL, on alerte un potentiel attaquant
      if (!$result = $mysqli->query($sql)) {
      echo "<h2>La requête SQL est malform√©e..</h2>";
      echo"A des fins de s√©curit√©, votre adresse IP et les informations de votre navigateur ont √©t√© sauvegard√©es et envoy√©es √† notre administrateur.<br>";
      echo"Si cette requête avais une fin malveillante, <mark>nous vous invitons vivement</mark> √† cesser ces tentatives d'injections !<br><br><br>";
      echo"<h4>Pour rappel</h4>";
      echo"Le délit d'accès frauduleux dans un système de traitement automatisé de données est prévu et r√©prim√© par l‚Äôarticle 323-1 du Code p√©nal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d‚Äôacc√©der ou de se maintenir, frauduleusement, dans tout ou partie d‚Äôun syst√®me de traitement automatis√© de donn√©es est puni de deux ans d‚Äôemprisonnement et de 30 000 euros d‚Äôamende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d‚Äôun syst√®me de traitement automatis√© de donn√©es par un dispositif de s√©curit√© n‚Äôest pas une condition de l‚Äôincrimination.";
      }
      if(!$data = $result->fetch_assoc()){ //Si la requête ne renvoie pas de réponse c'est que les identifiants de session sont erronés
        header('Location: pageConnexion.php?err=no_user_logged');
      }
      else{ //Si la requête renvoie la moindre réponse c'est que le combo utilisateur + mot de passe est le bon donc que l'utilisateur connecté est bien qui il dit être
        return 1;
      }
  }
  else{
    //On invite la personne non connectée à le faire en le redirigeant. La redirection à pour option 'no_user_logged' afin d'afficher le bon message d'erreur sur la page de connexion
  header('Location: pageConnexion.php?err=no_user_logged');
  }

  $mysqli -> close();
}
?>
