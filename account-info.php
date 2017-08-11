<?php
if (session_status() == PHP_SESSION_NONE){
session_start();
}
// Check if session is established
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
}
  if(empty($_SESSION['name']) || empty($_SESSION["loggedIn"])){
    $_SESSION['error'] = "<h4>Please Log-in</h4>";
    header("location:newLogInPage.php");
  }
include_once('connection.php');
// Query database for name and email from
//Must change table name depending on database/computer/contributor
$query = $handler->query("SELECT * FROM UserSignUp WHERE emailAddress = '$email'");
$row = $query->fetch(PDO::FETCH_OBJ); // Variable to hold row - OO
//putting results in variables before second query executes
// Query database for name and email from
//Must change table name depending on database/computer/contributor
$query2 = $handler->query("SELECT * FROM UserSignUp WHERE emailAddress = '$email'");
$row = $query->fetch(PDO::FETCH_OBJ); // Variable to hold row - OO

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://use.fontawesome.com/51aa15acbd.js"></script>
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/skeleton/2.0.4/css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    <div class="container">
      <div class="form-container">
        <a href="index.php"><img src="https://www.advsol.com/ASI/images/NewSite/Clients/cs_logo_apwu.png" alt="APWU" class="apwu-logo" height="100px"></a>
        <!--START OF FORM -->
        <form id="sign-up-form" method="post" action="update-acct-info.php">

          <h3 style="margin-left: 85px">Profile<br><small><?php echo $row->full_name; ?></small></h3><br>
          <div class="row"> <!--FORM ROW-->
            <div class="eight columns">
              <label for="fullName">Full Name</label>
              <input class="u-full-width" id="full-name" type="text" name="full-name" maxlength="128" value="<?php echo $row->full_name; ?>">
            </div>
            <div class="error" id = "full-name-error">Full Name Required</div>
            <div class="four columns">
              <label for="employee-status">Employee Status</label>
              <select name="employeeStatus" id="drop-down-menu" class="u-full-width">
                <option value="none">Select Employee Type</option>
                <?php echo (isset($row->employee_type) ? $loop = true : $loop = ''); ?>
                <?php if($loop) : ?>
                <option <?php echo ((isset($row->employee_type) && $row->employee_type === 'FTR') ? "value='FTR' selected" : "value='FTR'"); ?>>Full Time Regular</option>
                <option <?php echo ((isset($row->employee_type) && $row->employee_type === 'PTR') ? "value='PTR' selected" : "value='PTR'"); ?>>Part Time Regular</option>
                <option <?php echo ((isset($row->employee_type) && $row->employee_type === 'PSE') ? "value='PSE' selected" : "value='PSE'"); ?>>Postal Support Employee</option>
                <?php endif; ?>
              </select>
            </div>
            <div class="error" id = "drop-down-menu-error">Please select your Employee Status</div>
          </div> <!--END ROW-->

          <div class="row"> <!--FORM ROW-->
            <div class="twelve columns">
              <label for="address">Street Address</label>
              <input id="address" type="text" name="address" maxlength="80" class="u-full-width" value="<?php echo (isset($row->address) ? $row->address : ''); ?>">
            <div class="error" id = "address-error">Address field required</div>
            </div>
          </div> <!--END ROW-->

          <div class="row"> <!--FORM ROW-->
            <div class="six columns">
              <label for="city">City</label>
              <input id="city" type="text" name="city" maxlength="50" class="u-full-width" value="<?php echo (isset($row->city) ? $row->city : ''); ?>">
            <div class="error" id ="city-error">City field required</div>
            </div>
            <div class="three columns">
              <label for="state">State</label>
              <input id="state" type="text" name="state" class="u-full-width" maxlength="25" value="<?php echo (isset($row->state) ? $row->state : ''); ?>">
              <div class="error" id = "state-error">State field required</div>
            </div>
            <div class="three columns">
              <label for="zip">Zip Code</label>
              <input id="zipCode" type="text" name="zipCode" class="u-full-width" maxlength="25" value="<?php echo (isset($row->state) ? $row->zip_code : ''); ?>">
              <div class="error" id = "zipCode-error" >Zip-Code field required</div>
            </div>
          </div> <!--END ROW-->

           <div class="row"> <!--FORM ROW-->
            <div class="four columns">
              <label for="phone">Phone Number</label>
              <input id="phone-number" type="text" name="phone" class="u-full-width" maxlength="11" value="<?php echo (isset($row->state) ? $row->phone_number : ''); ?>">
              <div class="error" id="phoneNumber-error">Phone Number field required</div>
            </div>
            <div class="four columns">
              <label for="employeeId">Employeee Id</label>
              <input id="eid" type="text" name="eid" class="u-full-width" maxlength="8" value="<?php echo (isset($row->state) ? $row->employee_id : ''); ?>">
              <div class="error" id = "eid-error">Employee ID field required</div>
            </div>
            <div class="four columns">
              <label for="seniority">Seniority Date</label>
              <input id="seniorityDate" type="date" name="seniority" maxlength="10" class="u-full-width" value="<?php echo (isset($row->state) ? $row->seniority_date : ''); ?>">
              <div class="error" id = "seniorityDate-error">Seniority Date field required</div>
            </div>
          </div> <!--END ROW-->

          <div class="row"> <!--FORM ROW-->
            <div class="four columns">
              <label for="pay-status">Pay Status Level</label>
              <input id="payLevel" type="text" name="payLevel" class="u-full-width" maxlength="10" value="<?php echo (isset($row->state) ? $row->pay_level : ''); ?>">
              <div class="error" id = "payLevel-error">Pay Level field required</div>
            </div>
            <div class="four columns">
              <label for="pay-step">Pay Step</label>
              <input id="payStep" type="text" name="payStep" class="u-full-width" maxlength="10" value="<?php echo (isset($row->state) ? $row->pay_step : ''); ?>">
              <div class="error" id = "payStep-error">Pay Step field required</div>
            </div>
            <div class="four columns">
              <label for="tour">Tour</label>
              <input id="tour" type="text" name="tour" class="u-full-width" maxlength="10" value="<?php echo (isset($row->state) ? $row->tour : ''); ?>">
              <div class="error" id = "tour-error">Tour field required</div>
            </div>
          </div> <!--END ROW-->

          <div class="row"> <!--FORM ROW-->
            <div class="four columns">
              <label for="days-off">Days Off</label>
              <input id="daysOff" type="text" name="daysOff" maxlength="10" class="u-full-width" value="<?php echo (isset($row->state) ? $row->days_off : ''); ?>">
            </div>
            <div class="four columns">
              <label for="veteran-status">Veteran Status</label>
              <select name="veteranStatus" class="veteranStatus u-full-width" id="drop-down-menu" value="<?php echo (isset($row->state) ? $row->veteran_status : ''); ?>">
                <option <?php echo ((isset($row->veteran_status) && $row->veteran_status === 'Yes') ? "value='Yes' selected" : "value='Yes'"); ?>>Yes</option>
                <option <?php echo ((isset($row->veteran_status) && $row->veteran_status === 'NO') ? "value='NO' selected" : "value='NO'"); ?>>No</option>
              </select>
              <div class="error" id = "veteranStatus-error">Veteran Status field required</div>
            </div>
            <div class="four columns">
              <label for="layoff-protected">Layoff Protected</label>
              <select name="layOffProtected" class="layOffProtected u-full-width" id="drop-down-menu">
                <option <?php echo ((isset($row->layoff_protected) && $row->layoff_protected === 'YES') ? "value='YES' selected" : "value='YES'"); ?>>Yes</option>
                <option <?php echo ((isset($row->layoff_protected) && $row->layoff_protected === 'NO') ? "value='NO' selected" : "value='NO'"); ?>>No</option>
              </select>
              <div class="error" id ="layOffProtected-error">Lay-off Protected field required</div>
            </div>
          </div> <!--END ROW-->

          <div class="row">
            <div class="six columns">
              <a class="button u-full-width" id="change-email">Update Email</a>
            </div>
            <div class="six columns">
              <a class="button u-full-width" id="change-pw">Update Password</a>
            </div>
          </div>
          <!--<div class="row">
            <div class="six columns">
              <label for="email">Email</label>
              <input id="email-address1" type="email" name="email1" class="u-full-width" maxlength="120" value="<?php echo $row->email; ?>">
              <div class="error" id = "email1-error">Please enter a email address.</div>
            </div>
            <div class="six columns">
              <label for="email-confirm">Reenter Email</label>
              <input id="email-address2" type="email" name="email2" class="u-full-width" maxlength="120" value="<?php echo $row->email; ?>">
              <div class="error" id = "email2-error">Please verify email address</div>
            </div>
          </div> -->

          <!--<div class="row">
            <div class="six columns">
              <label for="password" style="color: red;">Reset Password</label>
              <input id="passwordField1" type="password" name="password1" class="u-full-width" maxlength="120">
              <div class="error" id = "password1-error">Please create a password.</div>
            </div>
            <div class="six columns">
              <label for="email-password" style="color: red;">Reenter New Password</label>
              <input id="passwordField2" type="password" name="password2" class="u-full-width" maxlength="120">
              <div class="error" id = "password2-error">Please verify password</div>
            </div>
          </div>-->
          <input id="submit" type="submit" value="Update Account Information" class="submit-button" name="submit">
        </form>
        <!--END OF FORM - tabbed left for spacing-->
      </div>
    </div>


    <footer class="">
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


    <div class="overlay"></div>
    <div class="update-email-form">

    <!--START OF FORM -->
    <form id="sign-up-form" method="post" action="update-email-pw.php">
      <h3 class="center-text">Update Email</h3><br>

      <div class="row"> <!--FORM ROW-->
        <div class="six columns">
          <label for="email">New Email</label>
          <input id="email-address1" type="email" name="email1" class="u-full-width" maxlength="120">
          <div class="error" id = "email1-error">Please enter a email address.</div>
        </div>
        <div class="six columns">
          <label for="email-confirm">Reenter New Email</label>
          <input id="email-address2" type="email" name="email2" class="u-full-width" maxlength="120">
          <div class="error" id = "email2-error">Please verify email address</div>
        </div>
      </div> <!--END ROW-->

      <div class="row"> <!--FORM ROW-->
        <div class="six columns">
          <label for="password">Password</label>
          <input id="passwordField1" type="password" name="password1" class="u-full-width" maxlength="120">
          <div class="error" id = "password1-error">Enter password.</div>
        </div>
        <div class="six columns">
          <br>
          <button id="" type="password" class="u-full-width" name="submit">Update Email</button>
        </div>
      </div> <!--END ROW-->

    </form>
    <!--END OF FORM -->
    </div>


    <div class="update-pw-form">
    <!--START OF FORM -->
    <form id="sign-up-form" method="post" action="update-email-pw.php">
      <h3 class="center-text">Update Password</h3><br>
      <div class="row"> <!--FORM ROW-->
        <div class="six columns">
          <label for="password">Password</label>
          <input id="password" type="text" name="newPw1" class="u-full-width" maxlength="120">

        </div>
        <div class="six columns">
          <label for="pw-confirm">Reenter Password</label>
          <input id="pw-confirm" type="text" name="newPw2" class="u-full-width" maxlength="120">

        </div>
      </div> <!--END ROW-->
      <div class="row"> <!--FORM ROW-->
        <div class="six columns">
          <label for="password">Password</label>
          <input id="passwordField1" type="password" name="password1" class="u-full-width" maxlength="120">
          <div class="error" id = "password1-error">Enter password.</div>
        </div>
        <div class="six columns">
          <br>
          <button id="" type="password" class="u-full-width" name="pw-change">Update Password</button>
        </div>
      </div> <!--END ROW-->
    </form>
    <!--END OF FORM -->
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
