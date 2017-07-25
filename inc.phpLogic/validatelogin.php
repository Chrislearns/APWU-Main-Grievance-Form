<?php
//Start Session so variables can persist
session_start();
//include DB connection
include("grievance.php");

//Set POST variables
$email = $_POST['user_email'];
$password = $_POST['password'];
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
}

else{
   $_SESSION["error"] = "Invalid Log-in creditials";
  header('location:../newLogInPage.php');

}
