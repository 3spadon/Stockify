<?php
session_start();
$mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

// Si problème de connexion à la DB -> message d'erreur
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if (!empty($_POST['username']) && !empty($_POST['password'])){ //Si les champs pseudo/mot de passe ne sont pas vides alors on continue
    echo("fields aren't empty <br>");
    //on attribue aux variables session les valeurs entrées par l'utilisateur
    $_SESSION['username']=htmlentities($_POST["username"]);
    $inpUsername=$_SESSION['username'];
    $_SESSION['password']=htmlentities($_POST["password"]);
    $inpPassword=$_SESSION['password'];
    echo("test post as variables sessions ok <br>");

    //on forme la requête SQL
    $sql= "SELECT * FROM `utilisateurs` WHERE `username` LIKE '".$inpUsername."' AND `password` LIKE SHA1('".$inpPassword."')";

    //Si la requête ne renvoie rien c'est qu'elle est malformée, potentiellement une injection SQL, on alerte un potentiel attaquant
    if (!$result = $mysqli->query($sql)) {
    echo "<h2>La requête SQL est malformée..</h2>";
    echo"A des fins de sécurité, votre adresse IP et les informations de votre navigateur ont été sauvegardées et envoyées à notre administrateur.<br>";
    echo"Si cette requête avais une fin malveillante, <mark>nous vous invitons vivement</mark> à cesser ces tentatives d'injections !<br><br><br>";
    echo"<h4>Pour rappel</h4>";
    echo"Le délit d'accès frauduleux dans un système de traitement automatisé de données est prévu et réprimé par l'article 323-1 du Code pénal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d'accéder ou de se maintenir, frauduleusement, dans tout ou partie d'un système de traitement automatisé de données est puni de deux ans d'emprisonnement et de 30 000 euros d'amende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d‚Äôun syst√®me de traitement automatis√© de donn√©es par un dispositif de sécurité n'est pas une condition de l'incrimination.";
    }
    //Si la requête renvoie la moindre réponse c'est que le combo utilisateur + mot de passe est le bon
    if($data = $result->fetch_assoc()){
      $dbUsername=$data['username'];
      $dbPassword=$data['password'];
      $_SESSION['dateDerniereConnexion']=$data['dateDerniereConnexion'];
      //On met à jour la date de dernière connexion de l'utilisateur
      $sql= "UPDATE `utilisateurs` SET `dateDerniereConnexion` = CURRENT_TIMESTAMP WHERE `username` LIKE '".$inpUsername."' AND `password` LIKE SHA1('".$inpPassword."')";
      $mysqli->query($sql);
      if (!$mysqli -> commit()) {
        echo "La mise à jour de la date de dernière connexion a échouée.";
      }
      header('Location: pr_index.php');
    }
    else{
      header('Location: index.php?err=wrong_credentials');
    }
}
else{
header('Location: index.php?err=no_given_credentials');
}

$mysqli -> close();
?>
