APWU Grievance Reporting System 

File Structure
Index.php - the control panel
If the session is not established, we forward them off to login.php
Essentially the grievance reporting administrative panel/portal
Allows users to:
Update account info
Report grievance
Delete/rescind grievance 
ADMIN USERS ONLY - View all filed grievances 
Administrative abilities 
Update account info > update_account.php 
File grievance > file_grievance.php 
View/Edit grievances
If super admin > view all grievances 
??? come up with a system to monitor progress 
login.php
Login
Register - included in the same page 
The entire registration/user info form 
logout.php
Destroy session
Logout screen 
Button to log back in
account-info.php
Update account info 
create-grievance.php 
Ability grievances 
edit-grievances.php
Edit all grievances 
grievance.php
View individual grievance
Use get id to pull individual grievance from DB 
grievance-success.php 
Confirm to user that grievance was filed
Send email to specific shop steward that grievance was filed


view-all-grievances.php > SUPER ADMIN ONLY 
Session will check privleges 


DB Tables

users table 
id (int) => primary key, ai
employeeID int(8) PRIMARY KEY NOT null,
fullName varchar(128) NOT null,
employeeType varchar(28) NOT null,
address varchar(128) NOT null,
city varchar(28) NOT null,
state varchar(28) NOT null,
zipcode int(10) NOT null,
phoneNumber int(10) NOT null,
seniorityDate varchar(10) NOT null,
payLevel varchar(10) NOT null,
payStep varchar(10) NOT null,
tour int(3) NOT null,
daysOff varchar(28) NOT null,
veteranStatus varchar(10) NOT null,
layOffProtected varchar(10) NOT null,
Admin user ===> We can just update it manually update in the DB 


grievances 
id => primary key, ai (int)
employeeID (int)
date (date)
machineNumber (int)
timeAlone (varchar)
supervisorName (varchar)
feedAndSweep (varchar)
mailProcessed (int)
timeHelpReceieved (varchar)
timeHelpSweptMachine (varchar)
hoursWorkedAlone (int)
minutesWorkedAlone (int)
FOREIGN KEY(id) REFERENCES UserSignUp(id),
			FOREIGN KEY(employeeID)





