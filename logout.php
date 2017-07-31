<?php
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="https://use.fontawesome.com/1c43e5f606.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
            <img src="cs_logo_apwu.png" alt="APWU" class="center u-full-width">
            <h3 class="center-text">APWU Grievance<br> Reporting System</h3>
           <span id="dividing-border"><span>
        </div>
        <div class="six columns" style="padding-top: 5%;">
            <div class="button-container">
            <h3 class="center-text">Take care!</h3>
            <p class="center-text">You have successfully logged out.</p>
            <br>
            <a class="button u-full-width" href="newLogInPage.php"><i class="fa fa-sign-in fa-2x fa-panel" aria-hidden="true"></i>&nbsp;&nbsp; Log back in</a>
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

    <div class="overlay"></div>
    <div class="registration-form">

    <!--START OF FORM - tabbed left for spacing-->
    <form id="sign-up-form" method="#" action="#">
      <h3 class="center-text">APWU Grievance Reporting System
        <br>Registration Form - Create Your Profile</h3><br>
      <div class="row"> <!--FORM ROW-->
        <div class="twelve columns">
          <label for="fullName">Full Name</label>
          <input class="u-full-width" id="full-name" type="text" name="full-name" maxlength="128">
        </div>
        <div class="error" id = "full-name-error">Full Name Required</div>
      </div> <!--END ROW-->

      <div class="row"> <!--FORM ROW-->
        <div class="six columns">
          <label for="email">Email</label>
          <input id="email-address1" type="email" name="email1" class="u-full-width" maxlength="120">
          <div class="error" id = "email1-error">Please enter a email address.</div>
        </div>
        <div class="six columns">
          <label for="email-confirm">Reenter Email</label>
          <input id="email-address2" type="email" name="email2" class="u-full-width" maxlength="120">
          <div class="error" id = "email2-error">Please verify email address</div>
        </div>
      </div> <!--END ROW-->

      <div class="row"> <!--FORM ROW-->
        <div class="six columns">
          <label for="password">Password</label>
          <input id="passwordField1" type="password" name="password1" class="u-full-width" maxlength="120">
          <div class="error" id = "password1-error">Please create a password.</div>
        </div>
        <div class="six columns">
          <label for="email-password">Reenter Password</label>
          <input id="passwordField2" type="password" name="password2" class="u-full-width" maxlength="120">
          <div class="error" id = "password2-error">Please verify password</div>
        </div>
      </div> <!--END ROW-->
      <input id="submit" type="submit" value="Register Account" class="submit-button">
    </form>
    <!--END OF FORM - tabbed left for spacing-->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
