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
if($_SERVER['REQUEST_METHOD' == 'POST']){
//Start of query
//verify hash from database
$query = "select * from userAccounts where emailAddress = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$count = $stmt->rowCount();
$results = $stmt->fetch(PDO::FETCH_ASSOC);
$dbpassword = $results['PASSWORD'];
$_SESSION['name'] = $results['fullName'];
$verify = password_verify($password, $dbpassword);


//verify if their is one row
if($count == 1 && $verify){
  //Get employee ID for sessions
  $queryid = "select * from UserSignUp where emailAddress = :email ";
  $stmt2 = $conn->prepare($queryid);
  $stmt2->bindParam(':email', $_SESSION['email']);
  $stmt2->execute();

  $count2 = $stmt2->rowCount();
  //verify if their is one row
  if($count2 == 1){
  $results2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  $_SESSION['eid'] = $results2['employeeID'];
    //Send user to Options Menu
    header("location:../index.php");
  $conn = null;
  exit;


            }
      }
}
else{
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);
  if (session_status() == PHP_SESSION_NONE){
  session_start();

   $_SESSION["error"] = "<h4>Invalid Log-in creditials</h4>";

  header('location:../newLogInPage.php');
}
  $conn = null;
    exit;
}
