<?php
// DB connect
try {
  // DB handler PDO Object - (string, username, password)
  $connectInfo = "mysql:host=localhost;dbname=grievanceInfo"; // variable to hold the first param
  $handler = new PDO($connectInfo, "root", "Cd151988@$");
  $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Error mode set
} catch(PDOException $e) {
  echo $e->getMessage();
  die();
}
