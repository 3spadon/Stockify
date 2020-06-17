<?php
session_start();
$mysqli = new mysqli('localhost', 'stockify', 'St0cK1fY_P4sSw0rd%', 'stockify', 3306);

// Si problme de connexion ˆ la DB -> message d'erreur
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

    //on forme la requÃªte SQL
    $sql= "";

$mysqli -> close();
?>
