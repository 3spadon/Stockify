<?php
function check_user(){
  session_start();
  $mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);
  // Si probl�me de connexion � la DB -> message d'erreur
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  if (!empty($_SESSION['username']) && !empty($_SESSION['password'])){ //Si les session pseudo et mot de passe ont �t� initialis�es
      //on forme la requ�te SQL
      $sql= "SELECT * FROM `utilisateurs` WHERE `username` LIKE '".$_SESSION['username']."' AND `password` LIKE SHA1('".$_SESSION['password']."')";

      //Si la requ�te ne renvoie rien c'est qu'elle est malform�e, potentiellement une injection SQL, on alerte un potentiel attaquant
      if (!$result = $mysqli->query($sql)) {
        echo "<h2>La requête SQL est malformée..</h2>";
        echo"A des fins de sécurité, votre adresse IP et les informations de votre navigateur ont été sauvegardées et envoyées à notre administrateur.<br>";
        echo"Si cette requête avais une fin malveillante, <mark>nous vous invitons vivement</mark> à cesser ces tentatives d'injections !<br><br><br>";
        echo"<h4>Pour rappel</h4>";
        echo"Le délit d'accès frauduleux dans un système de traitement automatisé de données est prévu et réprimé par l'article 323-1 du Code pénal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d'accéder ou de se maintenir, frauduleusement, dans tout ou partie d'un système de traitement automatisé de données est puni de deux ans d'emprisonnement et de 30 000 euros d'amende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d‚Äôun syst√®me de traitement automatis√© de donn√©es par un dispositif de sécurité n'est pas une condition de l'incrimination.";
      }
      if(!$data = $result->fetch_assoc()){ //Si la requ�te ne renvoie pas de r�ponse c'est que les identifiants de session sont erron�s
        header('Location: pageConnexion.php?err=no_user_logged');
      }
      else{ //Si la requ�te renvoie la moindre r�ponse c'est que le combo utilisateur + mot de passe est le bon donc que l'utilisateur connect� est bien qui il dit �tre
        return 1;
      }
  }
  else{
    //On invite la personne non connect�e � le faire en le redirigeant. La redirection � pour option 'no_user_logged' afin d'afficher le bon message d'erreur sur la page de connexion
  header('Location: index.php?err=no_user_logged');
  }

  $mysqli -> close();
}
?>
