<?php
//retrieve session variables
session_start();
//include connection
include("grievance.php");
//on submit transaction will begin
if($_SERVER['REQUEST_METHOD']=='POST'){
  try{
  $conn->beginTransaction();
if(isset($_POST['eid'])) {
$f_n = $conn->prepare("update UserSignUp Set employeeID = ".$_POST['eid']. " where emailAddress = ".$_SESSION['email']);
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$e_s = $conn->prepare("update UserSignUp Set employeeType = " .$_POST['employeeStatus']. " where emailAddress = " .$_SESSION['email']);
$e_s->execute();
}
if(isset($_POST['address'])) {
$a_u = $conn->prepare("update UserSignUp Set address = " .$_POST['address']. " where emailAddress = " .$_SESSION['email']);
$a_u->execute();
}
if(isset($_POST['city'])) {
$c_u = $conn->prepare("update UserSignUp Set city = ".$_POST['city']." where emailAddress = " .$_SESSION['email']);
$c_u->execute();
}
if(isset($_POST['state'])) {
$s_u = $conn->prepare("update UserSignUp Set state =" .$_POST['state']. " where emailAddress = ".$_SESSION['email']);
$s_u->execute();
}
if(isset($_POST['zipCode'])) {
$z_u = $conn->prepare("update UserSignUp Set zipCode = " .$_POST['zipCode']. " where emailAddress = ".$_SESSION['email']);
$z_u->execute();
}
if(isset($_POST['phone'])) {
$p_n = $conn->prepare("update UserSignUp Set phoneNumber = " .$_POST['phone']. "where emailAddress = ".$_SESSION['email']);
$p_n->execute();
}
if(isset($_POST['seniority'])) {
$s_d = $conn->prepare("update UserSignUp Set seniorityDate = " .$_POST['seniority']. " where emailAddress = ".$_SESSION['email']);
$s_d->execute();
}
if(isset($_POST['payLevel'])) {
$p_l = $conn->prepare("update UserSignUp Set payLevel = " .$_POST['payLevel']. "where emailAddress = " .$_SESSION['email']);
$p_l->execute();
}
if(isset($_POST['payStep'])) {
$p_s = $conn->prepare("update UserSignUp Set payStep = " .$_POST['payStep']. "where emailAddress = " .$_SESSION['email']);
$p_s->execute();
}
if(isset($_POST['tour'])) {
$t_u = $conn->prepare("update UserSignUp Set tour = " .$_POST['tour']. "where emailAddress = " .$_SESSION['email']);
$t_u->execute();
}
if(isset($_POST['daysOff'])) {
$d_o = $conn->prepare("update UserSignUp Set daysOff = " .$_POST['daysOff']. "where emailAddress = ".$_SESSION['email']);
$d_o->execute();
}
if(isset($_POST['veteranStatus'])) {
$v_n = $conn->prepare("update UserSignUp Set veteranStatus = " .$_POST['veteranStatus']. "where emailAddress = " .$_SESSION['email']);
$v_n->execute();
}
if(isset($_POST['layOffProtected'])) {
$l_p = $conn->prepare("update UserSignUp Set layOffProtected = " .$_POST['layOffProtected']. "where emailAddress = " .$_SESSION['email']);
$l_p->execute();
}
$conn->commit();
}

catch(PDOException $e) {
  echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";
  $conn->rollBack();

   }
}
$conn = null;
