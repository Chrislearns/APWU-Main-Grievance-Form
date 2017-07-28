<?php
//retrieve session variables
session_start();
//include connection
include("grievance.php");
$employeeID = $_POST['eid'];
$employeeType = $_POST['employeeStatus'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipCode = $_POST['zipCode'];
$phone = $_POST['phone'];
$seniority = $_POST['seniority'];
$payStatus = $_POST['payLevel'];
$payStep = $_POST['payStep'];
$tour = $_POST['tour'];
$daysOff = $_POST['daysOff'];
$veteran = $_POST['veteranStatus'];
$layOffProtected = $_POST['layOffProtected'];
$email = $_SESSION['email'];
//on submit transaction will begin
if($_SERVER['REQUEST_METHOD']=='POST'){
  try{
  $conn->beginTransaction();
if(!empty($_POST['eid'])) {
$f_n = $conn->prepare("update UserSignUp Set employeeID = '$employeeID'  where emailAddress = '$email'");
$f_n->execute();
}
if(!empty($_POST['employeeStatus'])) {
$e_s = $conn->prepare("update UserSignUp Set employeeType = '$employeeType' where emailAddress = '$email'");
$e_s->execute();
}
if(!empty($_POST['address'])) {
$a_u = $conn->prepare("update UserSignUp Set address = '$address' where emailAddress = '$email'");
$a_u->execute();
}
if(!empty($_POST['city'])) {
$c_u = $conn->prepare("update UserSignUp Set city = '$city' where emailAddress = '$email'");
$c_u->execute();
}
if(!empty($_POST['state'])) {
$s_u = $conn->prepare("update UserSignUp Set state = '$state' where emailAddress = '$email'");
$s_u->execute();
}
if(!empty($zipCode)) {
$z_u = $conn->prepare("update UserSignUp Set zipCode = '$zipCode' where emailAddress = '$email'");
$z_u->execute();
}
if(!empty($_POST['phone'])) {
$p_n = $conn->prepare("update UserSignUp Set phoneNumber = '$phone' where emailAddress = '$email'");
$p_n->execute();
}
if(!empty($_POST['seniority'])) {
$s_d = $conn->prepare("update UserSignUp Set seniorityDate = '$seniority' where emailAddress = '$email'");
$s_d->execute();
}
if(!empty($_POST['payLevel'])) {
$p_l = $conn->prepare("update UserSignUp Set payLevel = '$payStatus' where emailAddress = '$email'");
$p_l->execute();
}
if(!empty($_POST['payStep'])) {
$p_s = $conn->prepare("update UserSignUp Set payStep = '$payStep' where emailAddress = '$email'");
$p_s->execute();
}
if(!empty($_POST['tour'])) {
$t_u = $conn->prepare("update UserSignUp Set tour = '$tour' where emailAddress = '$email'");
$t_u->execute();
}
if(!empty($_POST['daysOff'])) {
$d_o = $conn->prepare("update UserSignUp Set daysOff = '$daysOff' where emailAddress = '$email'");
$d_o->execute();
}
if(!empty($_POST['veteranStatus'])) {
$v_n = $conn->prepare("update UserSignUp Set veteranStatus = '$veteran' where emailAddress = '$email'");
$v_n->execute();
}
if(!empty($_POST['layOffProtected'])) {
$l_p = $conn->prepare("update UserSignUp Set layOffProtected = '$layOffProtected' where emailAddress = '$email'");
$l_p->execute();
}
$conn->commit();
header('location:../newUpdateAccountInfo.html');
}

catch(PDOException $e) {
  echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";
  $conn->rollBack();

   }
}
$conn = null;
