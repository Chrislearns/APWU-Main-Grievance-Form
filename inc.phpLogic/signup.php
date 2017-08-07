<?php
if (session_status() == PHP_SESSION_NONE){
session_start();
}
include ('grievance.php');
$daysOff = $_POST['daysOff']

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
$firstdayOff = htmlentities(trim($daysOff[0]),ENT_QUOTES, "UTF-8");
$secondDayOff = htmlentities(trim($daysOff[1]),ENT_QUOTES, "UTF-8");
$veteran = htmlentities(trim($_POST['veteranStatus']),ENT_QUOTES, "UTF-8");
$layOffProtected = htmlentities(trim($_POST['layOffProtected']),ENT_QUOTES, "UTF-8");
$email = htmlentities(trim($_POST['email1']),ENT_QUOTES, "UTF-8");
$email2 = htmlentities(trim($_POST['email2']),ENT_QUOTES, "UTF-8");
$password = htmlentities(trim($_POST['password1']),ENT_QUOTES, "UTF-8");
$password2 = htmlentities(trim($_POST['password2']),ENT_QUOTES, "UTF-8");

$letterNumbers = array("options"=>array("regexp"=>"/^[0-9a-zA-Z]+$/"));
$dateValid = array("options"=>array("regexp"=>"/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/"));
$passwordValid = array("options"=>array("regexp"=>"/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/"));

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = false;

    if(filter_var($employeeID, FILTER_VALIDATE_INT) === false) {
      $_SESSION['eid_message'] = "Valid employee ID required";
$errors = true;
    }
    if(filter_var($fullName, FILTER_VALIDATE_STRING) === false) {
      $_SESSION['fullName_message'] = "Valid name required";
$errors = true;
    }
    if($employeeType === "none") {
      $_SESSION['employeeStatus_message'] = "Employee status required";
$errors = true;
    }
    if(filter_var($address, FILTER_VALIDATE_REGEX, $letterNumbers) === false) {
      $_SESSION['address_message'] = "Address should contain letters and numbers required";
$errors = true;
    }
    if(filter_var($city, FILTER_VALIDATE_STRING) === false) {
      $_SESSION['city_message'] = "Valid city required";
$errors = true;
    }
    if(filter_var($state, FILTER_VALIDATE_STRING) === false) {
      $_SESSION['state_message'] = "Valid state required";
$errors = true;
    }
    if(filter_var($zipCode, FILTER_VALIDATE_INT) === false) {
      $_SESSION['zip_message'] = "Valid Zip-Code required";
$errors = true;
    }
    if(filter_var($phone, FILTER_VALIDATE_INT) === false) {
      $_SESSION['phone_message'] = "Valid phone number required";
$errors = true;
    }
    if(filter_var($seniority, FILTER_VALIDATE_REGEX, $dateValid) === false) {
      $_SESSION['seniority_message'] = "Valid seniority date required required";
$errors = true;
    }
    if(filter_var($payStatus, FILTER_VALIDATE_INT) === false) {
      $_SESSION['payStatus_message'] = "Valid Pay Status required";
$errors = true;
    }
    if(filter_var($payStep, FILTER_VALIDATE_REGEX, $lettersNumber) === false) {
      $_SESSION['payStep_message'] = "Valid Pay Step required";
$errors = true;
    }
    if(filter_var($tour, FILTER_VALIDATE_INT) === false) {
      $_SESSION['tour_message'] = "Valid tour required";
$errors = true;
    }
    if(empty($daysOff[0]) || empty($daysOff[1]) ) {
      $_SESSION['daysOff_message'] = "Must provide Days off required";
$errors = true;
    }
    if($veteran == "none") {
      $_SESSION['daysOff_message'] = "Must provide veteran status required";
$errors = true;
    }
    if($layOffProtected == "none") {
      $_SESSION['layOff_message'] = "Must provide Lay Off Protections status";
$errors = true;
    }

    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $_SESSION['email_message'] = "Valid email required";
$errors = true;
    }

    if(filter_var($email2, FILTER_VALIDATE_EMAIL) === false) {
      $_SESSION['email2_message'] = "You must re-enter a valid email";
$errors = true;
    }

    if($email1 !== $email2) {
      $_SESSION['email_equal'] = "Emails fields must contain the same input";
$errors = true;
    }

    if(filter_var($password, FILTER_VALIDATE_REGEX, $passwordValid) === false) {
      $_SESSION['password_message'] = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
$errors = true;
    }
    if(filter_var($password2, FILTER_VALIDATE_REGEX, $passwordValid) === false) {
      $_SESSION['password2_message'] = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
$errors = true;
    }
    if($password !== $password2) {
      $_SESSION['password_equal'] = "Both password fields must contain the same password";
$errors = true;
    }
    if($errors){
      header("location:newLogInPage.php");
      $conn = null;
      exit;
    }
  }

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
seniorityDate, payLevel, payStep, tour, firstdayOff,secondDayOff, veteranStatus, layOffProtected, emailAddress) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");


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
$stmtSignUpInfo->bindValue(12, $firstdayOff);
$stmtSignUpInfo->bindValue(13, $secondDayOff);
$stmtSignUpInfo->bindValue(14, $veteran);
$stmtSignUpInfo->bindValue(15, $layOffProtected);
$stmtSignUpInfo->bindValue(16, $email);

$stmtSignUpInfo->execute();
$count2 = $stmtSignUpInfo->rowCount();
$conn->commit();
if($count1 == 1 && $count2 == 1) {
  $_SESSION['email'] = $email;
  $_SESSION['eid'] = $employeeID;
  $_SESSION['name'] = $fullName;
  header("location:../index.php");
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
