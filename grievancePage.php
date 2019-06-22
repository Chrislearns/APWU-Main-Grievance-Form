<?php
if (session_status() == PHP_SESSION_NONE){
session_start();
}

if(empty($_SESSION['name']) || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] || empty($_SESSION["loggedIn"])){
  $_SESSION['error'] = "<h6>Technical error! Please Log in again.</h6>";

          exit(header("location:newLogInPage.php"));
  }
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
<a href="index.php"><button class="button u-pull-right">Menu</button></a>


<div class="container u-cf">
  <div class="logo-header">
<div class="apwuMainLogo"><img alt="APWU" class="" src="cs_logo_apwu.png"></img>
<h3 class="center-text">Enter grievance information here.</h3>
</div>
</div>

        <form id="userPageForm" action="inc.phpLogic/fileGrievance.php" method="POST">

                <label>Date of Grievance (mm/dd/yy):</label>
                <input id="grievance-date" type="date" name="grievance-date" size="10" maxlength="10" required>

            <?php
             if(isset($_SESSION["date_message"])){
            $date = $_SESSION["date_message"];
             echo "<div>$date</div>";
             }
             ?>


             <label>I worked alone from (Example: 11:45pm until 1:20am)</label>
             <input id="time-alone" type="text" name="timeAlone" size="20" maxlength="28" required>
             <?php
              if(isset($_SESSION["time_alone_message"])){
             $time_alone = $_SESSION["time_alone_message"];
              echo "<div>$time_alone</div>";
              }
              ?>





                <label> Machine Number</label>
                <input id="machine" type="number" name="machine" size="30" maxlength="3" required>
                <?php
                 if(isset($_SESSION["machine_number_message"])){
                $machine_number = $_SESSION["machine_number_message"];
                 echo "<div>$machine_number</div>";
                 }
                 ?>




              <label class="m_p">I had to feed and sweep the machine myself
              <input id="radio-null" type="radio" name="radio" value="Yes" ><span class="label-body">Yes</span><input id="radio-null2" type="radio" name="radio" value="No"><span class="label-body">No</span>
          </label>
          <?php
           if(isset($_SESSION["feed_sweep_message"])){
          $feed_sweep = $_SESSION["feed_sweep_message"];
           echo "<div>$feed_sweep</div>";
           }
           ?>




<div class="s_m">
                <label>SUPERVISORS NAME:</label>
                <input id="supervisor" type="text" name="supervisor" size="28" maxlength="28" required>
                <?php
                 if(isset($_SESSION["supervisor_message"])){
                $supervisor = $_SESSION["supervisor_message"];
                 echo "<div>$supervisor</div>";
                 }
                 ?>

            </div>

                <label>I worked approximatedly <input id="mail-processed" type="number" name="mail-processed" size="5" maxlength="10" required> pieces of mail during the time I worked alone.</label>
                <?php
                 if(isset($_SESSION["mail_processed_message"])){
                $mail_processed = $_SESSION["mail_processed_message"];
                 echo "<div>$mail_processed</div>";
                 }
                 ?>

<div class="row">
              <div class="w_m"><h2>Only complete field if you receieved help</h2>
                <label>I did receive help at approximately <input id="time-helped" type="text" name="time-helped" size="5" maxlength="10">
                  this person only swept the machine which took about
                  <input id="time-swept" type="number" name="time-swept" size="5" maxlength="10" placeholder="Minutes">
                  then I worked by myself again.</label>
</div>

</div>
                <label>I worked alone for a total of <br><input id="hours-worked-alone" type="number" name="hours-worked-alone" size="2" maxlength="2" placeholder="Hours" required> and
                   <input id="minutes-worked-alone" type="number" name="minutes-worked-alone" size="5" maxlength="2" placeholder="Minutes"> <br> on the above date and machine.</label>

                   <?php
                    if(isset($_SESSION["hours_worked_alone_message"])){
                   $hours_worked_alone = $_SESSION["hours_worked_alone_message"];
                    echo "<div>$hours_worked_alone</div>";
                    }
                    ?>


            <input id="submit" type="submit" value="Submit Grievance">

        </form>
</div>
<footer class="sticky-footer">
  <p><small>&copy; 2017 American Postal Workers Union</a></small></p></footer>

    </html>
<?php
unset($_SESSION["date_message"]);
unset($_SESSION["time_alone_message"]);
unset($_SESSION["machine_number_message"]);
unset($_SESSION["feed_sweep_message"]);
unset($_SESSION["supervisor_message"]);
unset($_SESSION["mail_processed_message"]);
unset($_SESSION["hours_worked_alone_message"]);
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
 ?>
