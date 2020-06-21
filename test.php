<?php
// session_start();
// $mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);
//
// // Si problème de connexion à la DB -> message d'erreur
// if ($mysqli -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
//   exit();
// }

function checkExisting($input,$column){
  $mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

  // Si problème de connexion à la DB -> message d'erreur
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  $sql= "SELECT * FROM `utilisateurs` WHERE `".$column."` LIKE '".$input."'";

  if (!$result = $mysqli->query($sql)) {
  echo "<h2>La requête SQL est malformée..</h2>";
  echo"A des fins de sécurité, votre adresse IP et les informations de votre navigateur ont été sauvegardées et envoyées à notre administrateur.<br>";
  echo"Si cette requête avais une fin malveillante, <mark>nous vous invitons vivement</mark> à cesser ces tentatives d'injections !<br><br><br>";
  echo"<h4>Pour rappel</h4>";
  echo"Le délit d'accès frauduleux dans un système de traitement automatisé de données est prévu et réprimé par l'article 323-1 du Code pénal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d'accéder ou de se maintenir, frauduleusement, dans tout ou partie d'un système de traitement automatisé de données est puni de deux ans d'emprisonnement et de 30 000 euros d'amende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d‚Äôun syst√®me de traitement automatis√© de donn√©es par un dispositif de sécurité n'est pas une condition de l'incrimination.";
  }

  if($data = $result->fetch_assoc()){
    echo("La valeur ".$input." existe déjà dans la colonne ".$column);
  }
  else{
    echo("La valeur n'existe pas encore");
  }
}
