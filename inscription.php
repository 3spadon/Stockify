<?php
session_start();
$mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

//Cette fonction permet de vérifier si une occurence existe déjà dans la base de données afin d'éviter les doublons et les inscriptions multiples
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
    return 1;
  }
  else{
    return 0;
  }
}

//First Name
if((!empty($_POST['firstName']))){
  $inpFirstName=htmlentities($_POST['firstName']);
  echo("Prénom: ".$inpFirstName."<br>");
  //Last Name
  if((!empty($_POST['lastName']))){
    $inpLastName=htmlentities($_POST['lastName']);
    echo("Nom: ".$inpLastName."<br>");
    //Country
    if((!empty($_POST['country']))){
      $inpCountry=htmlentities($_POST['country']);
      echo("Pays: ".$inpCountry."<br>");
      //Zip
      if((!empty($_POST['zip']))){
        $inpZip=htmlentities($_POST['zip']);
        echo("Code postal: ".$inpZip."<br>");
        //Email
        if((!empty($_POST['email']))){
          $inpEmail=htmlentities($_POST['email']);
          if(checkExisting($inpEmail,"email")==1){
            header('Location: formulaireInscription.php?err=EmailAlreadyExists&field=email');
          }
          echo("Email: ".$inpEmail."<br>");
          //Username
          if((!empty($_POST['username']))){
            $inpUsername=htmlentities($_POST['username']);
            if(checkExisting($inpUsername,"username")==1){
              header('Location: formulaireInscription.php?err=UsernameAlreadyExists&field=username');
            }
            echo("Nom d'utilisateur: ".$inpUsername."<br>");
            //Password
            if((!empty($_POST['password']))){
              $inpPassword=htmlentities($_POST['password']);
              echo("Mot de passe: ".$inpPassword."<br>");

            }
            else{ //Password
              header('Location: formulaireInscription.php?err=noInput&field=password');
            }
          }
          else{ //Username
            header('Location: formulaireInscription.php?err=noInput&field=username');
          }
        }
        else{ //Email
          header('Location: formulaireInscription.php?err=noInput&field=email');
        }
      }
      else{ //Zip
        header('Location: formulaireInscription.php?err=noInput&field=zip');
      }
    }
    else{ //Country
      header('Location: formulaireInscription.php?err=noInput&field=country');
    }
  }
  else{ //LastName
    header('Location: formulaireInscription.php?err=noInput&field=lastName');
  }
}
else{ //firstName
  header('Location: formulaireInscription.php?err=noInput&field=firstName');
}

// if((!empty($_POST['passwordBis']))){
//   $inpPasswordBis=$_POST['passwordBis'];
//   echo("Conf mot de passe: ".$inpPasswordBis."<br>");
// }
// else{ //Confirmation mot de passe
//   echo("Conf mot de passe: ".$inpPasswordBis."<br>");
// }

if((!empty($_POST['username']))){
  $inpUsername=$_POST['username'];
  echo("username: ".$_POST['username']);
}

?>
