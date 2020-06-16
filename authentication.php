<?php
session_start();
$mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

// Si probl�me de connexion � la DB -> message d'erreur
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if (!empty($_POST['username']) && !empty($_POST['password'])){ //Si les champs pseudo/mot de passe ne sont pas vides alors on continue
    echo("fields aren't empty <br>");
    //on attribue aux variables session les valeurs entr�es par l'utilisateur
    $_SESSION['username']=htmlentities($_POST["username"]);
    $inpUsername=$_SESSION['username'];
    $_SESSION['password']=htmlentities($_POST["password"]);
    $inpPassword=$_SESSION['password'];
    echo("test post as variables sessions ok <br>");

    //on forme la requ�te SQL
    $sql= "SELECT * FROM `utilisateurs` WHERE `username` LIKE '".$inpUsername."' AND `password` LIKE SHA1('".$inpPassword."')";

    //Si la requ�te ne renvoie rien c'est qu'elle est malform�e, potentiellement une injection SQL, on alerte un potentiel attaquant
    if (!$result = $mysqli->query($sql)) {
    echo "<h2>La requ�te SQL est malformée..</h2>";
    echo"A des fins de sécurité, votre adresse IP et les informations de votre navigateur ont été sauvegardées et envoyées à notre administrateur.<br>";
    echo"Si cette requ�te avais une fin malveillante, <mark>nous vous invitons vivement</mark> à cesser ces tentatives d'injections !<br><br><br>";
    echo"<h4>Pour rappel</h4>";
    echo"Le d�lit d'acc�s frauduleux dans un syst�me de traitement automatis� de donn�es est pr�vu et réprimé par l’article 323-1 du Code pénal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d’accéder ou de se maintenir, frauduleusement, dans tout ou partie d’un système de traitement automatisé de données est puni de deux ans d’emprisonnement et de 30 000 euros d’amende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d’un système de traitement automatisé de données par un dispositif de sécurité n’est pas une condition de l’incrimination.";
    }
    //Si la requ�te renvoie la moindre r�ponse c'est que le combo utilisateur + mot de passe est le bon
    if($data = $result->fetch_assoc()){
      $dbUsername=$data['username'];
      $dbPassword=$data['password'];
      //On met � jour la date de derni�re connexion de l'utilisateur
      $sql= "UPDATE `utilisateurs` SET `dateDerniereConnexion` = CURRENT_TIMESTAMP WHERE `username` LIKE '".$inpUsername."' AND `password` LIKE SHA1('".$inpPassword."')";
      $mysqli->query($sql);
      if (!$mysqli -> commit()) {
        echo "La mise � jour de la date de derni�re connexion a �chou�e.";
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
