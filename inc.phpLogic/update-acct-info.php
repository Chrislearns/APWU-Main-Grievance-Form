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
}
  if(empty($_SESSION['name']) || empty($_SESSION["loggedIn"])){
    $_SESSION['error'] = "<h4>Please Log-in</h4>";
    header("location:newLogInPage.php");
  }
if (isset($_POST['submit'])) {
  // POST variables
  $employeeType = htmlentities(trim($_POST['employeeStatus']),ENT_QUOTES, "UTF-8");
  $adddress = htmlentities(trim($_POST['address']),ENT_QUOTES, "UTF-8");
  $city = htmlentities(trim($_POST['city']),ENT_QUOTES, "UTF-8");
  $state = htmlentities(trim( $_POST['state']),ENT_QUOTES, "UTF-8");
  $zip = htmlentities(trim($_POST['zipCode']),ENT_QUOTES, "UTF-8");
  $phone = htmlentities(trim($_POST['phone']),ENT_QUOTES, "UTF-8");
  $employeeId = htmlentities(trim($_POST['eid']),ENT_QUOTES, "UTF-8");
  $seniorityDate = htmlentities(trim($_POST['seniority']),ENT_QUOTES, "UTF-8");
  $payStatusLevel = htmlentities(trim($_POST['payLevel']),ENT_QUOTES, "UTF-8");
  $payStep = htmlentities(trim($_POST['payStep']),ENT_QUOTES, "UTF-8");
  $tour = htmlentities(trim($_POST['tour']),ENT_QUOTES, "UTF-8");
  $daysOff = htmlentities(trim($_POST['daysOff']),ENT_QUOTES, "UTF-8");
  $firstDay = $daysOff[0];
  $secondDay = $daysOff[1];
  $veteranStatus = htmlentities(trim($_POST['veteranStatus']),ENT_QUOTES, "UTF-8");
  $layoffProtected = htmlentities(trim($_POST['layOffProtected']),ENT_QUOTES, "UTF-8");
//Change table name Jay Watson
  try {
    $sql = "UPDATE UserSignUp SET employee_type = '$employeeType',
                                            address = '$adddress',
                                            city = '$city',
                                            state = '$state',
                                            zip_code = '$zip',
                                            phone_number = '$phone',
                                            employee_id = '$employeeId',
                                            seniority_date = '$seniorityDate',
                                            pay_level = '$payStatusLevel',
                                            pay_step = '$payStep',
                                            tour = '$tour',
                                            first_day_off = '$firstDay',
                                            second_day_off = '$secondDay',
                                            veteran_status = '$veteranStatus',
                                            layoff_protected = '$layoffProtected'
                                            WHERE email = '$email'";
    $stmt = $handler->prepare($sql);
    $stmt->execute();
    //after update submit go to loading screen then say grievance submitted
    //then redirect to main menu
  header("location:index.php")
  } catch (PDOException $e) {
    echo "We have an error"."<br>";
    echo $e->getMessage()."<br>";
  }
}
