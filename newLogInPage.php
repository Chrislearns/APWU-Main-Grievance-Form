<?php
if (session_status() == PHP_SESSION_NONE){
session_start();
}
function destroySession(){
  session_unset();
  session_destroy();
}

if (isset($_SESSION["name"])) {
    header("location:index.php");
    }

if (isset($_SESSION['ip'])) {
  if ($_SESSION['ip'] !== $_SERVER['REMOTE_ADDR']){
    destroySession();
    $_SESSION['error'] = "<h6>Technical error! Please Log in again.</h6>";
    header("location:newLogInPage.php");
  }
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />

  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="inc.styling/newLogIn.css">

</head>
<body>
<div class="container wrapper-before-sf">
  <!--<div class="row" style="margin-top: 10%">
    <h1 class="center-text">APWU Grievance Reporting System</h1>
  </div>-->
  <div class="row" style="padding-top: 14%;">
    <div class="six columns border" style="position: relative;">
      <img src="cs_logo_apwu.png" alt="APWU" class="center u-full-width">
      <h3 class="center-text">APWU Grievance<br> Reporting System</h3>
      <span id="dividing-border"><span>
    </div>
    <div class="one-half column">

      <form class="login" method="post" action="inc.phpLogic/validatelogin.php">
        <?php
               if(isset($_SESSION["error"])) {
              $error = $_SESSION["error"];
              echo "<h6 class = i_c >$error</h6>";
                       }
         ?>
        <input type="text" placeholder="email" name = "user_email" class="center" id="login">
        <input type="password" placeholder="password" name="password" class="center">
        <button class="center">LOGIN</button>

        <div>
          <span class="pull-left">
            <small>Do not have an account?</small>
          </span>
      <span class="right">
            <small><a href="#" class="create-account">Create Account</a></small>
          </span>
    </div>
    </form>
  </div>
</div>
</div>
<footer class="sticky-footer">
  <small>&copy; 2017 American Postal Workers Union</a></small>
  <div class="social-box">
    <a href="http://www.facebook.com/apwunational" class="facebook" target="_blank">
      <i class="fa fa-facebook-official fa-2x social-icon" aria-hidden="true"></i>
    </a>
    <a href="http://twitter.com/apwunational" class="twitter" target="_blank">
      <i class="fa fa-twitter-square fa-2x social-icon" aria-hidden="true"></i>
    </a>
    <a href="http://www.youtube.com/apwucommunications" class="youtube">
      <i class="fa fa-youtube-square fa-2x social-icon" aria-hidden="true"></i>
    </a>
    <a href="https://www.flickr.com/photos/123834212@N05/" class="flickr" target="_blank">
      <i class="fa fa-flickr fa-2x social-icon" aria-hidden="true"></i>
    </a>
  </div>
</footer>

<div class="overlay"></div>
<div class="registration-form">



  <!--START OF FORM - tabbed left for spacing-->
  <form id="sign-up-form" method="post" action="inc.phpLogic/signup.php">
    <h3 class="center-text"> - Create Your Profile</h3><br>
    <div class="row">
      <!--FORM ROW-->
      <div class="eight columns">
        <label for="fullName">Full Name</label>
        <input class="u-full-width" id="full-name" type="text" name="full-name" maxlength="128">
        <div class="error" id="full-name-error">Full Name Required</div>
        <div class="error" id="full-name-regex">Full Name can only contain letters only</div>
      </div>

      <div class="four columns">
        <label for="exampleRecipientInput">Employee Status</label>
        <select name="employeeStatus" id="drop-down-menu" class="u-full-width">
        <option value="none">Select Employee Type</option>
        <option value="FTR">Full Time Regular</option>
        <option value="PTR">Part Time Regular</option>
        <option value="PSE">Postal Support Employee</option>
      </select>
      </div>
      <div class="error" id="drop-down-menu-error">Please select your Employee Status</div>

    </div>
    <!--END ROW-->

    <div class="row">
      <!--FORM ROW-->
      <div class="twelve columns">
        <label for="address">Street Address</label>
        <input id="address" type="text" name="address" maxlength="80" class="u-full-width">
        <div class="error" id="address-error">Address field required</div>
        <div class="error" id="address-regex">Address field can contain letters and number only</div>
      </div>
    </div>
    <!--END ROW-->

    <div class="row">
      <!--FORM ROW-->
      <div class="six columns">
        <label for="city">City</label>
        <input id="city" type="text" name="city" maxlength="50" class="u-full-width">
        <div class="error" id="city-error">City field required</div>
        <div class="error" id="city-regex">City field should contain letter only</div>
      </div>
      <div class="three columns">
        <label for="state">State</label>
        <input id="state" type="text" name="state" class="u-full-width" maxlength="25">
        <div class="error" id="state-error">State field required</div>
        <div class="error" id="state-regex">State field should contain letters only</div>
      </div>
      <div class="three columns">
        <label for="zip">Zip Code</label>
        <input id="zipCode" type="number" name="zipCode" class="u-full-width" maxlength="25">
        <div class="error" id="zipCode-error">Zip-Code field required</div>
        <div class="error" id="zipCode-regex">Zip-Code field should contain numbers only</div>
      </div>
    </div>
    <!--END ROW-->


    <div class="input-spacing">
      <h3> Employee ID:</h3>
      <input id="eid" type="number" name="eid" size="8" maxlength="8">
    </div>
    <div class="error" id="eid-error">Employee ID field required</div>
    <div class="error" id="eid-regex">Employee ID field should contain numbers only</div>


    <div class="input-spacing">
      <h3> Phone Number:</h3>
      <input id="phone-number" type="text" name="phone" size="11" maxlength="11">
    </div>
    <div class="error" id="phoneNumber-error">Phone Number field required</div>
    <div class="error" id="phoneNumber-regex">Phone Number field should contain numbers only</div>

    <div class="input-spacing">
      <h3> Seniority Date(mm/dd/yy):</h3>
      <input id="seniorityDate" type="text" name="seniority" size="10" maxlength="10">
    </div>
    <div class="error" id="seniorityDate-error">Seniority Date field required</div>
    <div class="error" id="seniorityDate-regex">Seniority Date should contain dd-mm-yyyy or dd/mm/yyyy</div>

    <div class="input-spacing">
      <h3> (Pay Status) Level:</h3>
      <input id="payLevel" type="text" name="payLevel" size="10" maxlength="10">
    </div>
    <div class="error" id="payLevel-error">Pay Level field required</div>
    <div class="error" id="payLevel-regex">Pay Level should contain letters and number only</div>

    <div class="input-spacing">
      <h3> Pay Step:</h3>
      <input id="payStep" type="text" name="payStep" size="10" maxlength="10">
    </div>
    <div class="error" id="payStep-error">Pay Step field required</div>
    <div class="error" id="payStep-regex">Pay Step should contain letters and number only</div>

    <div class="input-spacing">
      <h3> Tour:</h3>
      <input id="tour" type="number" name="tour" size="10" maxlength="10">
    </div>
    <div class="error" id="tour-error">Tour field required</div>
    <div class="error" id="tour-regex">Tour field should contain numbers only</div>

    <div class="input-spacing">
      <h3> Days Off(check all applicable boxes):</h3><br>
    <input type="checkbox" name="daysOff" value="Saturday" > Saturday
    <input type="checkbox" name="daysOff" value="Sunday" > Sunday
    <input type="checkbox" name="daysOff" value="Monday" > Monday
    <input type="checkbox" name="daysOff" value="Tuesday" > Tuesday
    <input type="checkbox" name="daysOff" value="Wednesday" > Wednesday
    <input type="checkbox" name="daysOff" value="Thursday" > Thursday
    <input type="checkbox" name="daysOff" value="Friday" > Friday
    </div>
    <div class="error" id="daysOff-error">Days Off field required</div>
<br>
    <select name="veteranStatus" class="veteranStatus" id="veteran_ddm">
      <option value="none">Veteran Status</option>

      <option value="Yes">Yes</option>

      <option value="NO">No</option>

    </select>
    <div class="error" id="veteranStatus-error">Veteran Status field required</div>

    <select name="layOffProtected" class="layOffProtected" id="layOff_ddm">
      <option value="none">Layoff Protected</option>

      <option value="YES">Yes</option>

      <option value="NO">No</option>

    </select>
    <div class="error" id="layOffProtected-error">Lay-off Protected field required</div>

    <div class="input-spacing">
      <h3> Email Address:</h3>
      <input id="email-address1" type="email" name="email1" size="20" maxlength="120">
    </div>
    <div class="error" id="email1-error">Please enter a email address.</div>
    <div class="error" id="email1-regex">Please enter a  valid email address.</div>

    <div class="input-spacing">
      <h3> Reenter Email Address:</h3>
      <input id="email-address2"  type="email" name="email2" size="20" maxlength="120">
    </div>
    <div class="error" id="email2-error">Please verify email address</div>
    <div class="error" id="email2-regex">Please verify with a valid email address</div>
    <div class="error" id="email2-equal">Both fields should contain the same email address</div>
    <div class="input-spacing">
      <h3> Create Password:</h3>
      <input id="passwordField1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
      type="password" name="password2" size="20" maxlength="120">
    </div>
    <div class="error" id="password1-error">Please create a password.</div>
    <div class="error" id="password1-equal">Password fields should contain the same password.</div>
    <div class="error" id="password1-regex">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</div>

    <div class="input-spacing">
      <h3> Reenter Password:</h3>
      <input id="passwordField2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
      type="password" name="password2" size="20" maxlength="120">
    </div>
    <div class="error" id="password2-error">Please verify password</div>
    <div class="error" id="password2-regex">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</div>
    <input id="submit" type="submit" value="Sign up">
    <div class="warnings">Please fix the errors in your submission.</div>
  </form>
  <!--END OF FORM - tabbed left for spacing-->
</div>
<script type="text/javascript" src="inc.javascript/newLogIn.js">
</script>

</body>
</html>
<?php
    unset($_SESSION["error"]);
?>
