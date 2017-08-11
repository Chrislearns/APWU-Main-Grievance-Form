<?php
if (session_status() == PHP_SESSION_NONE){
session_start();
}


function destroySession(){
  session_unset();
  session_destroy();
}
  if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']){
    destroySession();
    $_SESSION['error'] = "<h6>Technical error! Please Log in again.</h6>";
    header("location:newLogInPage.php");

}
  if(empty($_SESSION['name']) || empty($_SESSION["loggedIn"])){
    $_SESSION['error'] = "<h4>Please Log-in</h4>";
    destroySession();
    header("location:newLogInPage.php");
  }
  include("inc.phpLogic/grievance.php");

  $email = $_SESSION['email'];
  $query = "select * from UserSignUp where emailAddress = :email";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  $count = $stmt->rowCount();
  $results = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APWU Grievances</title>

    <script src="https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />

    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="inc.styling/newLogIn.css">

</head>
<a href= "logout.php"><button class="button u-pull-right">Log out</button></a>
<a href="grievancePage.php"><button class="button u-pull-right">File Grievance</button></a>
<a href="index.php"><button class="button u-pull-right">Menu</button></a>


<div class="container u-cf">
    <div class="logo-header">
        <div class="apwuMainLogo"><img alt="APWU" class="" src="cs_logo_apwu.png"></img>
            <h3 class="center-text">Update account info</h3>
            <?php   if (isset($_SESSION['message'])){
                $message = $_SESSION['message'];
                echo "<h3>$message</h3>";
              } ?>
        </div>
    </div>
    <form id="update-account-info-form" method="post" action="newUpdateAccountInfo.php">

        <br>
        <select name="employeeStatus" id="drop-down-menu">
          <option value="<?php echo $eStatus = $results["employeeType"];  ?>">Select Employee Type</option>

          <option value="FTR">Full Time Regular</option>

            <option value="PTR">Part Time Regular</option>

            <option value="PSE">Postal Support Employee</option>

         </select>
        <div class="error" id="drop-down-menu-error">Please select your Employee Status</div>

        <label> Address:</label>
        <input id="address" type="text" value="<?php echo $address = $results["address"]; ?>"name="address" size="30" maxlength="80">

        <div class="error" id="address-error">Address field required</div>

        <label> City:</label>
        <input id="city" type="text" value="<?php echo $city = $results["city"]; ?>" name="city" size="25" maxlength="50">

        <div class="error" id="city-error">City field required</div>

        <label> State:</label>
        <input id="state" type="text" value="<?php echo $state = $results["address"]; ?>" name="state" size="25" maxlength="25">

        <div class="error" id="state-error">State field required</div>

        <label> Zip Code:</label>
        <input id="zipCode" type="text" value="<?php echo $zipCode = $results["zipcode"]; ?>" name="zipCode" size="25" maxlength="25">
        <div class="error" id="zipCode-error">Zip-Code field required</div>

        <label> Phone Number:</label>
        <input id="phone-number" type="text" value="<?php echo $phone = $results["phoneNumber"]; ?>" name="phone" size="11" maxlength="11">

        <div class="error" id="phoneNumber-error">Phone Number field required</div>


        <label> Seniority Date(mm/dd/yy):</label>
        <input id="seniorityDate" type="text" value="<?php echo $seniority = $results["seniorityDate"]; ?>" name="seniority" size="10" maxlength="10">

        <div class="error" id="seniorityDate-error">Seniority Date field required</div>


        <label> (Pay Status) Level:</label>
        <input id="payLevel" type="text" value="<?php echo $payLevel = $results["payLevel"]; ?>" name="payLevel" size="10" maxlength="10">

        <div class="error" id="payLevel-error">Pay Level field required</div>

        <label> Pay Step:</label>
        <input id="payStep" type="text" value="<?php echo $payStep = $results["payStep"]; ?>" name="payStep" size="10" maxlength="10">

        <div class="error" id="payStep-error">Pay Step field required</div>


        <label> Tour:</label>
        <input id="tour" type="text" value="<?php echo $tour = $results["tour"]; ?>" name="tour" size="10" maxlength="10">

        <div class="error" id="tour-error">Tour field required</div>
        <div class="input-spacing">
          <h3> Days Off(check all applicable boxes):</h3><br>
        <input type="checkbox" name="daysOff[]" value="Saturday"
        <?php if($results["firstdayOff"] === "Saturday" || $results["secondDayOff"] === "Saturday")
         { echo " checked";} ?>> Saturday
        <input type="checkbox" name="daysOff[]" value="Sunday"
        <?php if($results["firstdayOff"] === "Sunday" || $results["Sunday"] === "Saturday")
         { echo " checked";} ?>> Sunday
        <input type="checkbox" name="daysOff[]" value="Monday"
        <?php if($results["firstdayOff"] === "Monday" || $results["secondDayOff"] === "Monday")
         { echo " checked";} ?> > Monday
        <input type="checkbox" name="daysOff[]" value="Tuesday"
        <?php if($results["firstdayOff"] === "Tuesday" || $results["secondDayOff"] === "Tuesday")
         { echo " checked";} ?> > Tuesday
        <input type="checkbox" name="daysOff[]" value="Wednesday"
        <?php if($results["firstdayOff"] === "Wednesday" || $results["secondDayOff"] === "Wednesday")
         { echo " checked";} ?> > Wednesday
        <input type="checkbox" name="daysOff[]" value="Thursday"
        <?php if($results["firstdayOff"] === "Thursday" || $results["secondDayOff"] === "Thursday")
         { echo " checked";} ?> > Thursday
        <input type="checkbox" name="daysOff[]" value="Friday"
        <?php if($results["firstdayOff"] === "Friday" || $results["secondDayOff"] === "Friday")
         { echo " checked";} ?> > Friday
        </div>
        <div class="error" id="daysOff-error">Days Off field required</div>
        <br>
        <select name="veteranStatus" class="veteranStatus" id="drop-down-menu">
              <option value="value="<?php echo $veteran = $results["veteranStatus"]; ?>"">Veteran Status</option>

              <option value="Yes">Yes</option>

                <option value="NO">No</option>

             </select>
        <div class="error" id="veteranStatus-error">Veteran Status field required</div>
        <br>
        <select name="layOffProtected" class="layOffProtected" id="drop-down-menu">
                 <option value="value="<?php echo $layOff = $results["layOffProtected"]; ?>"">Layoff Protected</option>

                 <option value="YES">Yes</option>

                   <option value="NO">No</option>

                </select>
        <div class="error" id="layOffProtected-error">Lay-Off Protected field required</div>


        <label> Current Password:</label>
        <input id="passwordField1" type="password" name="password1" size="20" maxlength="120">

        <div class="error" id="password1-error">To change password please enter current password.</div>

        <label> New Password:</label>
        <input id="passwordField2" type="password" name="password2" size="20" maxlength="120">

        <div class="error" id="password2-error">To change password please enter new password.</div>

        <label>Reenter New Password:<label>
                    <input id="passwordField3" type="password" name="password3" size="20" maxlength="120">

                <div class="error" id = "password3-error">Passwords must match.</div>
<br>
                <input id="submit" type="submit" value="Save changes">
                <div class="warnings">There were errors found in your submission</div>
</form>
</div>
<footer class="sticky-footer"><p><small>&copy; 2017 American Postal Workers Union</a></small></p></footer>
<?php unset($_SESSION['message']); ?>
</html>
