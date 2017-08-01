<?php
include('grievance.php');

$eid = $_SESSION['eid'];
$date = htmlentities(trim($_POST['grievance-date']),ENT_QUOTES, "UTF-8");
$time_alone = htmlentities(trim($_POST['timeAlone']),ENT_QUOTES, "UTF-8");
$machine_number = htmlentities(trim($_POST['machine']),ENT_QUOTES, "UTF-8");
$feed_sweep = htmlentities(trim($_POST['radio']),ENT_QUOTES, "UTF-8");
$supervisor = htmlentities(trim($_POST['supervisor']),ENT_QUOTES, "UTF-8");
$mail_processed = htmlentities(trim($_POST['mail-processed']),ENT_QUOTES, "UTF-8");
$time_helped = htmlentities(trim($_POST['time-helped']),ENT_QUOTES, "UTF-8");
$time_swept = htmlentities(trim($_POST['time-swept']),ENT_QUOTES, "UTF-8");
$hoursWorkedAlone = htmlentities(trim($_POST['hours-worked-alone']),ENT_QUOTES, "UTF-8");
$minutesWorkedAlone = htmlentities(trim($_POST['minutes-worked-alone']),ENT_QUOTES, "UTF-8");

$query = 'INSERT INTO filedGrievances(employeeID, date, machineNumber, timeAlone, supervisorName, feedAndSweep, mailProcessed, timeHelpReceieved, timeHelpSweptMachine, hoursWorkedAlone, minutesWorkedAlone) VALUES(?,?,?,?,?,?,?,?,?,?,?) ';

$stmt = $conn->prepare($query);
$stmt->bindValue(1, $eid );
$stmt->bindValue(2, $date );
$stmt->bindValue(3, $time_alone );
$stmt->bindValue(4, $machine_number );
$stmt->bindValue(5, $feed_sweep );
$stmt->bindValue(6, $supervisor );
$stmt->bindValue(7, $mail_processed );
$stmt->bindValue(8, $time_helped );
$stmt->bindValue(9, $time_swept );
$stmt->bindValue(10, $hoursWorkedAlone );
$stmt->bindValue(11, $minutesWorkedAlone );
$stmt->execute();
$_SESSION['message'] = "Grievance Filed successfully!";
header("location:index.php");
