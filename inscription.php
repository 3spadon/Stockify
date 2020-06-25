<?php
session_destroy();
session_start();
include('fctn_InscrireUtilisateur.php');

function getFirstName($postFirstName){
    $inpFirstName=htmlentities($postFirstName);
    $_SESSION['firstName']=$inpFirstName;
    return $inpFirstName;
}

function getLastName($postLastName){
  $inpLastName=htmlentities($postLastName);
  $_SESSION['lastName']=$inpLastName;
  return $inpLastName;
}

function getCountry($postCountry){
  $inpCountry=htmlentities($postCountry);
  $_SESSION['country']=$inpCountry;
  return $inpCountry;
}

function getZip($postZip){
  $inpZip=htmlentities($postZip);
  $_SESSION['zip']=$inpZip;
  return $inpZip;
}

function getEmail($postEmail){
  $inpEmail=htmlentities($postEmail);
  $_SESSION['email']=$inpEmail;
  return $inpEmail;
}

function getUsername($postUsername){
  $inpUsername=htmlentities($postUsername);
  $_SESSION['username']=$inpUsername;
  return $inpUsername;
}

if(htmlentities($_POST['newsletter'])=="1"){
  $inpNewsletter=1;
}
else{
  $inpNewsletter=0;
}

//First Name
if((!empty($_POST['firstName']))){
  $inpFirstName=getFirstName($_POST['firstName']);
  // echo("first name : ".$inpFirstName."<br>");
}
else{ //firstName
    header('Location: formulaireInscription.php?err=noInput&field=firstName');
}

//Last Name
if((!empty($_POST['lastName']))){
  $inpLastName=getLastName($_POST['lastName']);
  // echo("last name : ".$inpLastName."<br>");
}
else{ //LastName
  header('Location: formulaireInscription.php?err=noInput&field=lastName');
}

//Country
if((!empty($_POST['country']))){
  $inpCountry=getCountry($_POST['country']);
  // echo("Country : ".$inpCountry."<br>");
}
else{ //Country
  header('Location: formulaireInscription.php?err=noInput&field=country');
}

//Zip
if((!empty($_POST['zip']))){
  $inpZip=getZip($_POST['zip']);
  // echo("Zip : ".$inpZip."<br>");
}
else{ //Zip
  header('Location: formulaireInscription.php?err=noInput&field=zip');
}

//Email
if((!empty($_POST['email']))){
  $emailToCheck=getEmail($_POST['email']);
  if(checkExisting($emailToCheck,"email")==1){
    header('Location: formulaireInscription.php?err=EmailAlreadyExists&field=email&firstName='.$_SESSION["firstName"].'&lastName='.$_SESSION["lastName"].'&zip='.$_SESSION["zip"].'&username='.$_SESSION["username"]);
  }
  else{
    $inpEmail=$emailToCheck;
    // echo("email : ".$inpEmail."<br>");
    $emailCompliant=1;
  }
}
else{ //Email
  header('Location: formulaireInscription.php?err=noInput&field=email');
}

//Username
if((!empty($_POST['username']))){
  $usernameToCheck=getUsername($_POST['username']);
  if(checkExisting($usernameToCheck,"username")==1){
    header('Location: formulaireInscription.php?err=UsernameAlreadyExists&field=username&firstName='.$_SESSION["firstName"].'&lastName='.$_SESSION["lastName"].'&zip='.$_SESSION["zip"].'&username='.$_SESSION["username"].'&email='.$_SESSION["email"]);
  }
  else{
    $inpUsername=$usernameToCheck;
    // echo("username : ".$inpUsername."<br>");
    $usernameCompliant=1;
  }
}
else{
   header('Location: formulaireInscription.php?err=noInput&field=username');
}

//Password
if(!empty($_POST['password'])){
  $passwordToCheck=htmlentities($_POST['password']);
  $passwordBisToCheck=htmlentities($_POST['passwordBis']);

  if($passwordToCheck==$passwordBisToCheck){
    $inpPassword=$passwordToCheck;
    $passwordCompliant=1;
  }
  else{
    header('Location: formulaireInscription.php?err=passwordDontMatch&field=passwordBis&firstName='.$_SESSION["firstName"].'&lastName='.$_SESSION["lastName"].'&zip='.$_SESSION["zip"].'&username='.$_SESSION["username"].'&email='.$_SESSION["email"]);
  }
}
else{ //Password
  header('Location: formulaireInscription.php?err=noInput&field=password');
  //Si les champs sont vides alors on renvoie l'utilisateur sur le formulaire, on passe 'noInput' en option dans l'URL afin de lui afficher un message d'erreur personnalisé (cf. option GET) et on passe le champ en question en option dans "field" afin de le mettre en surbrillance rouge
}

if(($emailCompliant==1)&&($usernameCompliant==1)&&($passwordCompliant==1)){
  inscrireUtilisateur($inpFirstName,$inpLastName,$inpCountry,$inpZip,$inpEmail,$inpUsername,$inpPassword,$inpNewsletter);
}
else{
  echo("Un problème est survenu, veuillez vous rapprocher de l'administrateur pour plus d'informations...");
}
?>
