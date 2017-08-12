<?php
if (session_status() == PHP_SESSION_NONE){
session_start();
}
  $ip = $_SESSION['ip'];

if(empty($_SESSION['name']) || $ip != $_SERVER['REMOTE_ADDR']){
  $_SESSION['error'] = "<h6>Technical error! Please Log in again.</h6>";
      header("location:newLogInPage.php");
      exit;
  }
  $eid = $_SESSION['eid'];
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APWU Grievances</title>
<script src="https://use.fontawesome.com/51aa15acbd.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo=" crossorigin="anonymous"></script>


    <script type="text/javascript" src="inc.javascript/userspage.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />

    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="inc.styling/newLogIn.css">

</head>

<a href= "logout.php"><button class="button u-pull-right">Log out</button></a>
<a href="newUpdateAccountInfo.php"><button class="button u-pull-right">Update Account Info</button></a>
<a href="index.php"><button class="button u-pull-right">Menu</button></a>


<div class="container u-cf">
  <div class="logo-header">
<div class="apwuMainLogo"><img alt="APWU" class="" src="cs_logo_apwu.png"></img>
<h3 class="center-text">Submitted grievances for review.</h3>
<?php
include('inc.phpLogic/grievance.php');
$stmt = $conn->prepare("SELECT * FROM `filedGrievances` WHERE employeeID = $eid");
$results = $stmt->fetchAll();
while($results = $stmt->fetchAll()){

}

 ?>
</div>
</div>

</html>
