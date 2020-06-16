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
    echo "<h2>La requête SQL est malform√©e..</h2>";
    echo"A des fins de s√©curit√©, votre adresse IP et les informations de votre navigateur ont √©t√© sauvegard√©es et envoy√©es √† notre administrateur.<br>";
    echo"Si cette requête avais une fin malveillante, <mark>nous vous invitons vivement</mark> √† cesser ces tentatives d'injections !<br><br><br>";
    echo"<h4>Pour rappel</h4>";
    echo"Le délit d'accès frauduleux dans un système de traitement automatisé de données est prévu et r√©prim√© par l‚Äôarticle 323-1 du Code p√©nal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d‚Äôacc√©der ou de se maintenir, frauduleusement, dans tout ou partie d‚Äôun syst√®me de traitement automatis√© de donn√©es est puni de deux ans d‚Äôemprisonnement et de 30 000 euros d‚Äôamende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d‚Äôun syst√®me de traitement automatis√© de donn√©es par un dispositif de s√©curit√© n‚Äôest pas une condition de l‚Äôincrimination.";
    }
    //Si la requête renvoie la moindre réponse c'est que le combo utilisateur + mot de passe est le bon
    if($data = $result->fetch_assoc()){
      $dbUsername=$data['username'];
      $dbPassword=$data['password'];
      //On met à jour la date de dernière connexion de l'utilisateur
      $sql= "UPDATE `utilisateurs` SET `dateDerniereConnexion` = CURRENT_TIMESTAMP WHERE `username` LIKE '".$inpUsername."' AND `password` LIKE SHA1('".$inpPassword."')";
      $mysqli->query($sql);
      if (!$mysqli -> commit()) {
        echo "La mise à jour de la date de dernière connexion a échouée.";
      }
      header('Location: pr_index.php');
    }
    else{
      header('Location: pageConnexion.php?err=wrong_credentials');
    }
}
else{
header('Location: pageConnexion.php?err=no_given_credentials');
}

$mysqli -> close();
?>
