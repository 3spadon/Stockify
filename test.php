<?php

//Cette fonction permet de décomposer la date brute issue de la base de donnée (format: 2020-06-26 03:07:53)..
//.. en un format plus lisible: Le 26 Juin 2020 à 03h07.
function getLastConnection(){
  //On démarre la session afin d'aller extraire une variable SESSION à savoir $_SESSION['dateDerniereConnexion']
  session_start();
  //On crée une variable $debug afin d'afficher certaines informations pour la phase de développement
  $debug=0;
  if($debug==1){
    echo("raw date: ".$_SESSION['dateDerniereConnexion']."<br><br>");
  }
  $rawDatetime=$_SESSION['dateDerniereConnexion'];
  //On crée un tableau $datetime contenant les deux parties du datetime brute
  //Le séparateur étant le caractère espace ' '
  $datetime = explode(" ", $rawDatetime);
  if($debug==1){
    echo("--- DATETIME ---<br>");
    echo("datetime[0]: ".$datetime[0]."<br>");
    echo("datetime[1]: ".$datetime[1]."<br>");
    echo("---------------------<br><br>");
  }

  $rawDate=$datetime[0]; //$datetime[0] contient 2020-06-26
  //On sépare à nouveau la date brute dans le tableau $date
  //Le séparateur étant le caractère '-'
  $date= explode("-", $rawDate);
  if($debug==1){
    echo("----- DATE -----<br>");
    echo("date[0]: ".$date[0]."<br>"); //$date[0] est l'année
    echo("date[1]: ".$date[1]."<br>"); //$date[1] est le mois
    echo("date[2]: ".$date[2]."<br>"); //$date[2] est le jour
    echo("---------------------<br><br>");
  }
  //On définit le jour
  $jour=$date[2];
  //Si le jour est 01 alors on est le '1er'
  if($date[2]=="01"){
    $jour="1er";
  }

  //On définit le mois
  if($date[1]=="01"){
    $mois="Janvier";
  }
  if($date[1]=="02"){
    $mois="Février";
  }
  if($date[1]=="03"){
    $mois="Mars";
  }
  if($date[1]=="04"){
    $mois="Avril";
  }
  if($date[1]=="05"){
    $mois="Mai";
  }
  if($date[1]=="06"){
    $mois="Juin";
  }
  if($date[1]=="07"){
    $mois="Juillet";
  }
  if($date[1]=="08"){
    $mois="Août";
  }
  if($date[1]=="09"){
    $mois="Septembre";
  }
  if($date[1]=="10"){
    $mois="Octobre";
  }
  if($date[1]=="11"){
    $mois="Novembre";
  }
  if($date[1]=="12"){
    $mois="Décembre";
  }

  //On définit l'année
  $annee=$date[0];

  $rawTime=$datetime[1]; //$datetime[1] contient 03:07:53
  //On sépare à nouveau l'heure brute dans le tableau $time
  //Le séparateur étant le caractère ':'
  $time= explode(":", $rawTime);
  if($debug==1){
    echo("----- DATE -----<br>");
    echo("time[0]: ".$time[0]."<br>"); //$time[0] est l' heure
    echo("time[1]: ".$time[1]."<br>"); //$time[1] les minutes
    echo("time[2]: ".$time[2]."<br>"); //$time[2] les secondes
    echo("---------------------<br><br>");
  }
  //On définit l'heure
  $heures=$time[0];
  //On définit les minutes
  $minutes=$time[1];

  //Ne nous reste plus qu'à renvoyer la date au bon format
  return "Le ".$jour." ".$mois." ".$annee." à ".$heures."h".$minutes;
}

echo(getLastConnection());
?>
