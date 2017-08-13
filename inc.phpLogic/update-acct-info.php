<?php
require_once('../connection.php');
if (session_status() == PHP_SESSION_NONE){
session_start();
}
$ip = $_SESSION['ip'];
$email = $_SESSION["email"];
function destroySession(){
  session_unset();
  session_destroy();
}
  if($ip != $_SERVER['REMOTE_ADDR']){
    destroySession();
    $_SESSION['error'] = "<h6>Technical error! Please Log in again.</h6>";
    header("location:newLogInPage.php");
    exit;
}
  if(empty($_SESSION['name']) || empty($_SESSION["loggedIn"])){
    $_SESSION['error'] = "<h4>Please Log-in</h4>";
    header("location:newLogInPage.php");
    exit;
  }
if (isset($_POST['submit'])) {
  // POST variables
  $name = htmlentities(trim($_POST["full-name"]), ENT_QUOTES, "UTF-8");
  $employeeType = htmlentities(trim($_POST['employeeStatus']),ENT_QUOTES, "UTF-8");
  $address = htmlentities(trim($_POST['address']),ENT_QUOTES, "UTF-8");
  $city = htmlentities(trim($_POST['city']),ENT_QUOTES, "UTF-8");
  $state = htmlentities(trim( $_POST['state']),ENT_QUOTES, "UTF-8");
  $zip = htmlentities(trim($_POST['zipCode']),ENT_QUOTES, "UTF-8");
  $phone = htmlentities(trim($_POST['phone']),ENT_QUOTES, "UTF-8");
  $employeeId = htmlentities(trim($_POST['eid']),ENT_QUOTES, "UTF-8");
  $seniorityDate = htmlentities(trim($_POST['seniority']),ENT_QUOTES, "UTF-8");
  $payStatusLevel = htmlentities(trim($_POST['payLevel']),ENT_QUOTES, "UTF-8");
  $payStep = htmlentities(trim($_POST['payStep']),ENT_QUOTES, "UTF-8");
  $tour = htmlentities(trim($_POST['tour']),ENT_QUOTES, "UTF-8");
  $daysOff = $_POST["daysOff"];
  $firstDay = $daysOff[0];
  $secondDay = $daysOff[1];
  $daysOff = htmlentities(trim($_POST['daysOff']),ENT_QUOTES, "UTF-8");
  $daysOff = htmlentities(trim($secondDay),ENT_QUOTES, "UTF-8");

  $veteranStatus = htmlentities(trim($_POST['veteranStatus']),ENT_QUOTES, "UTF-8");
  $layoffProtected = htmlentities(trim($_POST['layOffProtected']),ENT_QUOTES, "UTF-8");
//Change table name Jay Watson
  try {
    $handler->beginTransaction();
    $sql = "UPDATE UserSignUp SET employee_type = :employeeType,
                                            address = :address,
                                            city = :city,
                                            state = :state,
                                            zip_code = :zip_code,
                                            phone_number = :phone,
                                            employee_id = :employee_id,
                                            seniority_date = :seniority_date,
                                            pay_level = :pay_level,
                                            pay_step = :pay_step,
                                            tour = :tour,
                                            first_day_off = :first_day_off,
                                            second_day_off = :second_day_off,
                                            veteran_status = :veteran_status,
                                            layoff_protected = :layoff_protected
                                            WHERE email = :email";
    $stmt = $handler->prepare($sql);
    $stmt->bindParam(":employeeType", $employeeType);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":city", $city);
    $stmt->bindParam(":state", $state);
    $stmt->bindParam(":zip_code", $zip);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":employee_id", $employeeId);
    $stmt->bindParam(":seniority_date", $seniorityDate);
    $stmt->bindParam(":pay_level", $payStatusLevel);
    $stmt->bindParam(":pay_step", $payStep);
    $stmt->bindParam(":tour", $tour);
    $stmt->bindParam(":first_day_off", $firstDay);
    $stmt->bindParam(":second_day_off", $secondDay);
    $stmt->bindParam(":veteran_status", $veteranStatus);
    $stmt->bindParam(":layoff_protected", $layoffProtected);
    $stmt->bindParam(":email", $email);

    $stmt->execute();
    $count = $stmt->rowCount();

    //Update full name also
    $query = "UPDATE userAccounts set full_name = :fullname WHERE email = :email";
    $stmt2 = $handler->prepare($query);
    $stmt2->bindParam(":fullname", $name);
    $stmt2->bindParam(":email", $email);
    $stmt2->execute();
    $count2 = $stmt2->rowCount();
      $handler->commit();
    if ($count2 === 1) {
      $_SESSION["name"] = $name;
    }

    if($count === 1 || $count === 0 ){
      $_SESSION["message"] = "Account Info updated successful.";
      //after update submit go to loading screen then say grievance submitted
      //then redirect to main menu
    header("location:../index.php");
    $handler = null;
    exit;
    }
    else{
      header("location:../account-info.php");
      $handler = null;
      exit;
    }


  }
   catch (PDOException $e) {
    echo "We have an error"."<br>";
    echo $e->getMessage()."<br>";
    $handler->rollBack();
    $handler = null;
    exit;
  }
}
