<?php
if (session_status() == PHP_SESSION_NONE){
session_start();
}
$ip = $_SESSION['ip'];
$name = $_SESSION['name'];
$admin = $_SESSION['admin'];
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

  if ($admin == 1) {
    header('Location:../admin/index.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="https://use.fontawesome.com/1c43e5f606.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APWU GFS</title>
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/skeleton/2.0.4/css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">

  </head>
  <body>
    <div class="container wrapper-before-sf">
      <!--<div class="row" style="margin-top: 10%">
        <h1 class="center-text">APWU Grievance Reporting System</h1>
      </div>-->
      <div class="row" style="padding-top: 18%">
         <div class="six columns border" style="position: relative;">
           <?php
          if(isset($_SESSION['message'])){
            $message = $_SESSION["message"];
           echo "<h4>$message</h4>";
         }
           ?>
            <img src="cs_logo_apwu.png" alt="APWU" class="center u-full-width">
            <h3 class="center-text">APWU Grievance<br> Reporting System</h3>
           <span id="dividing-border"><span>
        </div>
        <div class="six columns" style="padding-top: 3%;">
          <div class="button-container">
          <?php echo "<h5>Welcome, $name</h5>"; ?>
          <a href="account-info.php">
            <button class="b_respon"><i class="fa fa-address-card-o fa-2x fa-panel" aria-hidden="true">
            </i>&nbsp;&nbsp; Update Account Information</button>
          </a>
          <a href="view-all-grievances.php">
            <button class="b_respon"><i class="fa fa-pencil-square-o fa-2x fa-panel" aria-hidden="true">
            </i>&nbsp;&nbsp; Review Submitted Grievances</button>
          </a>
          <a href = "grievancePage.php">
            <button class="b_respon"><i class="fa fa-folder-open-o fa-2x fa-panel" aria-hidden="true">
            </i>&nbsp;&nbsp; File New Grievance</button>
          </a>
          <a href="logout.php">
            <button class="b_respon"><i class="fa fa-sign-out fa-2x fa-panel" aria-hidden="true">
            </i>&nbsp;&nbsp; Logout</button>
          </a>
          </div>
        </div>
      </div>
    </div>

    <footer class="sticky-footer">
      <small>&copy; 2017 American Postal Workers Union</a></small>
      <div class="social-box">
        <a href="http://www.facebook.com/apwunational" class="facebook" target="_blank">
          <i class="fa fa-facebook-official fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="http://twitter.com/apwunational" class="twitter" target="_blank">
          <i class="fa fa-twitter-square fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="http://www.youtube.com/apwucommunications" class="youtube">
          <i class="fa fa-youtube-square fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="https://www.flickr.com/photos/123834212@N05/" class="flickr" target="_blank">
          <i class="fa fa-flickr fa-fw social-icon" aria-hidden="true"></i>
        </a>
      </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="inc.javascript/script.js"></script>
  </body>
  <?php
  unset($_SESSION["error"]);
  unset($_SESSION['message']);
  unset($_SESSION['grievance']);
  unset($_SESSION["date"]);
  unset($_SESSION["time_alone"]);
  unset($_SESSION["machine_number"]);
  unset($_SESSION["feed_sweep"]);
  unset($_SESSION["supervisor"]);
  unset($_SESSION["mail_processed"]);
  unset($_SESSION["time_helped"]);
  unset($_SESSION["time_swept"]);
  unset($_SESSION["hours_worked_alone"]);
  unset($_SESSION["minutes_worked_alone"]);
  unset($_SESSION["date_message"]);
  unset($_SESSION["time_alone_message"]);
  unset($_SESSION["machine_number_message"]);
  unset($_SESSION["feed_sweep_message"]);
  unset($_SESSION["supervisor_message"]);
  unset($_SESSION["mail_processed_message"]);
  unset($_SESSION["hours_worked_alone_message"]);

   ?>

</html>
