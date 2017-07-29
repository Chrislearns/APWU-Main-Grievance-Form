<?php
//Start Session so variables can persist
if (session_status() == PHP_SESSION_NONE){
session_start();
}
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
$email = htmlentities(trim($_POST['user_email']),ENT_QUOTES, "UTF-8");
$password = htmlentities(trim($_POST['password']),ENT_QUOTES, "UTF-8");
$hash = password_hash($password,  PASSWORD_DEFAULT);
$verify = password_verify($password, $hash);
//Start of query

$query = "select * from userAccounts where emailAddress = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$count = $stmt->rowCount();

//verify if their is one row
if($count == 1  && $verify){
  $_SESSION['email'] = $email;
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION['name'] = $results['fullName'];
}

else{
   $_SESSION["error"] = "<h4>Invalid Log-in creditials</h4>";
   exit;
   $conn = null;
  header('location:../newLogInPage.php');
}
  //Get employee ID for sessions
$queryid = "select * from UserSignUp where emailAddress = :email ";
$stmt2 = $conn->prepare($queryid);
$stmt2->bindParam(':email', $_SESSION['email']);
$stmt2->execute();
$count2 = $stmt2->rowCount();
//verify if their is one row
if($count2 == 1){
  $results2 = $stmt2->fetch(PDO::FETCH_ASSOC);
  echo $results2;
  $_SESSION['eid'] = $results2['employeeID'];
    //Send user to Options Menu
    header("location:../index.php");
  $conn = null;
  exit;


}

  exit;
  $conn = null;
