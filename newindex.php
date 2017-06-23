
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale=1">

    <title>APWU Grievances</title>

    <script src="https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="myscripts.js">
    </script>

    <link rel="stylesheet" href="main.css">
</head>
<header>

    <p id="brand">APWU Grievance Form</p>

</header>

<body>


    <div class="overlay">
        <div class="success">
            <h1>Grievance recieved!</h1>
            <p>Don't forget to support your union!</p>
            <p><a class="close" href="#">Close Window</a></p>
        </div>
    </div>
    <div id="form-border">
        <form id="myForm" action="submission.php" method="POST">
            <h3> Full Name:</h3>
            <input id="full-name" type="text" name="Full Name" size="28" maxlength="128">

            <select name="Employee Status" id="drop-down-menu">
              <option value="FTR">Full Time Regular</option>
          
                <option value="PTR">Part Time Regular</option>
              
              <option value="PSE">Postal Support Employee</option>
        
             </select>
            <div class="input-spacing">
                <h3>Date of Grievance (mm/dd/yy):</h3>
                <input id="grievance-date" type="text" name="grievance-date" size="10" maxlength="10">
            </div>
            <div class="input-spacing">
                <h3> Address:</h3>
                <input id="address" type="text" name="address" size="50" maxlength="80">
            </div>
            <div class="input-spacing">
                <h3> City:</h3>
                <input id="city" type="text" name="city" size="25" maxlength="50">
            </div>
            <div class="input-spacing">
                <h3> State:</h3>
                <input id="state" type="text" name="state" size="25" maxlength="25">
            </div>
            <div class="input-spacing">
                <h3> Employee ID:</h3>
                <input id="eid" type="text" name="eid" size="8" maxlength="8">
            </div>
            <div class="input-spacing">
                <h3> Phone Number:</h3>
                <input id="phone-number" type="text" name="phone" size="11" maxlength="11">
            </div>
            <div class="input-spacing">
                <h3> Seniority Date(mm/dd/yy):</h3>
                <input id="seniority" type="text" name="seniority" size="10" maxlength="10">
            </div>
            <div class="input-spacing">
                <h3> Machine #</h3>
                <input id="seniority" type="text" name="seniority" size="2" maxlength="10">
            </div>
            <div class="input-spacing">
                <h3>I worked alone from<br>(Example: 11:45pm until 1:20am)</h3><br>
                <input id="time-alone" type="text" name="time-alone" size="20" maxlength="10">
            </div>
            <br>
            <div class="input-spacing">
                <h3>I had to feed and sweep the machine myself</h3>
                <input type="radio" name="radio" value="Yes">Yes <input type="radio" name="radio" value="No">No
            </div>
            <br>
            <div class="input-spacing">
                <h3>I worked approximatedly <input id="mail-processed" type="number" name="mail-processed" size="5" maxlength="10"> pieces of mail during the time I worked alone.</h3>
                <br> <br>
            </div>
            <div class="input-spacing">
                <h3>I did receive help at approximately <input id="time-helped" type="text" name="time-helped" size="5" maxlength="10"> <br>this person only swept the machine which took about <input id="time-swept" type="number" name="time-swept" size="5" maxlength="10" placeholder="Minutes"> then I worked by myself again.</h3>

            </div>
            <br>
            <div class="input-spacing">
                <h3>I worked alone for a total of <br><input id="hour-worked-alone" type="number" name="hours-worked-alone" size="2" maxlength="2" placeholder="Hours"> and <input id="time-swept" type="number" name="time-swept" size="5" maxlength="10" placeholder="Minutes"> <br> on the above date and machine.</h3>

            </div>
            <input id="submit" type="submit" value="Submit Grievance">
             <?php
       
 require_once ('grievance.php');
 require_once ('user.php');
 require_once ('viewUser.php');
      
        
   $users = new viewUser();
   $users->showAllUsers();
        ?>     
        </form>
    </div>
</body>

</html>
