<?php
//Start Session so variables can persist
if (session_status() == PHP_SESSION_NONE){
session_start();
}
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$ip = $_SESSION['ip'];
//check if ip address has changed for security
if($ip != $_SERVER['REMOTE_ADDR']){
  session_unset();
  session_destroy();
  $_SESSION['error'] = "<h4>Technical error! Please Log in again.</h4>";
  header("location:newLogInPage.php");
}
//include DB connection
include("../connection.php");

//Set POST variables
$email = htmlentities(trim($_POST['user_email']),ENT_QUOTES, "UTF-8");
$password = htmlentities(trim($_POST['password']),ENT_QUOTES, "UTF-8");

//Start of query
//change table name depending on user/database/computer/etc.
$query = "select * from userAccounts where email = :email";
$stmt = $handler->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$count = $stmt->rowCount();
$results = $stmt->fetch(PDO::FETCH_ASSOC);
$dbpassword = $results['PASSWORD'];
$_SESSION['name'] = $results['full_name'];
$_SESSION['email']= $email;
$verify = password_verify($password, $dbpassword);

$admin = $results["admin"];

//verify if their is one row
//verify hash from database
if($count == 1 && $verify){
  //Get employee ID for sessions
  $queryid = "select * from UserSignUp where email = :email ";
  $stmt2 = $handler->prepare($queryid);
  $stmt2->bindParam(':email', $_SESSION['email']);
  $stmt2->execute();

  $count2 = $stmt2->rowCount();
  //verify if their is one row
  if($count2 == 1){
  $results2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  $_SESSION['eid'] = $results2['employee_id'];
  $_SESSION["loggedIn"] = "You are now logged in.";
  //If admin send user to admin Menu
  if ($admin == 1) {
    $_SESSION['admin'] = $admin;
    header('Location:../admin/index.php');
    $handler = null;
    exit;
  }
    //Send user to Options Menu
    header("location:../index.php");
  $handler = null;
  exit;


            }
      }
      else{


         $_SESSION["error"] = "<h4>Invalid Log-in creditials</h4>";

        header('location:../newLogInPage.php');

        $handler = null;
          exit;
      }
