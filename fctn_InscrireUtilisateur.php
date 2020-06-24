<?php
//Cette fonction permet de vérifier si une occurence existe déjà dans la base de données afin d'éviter les doublons et les inscriptions multiples
function checkExisting($input,$column){
  $mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

  // Si problème de connexion à la DB -> message d'erreur
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  //On séléctionne tous les résultats où la valeur rentrée par l'utilisateur correspond au champ par exemple toutes les occurences de l'email entré dans la colonne email avec checkExisting("emailEntreParUtilisateur@email.com","email")
  $sql= "SELECT * FROM `utilisateurs` WHERE `".$column."` LIKE '".$input."'";

  //Si pas de réponse de la BDD alors il y'a une erreur dans la requête
  if (!$result = $mysqli->query($sql)) {
  echo "<h2>La requête SQL est malformée..</h2>";
  echo"A des fins de sécurité, votre adresse IP et les informations de votre navigateur ont été sauvegardées et envoyées à notre administrateur.<br>";
  echo"Si cette requête avais une fin malveillante, <mark>nous vous invitons vivement</mark> à cesser ces tentatives d'injections !<br><br><br>";
  echo"<h4>Pour rappel</h4>";
  echo"Le délit d'accès frauduleux dans un système de traitement automatisé de données est prévu et réprimé par l'article 323-1 du Code pénal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d'accéder ou de se maintenir, frauduleusement, dans tout ou partie d'un système de traitement automatisé de données est puni de deux ans d'emprisonnement et de 30 000 euros d'amende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d‚Äôun syst√®me de traitement automatis√© de donn√©es par un dispositif de sécurité n'est pas une condition de l'incrimination.";
  }

  //S'il y'a le moindre résultat c'est qu'une occurence existe déjà on renvoie 1
  if($data = $result->fetch_assoc()){
    return 1;
  }
  else{ // Sinon c'est bon la valeur n'existe pas déjà dans la colonne la fonction renvoie 0
    return 0;
  }
}

function inscrireUtilisateur($firstName,$lastName,$country,$zip,$email,$username,$password,$newsletter){
  $mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

  // Si problème de connexion à la DB -> message d'erreur
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  //On prépare la requête SQL
  $sql= "INSERT INTO `utilisateurs` (`id`, `username`, `password`, `email`, `firstName`, `lastName`, `country`, `zip`, `newsletter`, `dateInscription`, `dateDerniereConnexion`, `dateCurrentConnexion`) VALUES (NULL, '".$firstName."', SHA1('".$password."'), '".$email."', '".$firstName."', '".$lastName."', '".$country."', '".$zip."', '".$newsletter."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";


  $mysqli->query($sql);
  $mysqli -> commit();
  if (!$mysqli -> commit()) {
    echo "L'insertion dans la BDD a échouée..";
    echo "<h2>La requête SQL est peut-être malformée..</h2>";
    echo"A des fins de sécurité, votre adresse IP et les informations de votre navigateur ont été sauvegardées et envoyées à notre administrateur.<br>";
    echo"Si cette requête avais une fin malveillante, <mark>nous vous invitons vivement</mark> à cesser ces tentatives d\'injections !<br><br><br>";
    echo"<h4>Pour rappel</h4>";
    echo"Le délit d'accès frauduleux dans un système de traitement automatisé de données est prévu et réprimé par l'article 323-1 du Code pénal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d'accéder ou de se maintenir, frauduleusement, dans tout ou partie d'un système de traitement automatisé de données est puni de deux ans d'emprisonnement et de 30 000 euros d'amende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d‚Äôun syst√®me de traitement automatis√© de donn√©es par un dispositif de sécurité n'est pas une condition de l'incrimination.";
  }

  echo($sql);
}
// inscrireUtilisateur('firstName','lastName','country','26000','email','username','password','1');
?>
