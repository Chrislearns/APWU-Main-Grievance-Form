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
$eid = $_SESSION['eid'];
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

$query = 'INSERT INTO filedGrievances(employee_id, date, machine_number, time_alone, supervisor_name, feed_sweep, mailProcessed, time_help_received, time_help_swept_machine, time_worked_alone, minutes_worked_alone) VALUES(?,?,?,?,?,?,?,?,?,?,?) ';

$stmt = $handler->prepare($query);
$stmt->bindValue(1, $eid);
$stmt->bindValue(2, $date);
$stmt->bindValue(3, $time_alone);
$stmt->bindValue(4, $machine_number);
$stmt->bindValue(5, $feed_sweep);
$stmt->bindValue(6, $supervisor);
$stmt->bindValue(7, $mail_processed);
$stmt->bindValue(8, $time_helped);
$stmt->bindValue(9, $time_swept);
$stmt->bindValue(10, $hoursWorkedAlone);
$stmt->bindValue(11, $minutesWorkedAlone);
if($stmt->execute()) {
$_SESSION['message'] = "Grievance Filed successfully!";
header("location:index.php");
$handler = null;
exit;
}
else {
  $_SESSION['message'] = "There was and error. Please try again.";
  header('location:index.php');
  $handler = null;
  exit;
}
