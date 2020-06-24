<?php
session_start();
include('fctn_InscrireUtilisateur.php');
//On teste tous les champs un par un pour vérifier s'ils contiennent quelque chose et on les nettoie de tout code TML ou autre avec htmlentities()
//Ensuite on utilise la fonction précédemment créée pour vérifier que la valeur n'existe pas déjà.
//Pendant la phase de développement s'il n'y a aucune erreur on se contente d'afficher les différentes valeurs sur une nouvelle page en attendant de coder leur écriture dans la base de données.

if(htmlentities($_POST['newsletter'])=="1"){
  $inpNewsletter=1;
}
else{
  $inpNewsletter=0;
}
echo("Newsletter : ".$inpNewsletter."<br>");


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
              if(htmlentities($_POST['passwordBis'])==$inpPassword){
                //Tous les champs sont correctement remplis, on inscrit alors l'utilisateur dans la BDD
                inscrireUtilisateur($inpFirstName,$inpLastName,$inpCountry,$inpZip,$inpEmail,$inpUsername,$inpPassword,$inpNewsletter);
              }
              else{
                header('Location: formulaireInscription.php?err=passwordDontMatch&field=passwordBis');
              }
            }
            else{ //Password
              header('Location: formulaireInscription.php?err=noInput&field=password');
              //Si les champs sont vides alors on renvoie l'utilisateur sur le formulaire, on passe 'noInput' en option dans l'URL afin de lui afficher un message d'erreur personnalisé (cf. option GET) et on passe le champ en question en option dans "field" afin de le mettre en surbrillance rouge
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

?>
