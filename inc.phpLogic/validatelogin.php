<?php
session_start();
include("grievance.php");
$error = "<h6 class='move-aside'>Invalid Log-in creditials<h6>";
$email = $_POST['user_email'];
$password = $_POST['password'];

$query = "select * from userAccounts where emailAddress = :email and PASSWORD = :password";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$count = $stmt->rowCount();
if($count == 1){
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;

}
$results = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['name'] = $results['fullName'];


    if(isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
  /*echo  "<script> function updateUserName(username) {
      let welcome = document.getElementById('welcome-user');
      welcome.innerHTML = 'Welcome, '+ username + '.' ; }

    </script><br>";
   echo "<script>updateUserName("+$name+");</script><br>"; */
  header("location:../index.php");
  exit;
  }

else{
   $_SESSION["error"] = $error;
  header('location:../newLogInPage.php');

}
