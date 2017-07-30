<?php
//retrieve session variables
if (session_status() == PHP_SESSION_NONE){
session_start();
}
//include connection
include("grievance.php");
$employeeID = htmlentities(trim($_POST['eid']),ENT_QUOTES, "UTF-8");
$employeeType = htmlentities(trim($_POST['employeeStatus']),ENT_QUOTES, "UTF-8");
$address = htmlentities(trim($_POST['address']),ENT_QUOTES, "UTF-8");
$city = htmlentities(trim($_POST['city']),ENT_QUOTES, "UTF-8");;
$state = htmlentities(trim($_POST['state']),ENT_QUOTES, "UTF-8");;
$zipCode = htmlentities(trim($_POST['zipCode']),ENT_QUOTES, "UTF-8");;
$phone = htmlentities(trim($_POST['phone']),ENT_QUOTES, "UTF-8");;
$seniority = htmlentities(trim($_POST['seniority']),ENT_QUOTES, "UTF-8");;
$payStatus = htmlentities(trim($_POST['payLevel']),ENT_QUOTES, "UTF-8");;
$payStep = htmlentities(trim($_POST['payStep']),ENT_QUOTES, "UTF-8");;
$tour = htmlentities(trim($_POST['tour']),ENT_QUOTES, "UTF-8");;
$daysOff = htmlentities(trim($_POST['daysOff']),ENT_QUOTES, "UTF-8");
$veteran = htmlentities(trim($_POST['veteranStatus']),ENT_QUOTES, "UTF-8");
$layOffProtected = htmlentities(trim($_POST['layOffProtected']),ENT_QUOTES, "UTF-8");
$email = $_SESSION['email'];
$password = htmlentities(trim($_POST['password1']),ENT_QUOTES, "UTF-8");

//on submit transaction will begin
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(empty($password)){
    $_SESSION['message'] = "<h1>Please enter current password to update info</h1>";
    header("location:newUpdateAccountInfo.php");
    exit;
  }

$query = "select * from userAccounts where emailAddress = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$count = $stmt->rowCount();
$results = $stmt->fetch(PDO::FETCH_ASSOC);
$dbpassword = $results['PASSWORD'];

$verify = password_verify($password, $dbpassword);

//verify if their is one row
//if current password is set update will start
if($count == 1  && $verify){

  try{

if(!empty($_POST['eid'])) {
$f_n = $conn->prepare("update UserSignUp Set employeeID = '$employeeID'  where emailAddress = '$email'");
$f_n->execute();
}
if($_POST['employeeStatus'] != 'none') {
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
if(!empty($_POST['zipCode'])) {
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
if($_POST['veteranStatus'] != 'none') {
$v_n = $conn->prepare("update UserSignUp Set veteranStatus = '$veteran' where emailAddress = '$email'");
$v_n->execute();
}
if($_POST['layOffProtected'] != 'none') {
$l_p = $conn->prepare("update UserSignUp Set layOffProtected = '$layOffProtected' where emailAddress = '$email'");
$l_p->execute();
}
$_SESSION["message"] = "<h4>Successfully updated account info!</h4>";
header('location:../newUpdateAccountInfo.php');
    $conn = null;
    exit;
}


catch(PDOException $e) {
  echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";

    $conn = null;
    exit;
   }
}
}
else{
   $_SESSION["message"] = "<h4>Invalid Password. Please try again</h4>";
   exit;
   $conn = null;
  header('location:../newUpdateAccountInfo.php');
}
