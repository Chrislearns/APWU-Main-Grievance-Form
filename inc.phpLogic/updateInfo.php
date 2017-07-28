<?php
session_start();
include("inc.phpLogic/grievance.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
  $conn->beginTransaction();
if(isset($_POST['full-name'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$e_s = $conn->prepare("update userAccounts Set fullName = $_POST['employeeStatus'] where email = $_SESSION['email']");
$e_s->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
if(isset($_POST['employeeStatus'])) {
$f_n = $conn->prepare("update userAccounts Set fullName = $_POST['full-name'] where email = $_SESSION['email']");
$f_n->execute();
}
}
