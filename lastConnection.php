<?php
function getLastConnection(){
session_start();
$mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

// Si probl�me de connexion � la DB -> message d'erreur
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
    //on forme la requ�te SQL
    $sql= "SELECT * FROM `utilisateurs` WHERE `username` LIKE '".$_SESSION['username']."' AND `password` LIKE SHA1('".$_SESSION['password']."')";

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
      $lastConnection=$data['dateDerniereConnexion'];
    }
$mysqli -> close();
echo($lastConnection);
}
?>