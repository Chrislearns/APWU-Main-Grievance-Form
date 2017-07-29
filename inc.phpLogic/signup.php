<?php
if (session_status() == PHP_SESSION_NONE){
session_start();
}
include ('grievance.php');


$employeeID = htmlentities(trim($_POST['eid']),ENT_QUOTES, "UTF-8");
$fullName = htmlentities(trim($_POST['full-name']),ENT_QUOTES, "UTF-8");
$employeeType = htmlentities(trim($_POST['employeeStatus']),ENT_QUOTES, "UTF-8");
$address = htmlentities(trim($_POST['address']),ENT_QUOTES, "UTF-8");
$city = htmlentities(trim($_POST['city']),ENT_QUOTES, "UTF-8");
$state = htmlentities(trim($_POST['state']),ENT_QUOTES, "UTF-8");
$zipCode = htmlentities(trim($_POST['zipCode']),ENT_QUOTES, "UTF-8");
$phone = htmlentities(trim($_POST['phone']),ENT_QUOTES, "UTF-8");
$seniority = htmlentities(trim($_POST['seniority']),ENT_QUOTES, "UTF-8");
$payStatus = htmlentities(trim($_POST['payLevel']),ENT_QUOTES, "UTF-8");
$payStep = htmlentities(trim($_POST['payStep']),ENT_QUOTES, "UTF-8");
$tour = htmlentities(trim($_POST['tour']),ENT_QUOTES, "UTF-8");
$daysOff = htmlentities(trim($_POST['daysOff']),ENT_QUOTES, "UTF-8");
$veteran = htmlentities(trim($_POST['veteranStatus']),ENT_QUOTES, "UTF-8");
$layOffProtected = htmlentities(trim($_POST['layOffProtected']),ENT_QUOTES, "UTF-8");
$email = htmlentities(trim($_POST['email1']),ENT_QUOTES, "UTF-8");
$password = htmlentities(trim($_POST['password1']),ENT_QUOTES, "UTF-8");

/* $options = [
    'cost' => 10,
]; Used to shorten execution time to under 100 millisection values 8 - 12 normally*/
$hash = password_hash($password, PASSWORD_DEFAULT);

$conn->beginTransaction();
try{
$stmt = $conn->prepare("INSERT INTO userAccounts ( fullName ,emailAddress, PASSWORD) VALUES (?,?,?)");

$stmt->bindValue(1,$fullName);
$stmt->bindValue(2,$email);
$stmt->bindValue(3,$hash);
$stmt->execute();
$count1 = $stmt->rowCount();
//prepare second statement
$stmtSignUpInfo = $conn->prepare("INSERT INTO UserSignUp (  employeeID , employeeType , address, city , state, zipcode, phoneNumber,
seniorityDate, payLevel, payStep, tour, daysOff, veteranStatus, layOffProtected, emailAddress) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");


$stmtSignUpInfo->bindValue(1, $employeeID);
$stmtSignUpInfo->bindValue(2, $employeeType);
$stmtSignUpInfo->bindValue(3, $address);
$stmtSignUpInfo->bindValue(4, $city);
$stmtSignUpInfo->bindValue(5, $state);
$stmtSignUpInfo->bindValue(6, $zipCode);
$stmtSignUpInfo->bindValue(7, $phone);
$stmtSignUpInfo->bindValue(8, $seniority);
$stmtSignUpInfo->bindValue(9, $payStatus);
$stmtSignUpInfo->bindValue(10, $payStep);
$stmtSignUpInfo->bindValue(11, $tour);
$stmtSignUpInfo->bindValue(12, $daysOff);
$stmtSignUpInfo->bindValue(13, $veteran);
$stmtSignUpInfo->bindValue(14, $layOffProtected);
$stmtSignUpInfo->bindValue(15, $email);

$stmtSignUpInfo->execute();
$count2 = $stmtSignUpInfo->rowCount();
$conn->commit();
if($count1 == 1 && $count2 == 1) {
  header("location:index.php");
    $conn = null;
  exit;


}
}


catch(PDOException $e) {
  echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";
  $conn->rollBack();
      $conn = null;
  exit;
   }
