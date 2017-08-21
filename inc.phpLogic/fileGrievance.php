<?php
//retrieve session variables
if (session_status() == PHP_SESSION_NONE){
session_start();
}
$ip = $_SESSION['ip'];
$name = $_SESSION['name'];
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
include('../connection.php');

//DRY
function sanitize($data){
$data = trim($data);
$data = htmlentities($data, ENT_QUOTES, "UTF-8");
return $data;
}
$eid = sanitize($_SESSION['eid']);
$date = sanitize($_POST['grievance-date']);
$time_alone = sanitize($_POST['timeAlone']);
$machine_number = sanitize($_POST['machine']);
$feed_sweep = sanitize($_POST['radio']);
$supervisor = sanitize($_POST['supervisor']);
$mail_processed = sanitize($_POST['mail-processed']);
$time_helped = sanitize($_POST['time-helped']);
$time_swept = sanitize($_POST['time-swept']);
$hoursWorkedAlone = sanitize($_POST['hours-worked-alone']);
$minutesWorkedAlone = sanitize($_POST['minutes-worked-alone']);
if($minutesWorkedAlone === ""){
  $minutesWorkedAlone = 0;
}

//integer options for employee ID
$min = 111111;
$max = 99999999;
$optionEID = array("options"=>
array("min_range"=>$min, "max_range"=>$max));
$letterNumbers = array("options"=>array("regexp"=>"/^[0-9a-zA-Z]+$/"));
$dateValid = array("options"=>array("regexp"=>"/^(0[1-9]|1[012])[\- \/](0[1-9]|[12][0-9]|3[01])[\- \/](19|20)\d\d$/"));
$passwordValid = array("options"=>array("regexp"=>"/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/"));


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = false;

      if (empty($date)) {
        $_SESSION["date_message"] = "Date required";
        $errors = true;
      }
      else {
        $_SESSION["date"] = $date;
      }

      if (empty($time_alone)) {
        $_SESSION["time_alone_message"] = "Time worked alone required";
        $errors = true;
      }
      else {
        $_SESSION["time_alone"] = $time_alone;
      }
      if (empty($machine_number)) {
        $_SESSION["machine_number_message"] = "Valid machine number required";
        $errors = true;
      }
      else {
        $_SESSION["machine_number"] = $machine_number;
      }
      if (!isset($feed_sweep)) {
        $_SESSION["feed_sweep_message"] = "Did you feed and sweep the machine";
        $errors = true;
      }
      else {
        $_SESSION["feed_sweep"] = $feed_sweep;
      }
      if (empty($supervisor)) {
        $_SESSION["supervisor_message"] = "Supervisor on tour required";
        $errors = true;
      }
      else {
        $_SESSION["supervisor"] = $supervisor;
      }
      if (empty($mail_processed)) {
        $_SESSION["mail_processed_message"] = "Amount of mail processed required";
        $errors = true;
      }
      else {
        $_SESSION["mail_processed"] = $mail_processed;
      }
      if (isset($time_helped)) {
        $_SESSION["time_helped"] = $time_helped;
      }
      if (isset($time_swept))  {
        $_SESSION["time_swept"] = $time_swept;
      }
      if (empty($hoursWorkedAlone)) {
        $_SESSION["hours_worked_alone_message"] = "How many hours worked alone required";
        $errors = true;
      }
      else {
        $_SESSION["hours_worked_alone"] = $hoursWorkedAlone;
      }
      if (isset($minutesWorkedAlone)) {
        $_SESSION["minutes_worked_alone"] = $minutesWorkedAlone;
      }
      if($errors){
        header("location:grievancePage.php");
        $handler = null;
        exit;
      }
}

$query = 'INSERT INTO filedGrievances(employee_id, date, machine_number, time_alone, supervisor_name, feed_sweep, mailProcessed, time_help_received, time_help_swept_machine, time_worked_alone, minutes_worked_alone) VALUES(?,?,?,?,?,?,?,?,?,?,?) ';

$stmt = $handler->prepare($query);
$stmt->bindValue(1, $eid);
$stmt->bindValue(2, $date);
$stmt->bindValue(3, $machine_number);
$stmt->bindValue(4, $time_alone);
$stmt->bindValue(5, $supervisor);
$stmt->bindValue(6, $feed_sweep);
$stmt->bindValue(7, $mail_processed);
$stmt->bindValue(8, $time_helped);
$stmt->bindValue(9, $time_swept);
$stmt->bindValue(10, $hoursWorkedAlone);
$stmt->bindValue(11, $minutesWorkedAlone);
if($stmt->execute()) {
$_SESSION['message'] = "Grievance Filed successfully!";
header("location:../index.php");
$handler = null;
exit;
}
else {
  $_SESSION['message'] = "There was and error. Please try again.";
  header('location:../index.php');
  $handler = null;
  exit;
}
