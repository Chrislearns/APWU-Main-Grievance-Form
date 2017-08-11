<?php
try{
$conn = new PDO('mysql:host=localhost;dbname=grievanceInfo;charset=utf8;','root','Cd151988@$');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
   echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";
  die();
}
