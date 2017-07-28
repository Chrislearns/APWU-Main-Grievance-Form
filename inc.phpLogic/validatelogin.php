<?php
//Start Session so variables can persist
session_start();
$ip = $_SESSION['ip'];
//check if ip address has changed for security
if($ip != $_SERVER['REMOTE_ADDR']){
  session_unset();
  session_destroy();
  $_SESSION['error'] = "<h4>Technical error! Please Log in again.</h4>";
  header("location:newLogInPage.php");
}
//include DB connection
include("grievance.php");

//Set POST variables
$email = htmlentities($_POST['user_email'],ENT_QUOTES, "UTF-8");
$password = htmlentities($_POST['password'],ENT_QUOTES, "UTF-8");
//Start of query
$query = "select * from userAccounts where emailAddress = :email and PASSWORD = :password";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$count = $stmt->rowCount();
//verify if their is one row
if($count == 1){
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION['name'] = $results['fullName'];
  //Send user to Options Menu
  header("location:../index.php");

  exit;
  $conn = null;
}

else{
   $_SESSION["error"] = "<h4>Invalid Log-in creditials</h4>";
  header('location:../newLogInPage.php');
exit;
$conn = null;
}
