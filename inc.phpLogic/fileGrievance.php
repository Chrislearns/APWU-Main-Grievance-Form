<?php
//retrieve session variables
if (session_status() == PHP_SESSION_NONE){
session_start();
}
include('grievance.php');

//DRY
function sanitize($data){
  trim($data);
  htmlentities($data, ENT_QUOTES, "UTF-8");
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

$query = 'INSERT INTO filedGrievances(employeeID, date, machineNumber, timeAlone, supervisorName, feedAndSweep, mailProcessed, timeHelpReceieved, timeHelpSweptMachine, hoursWorkedAlone, minutesWorkedAlone) VALUES(?,?,?,?,?,?,?,?,?,?,?) ';

$stmt = $conn->prepare($query);
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
$_SESSION['grievance'] = "Grievance Filed successfully!";
header("location:index.php");
$conn = null;
exit;
}
else {
  $_SESSION['grievance'] = "There was and error. Please try again.";
  header('location:index.php');
  $conn = null;
  exit;
}
