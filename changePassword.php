<?php
//On démarre la session pour avoir accès aux variables SESSION (=Cookies)
session_start();

//On crée cette  variable uniquement pour la phase de développement
$debug=0;

function changePassword($user,$oldPassword,$newPassword,$newPasswordBis){
  $debug=0;
  $mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

  // Si problème de connexion à la DB -> message d'erreur
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  //On vérifie d'abord que le mot de passe actuel correspond bien au mot de passe de l'utilisateur
  //on forme la requête SQL
  $sql= "SELECT * FROM `utilisateurs` WHERE `username` LIKE '".$user."' AND `password` LIKE SHA1('".$oldPassword."')";
  if($debug==1){
    echo("============= SQL ============<br>");
    echo("Requête SQL Check MDP actuel: ".$sql."<br>");
    echo("==============================<br><br>");
  }
  //Si la requête ne renvoie rien c'est qu'elle est malformée, potentiellement une injection SQL, on alerte un potentiel attaquant
  if (!$result = $mysqli->query($sql)) {
    echo "<h2>La requête SQL est malformée..</h2>";
    echo"A des fins de sécurité, votre adresse IP et les informations de votre navigateur ont été sauvegardées et envoyées à notre administrateur.<br>";
    echo"Si cette requête avait une fin malveillante, <mark>nous vous invitons vivement</mark> à cesser ces tentatives d'injections !<br><br><br>";
    echo"<h4>Pour rappel</h4>";
    echo"Le délit d'accès frauduleux dans un système de traitement automatisé de données est prévu et réprimé par l'article 323-1 du Code pénal aux termes duquel <br><b>&lsaquo;&lsaquo; le fait d'accéder ou de se maintenir, frauduleusement, dans tout ou partie d'un système de traitement automatisé de données est puni de deux ans d'emprisonnement et de 30 000 euros d'amende &rsaquo;&rsaquo; </b>.<br> A savoir que la protection d‚Äôun syst√®me de traitement automatis√© de donn√©es par un dispositif de sécurité n'est pas une condition de l'incrimination.";
  }
  if(!$data = $result->fetch_assoc()){ //Si la requête ne renvoie pas de réponse c'est que le mot de passe n'est pas le bon
    header('Location: monCompte.php?err=wrongPassword');
  }
  else{ //Si la requête renvoie la moindre réponse c'est que le mot de passe est le bon, on peut continuer
    if($debug==1){
      echo("========= NEW PASSWORD =======<br>");
      echo("Nouveau mot de passe : ".$newPassword."<br>");
      echo("confirmation nv. mot de passe : ".$newPasswordBis."<br>");
      echo("==============================<br><br>");
    }
    if($newPassword==$newPasswordBis){ //Si les deux nouveaux mots de passe correspondent
      //On prépare la requête SQL
      $sql= "UPDATE `utilisateurs` SET `password` = SHA1('".$newPassword."') WHERE `username` LIKE '".$user."'";
      if($debug==1){
        echo("============= SQL ============<br>");
        echo("Requête SQL MAJ Password: ".$sql."<br>");
        echo("==============================<br><br>");
      }
      $mysqli->query($sql);
      if (!$mysqli -> commit()) {
        echo "La modification du mot de passe n'a pas eu lieu, une erreur est survenue!";
      }
      if($debug==1){
        echo("============= BILAN ============<br>");
        echo("Nouveau mot de passe: ".$newPassword."<br>");
        echo("==============================<br><br>");
      }
      //La modification est un succès, on passe 'passwordChange=1' en paramètre dans l'URL de manière à afficher un message à l'utilisateur (cf. ligne 146 du fichier monCompte.php)
      header('Location: monCompte.php?passwordChange=1');
    }
    else{
      //Si les deux nouveaux mots de passe ne correspondent pas on redirige l'utilisateur en passant l'erreur correspondante en paramètre dans l'URL pour afficher le message d'erreur correspondant (cf. ligne 144 du fichier monCompte.php)
      header('Location: monCompte.php?err=passwordDontMatch');
    }
  }



}

//On récupère le nom de l'utilisateur connecté dans la variable session correspondante (Cookies)
$user=$_SESSION['username'];
//On recupère le contenu des champs passés en variables POST par l'intermédiaire du formulaire
$oldPassword=$_POST['oldPassword'];
$newPassword=$_POST['newPassword'];
$newPasswordBis=$_POST['newPasswordBis'];

//Pour la phase de développement uniquement, permet de vérifier ce qui est transmis par le formulaire
if($debug==1){
  echo("==== VARIABLES TRANSMISES ====<br>");
  echo("Utilisateur: ".$user."<br>");
  echo("Mdp actuel: ".$oldPassword."<br>");
  echo("Nouveau Mdp: ".$newPassword."<br>");
  echo("Confirmation nouveau Mdp: ".$newPasswordBis."<br>");
  echo("==============================<br><br>");
}

changePassword($user,$oldPassword,$newPassword,$newPasswordBis);
?>
