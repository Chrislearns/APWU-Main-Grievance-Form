# APWU-Main-Grievance-Form

This web applications intended use is for the employees of the United States Postal Service including all members of the American Postal Workers Union. The process of filing grievances is extremely outdated. The current process utilizes a ton of paper work and provides no potential for feedback during the arbitration process. The purpose of this applications is to provide one locations to file grievances, update employee info, update status info, and create a community supported by the APWU.

******AGENDA*******

----1.RegEx validation

----2.Update info PHP validation/display database info

----3.Sessions/Cookies

----4.Sanitize Inputs to prevent SQL injections

5.Rewrite/Refactor code PHP/JavaScript/CSS files

----6.Create admin login page to view and query grievances

7.Create success page or message upon grievance submission

8.Rewrite procedural PHP to Object Oriented PHP

9.Use PHP Mailer to send emails to tour specific shop stewards

10.Rewrite in laravel....

----11.Use php Filters to validate form inputs

----12.Server side validation



Resources:

PHP for the Web: Visual Quick Start guide

Learning PHP 7

Learning PHP, MySQL, JavaScript,

CSS & HTML5

Pro PHP and jQuery

http://php.net/manual/en/pdo.prepared-statements.php

https://stackoverflow.com/questions/10908561/mysql-meaning-of-primary-key-unique-key-and-key-when-used-together-whil

https://geeksww.com/tutorials/database_management_systems/mysql/tips_and_tricks/mysql_primary_key_vs_unique_key_constraints.php

https://stackoverflow.com/questions/16200254/best-way-to-use-pdo-in-procedural-environment

https://stackoverflow.com/questions/17408605/mysqli-procedural-vs-pdo

https://stackoverflow.com/a/14112684/285587

SQL code for table creation no longer relevant. Will update when signup.html and userspage.html are complete.

http://php.net/manual/en/function.password-hash.php
<<<<
Must learn about password encryption before sql table completion.






CREATE Database grievanceInfo;

USE grievanceInfo;

CREATE TABLE unionStewards(

  id int(11) AUTO_INCREMENT PRIMARY KEY not null,
  name varchar(128) not null,
  email varchar(128) not null,
  tour int(2) not null
);

CREATE TABLE userAccounts (
  admin boolean not null default 0,
	full_name varchar(128) NOT null,
	email varchar(128) NOT null,
	PASSWORD varchar(128) NOT null,
	PRIMARY KEY(email)
	);

	CREATE TABLE UserSignUp (

			employee_id int(8) PRIMARY KEY NOT null,
	    employee_type varchar(28) NOT null,
	    address varchar(128) NOT null,
	    city varchar(28) NOT null,
	    state varchar(28) NOT null,
	    zip_code int(10) NOT null,
	    phone_number varchar(10) NOT null,
	    seniority_date varchar(10) NOT null,
	    pay_level varchar(10) NOT null,
	    pay_step varchar(10) NOT null,
	    tour int(3) NOT null,
	    first_day_off varchar(28) NOT null,
	    second_day_off varchar(28) ,
	    veteran_status varchar(10) NOT null,
	    layoff_protected varchar(10) NOT null,
			email varchar(128) NOT null

		);

			CREATE TABLE filedGrievances (

				id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
	      employee_id int(8) not null,			
				date varchar(10) NOT null,
				machine_number int(3) NOT null,
				time_alone varchar(28) NOT null,
				supervisor_name varchar(128) NOT null,
				feed_sweep varchar(10) NOT null,
				mailProcessed int(11) NOT null,
				time_help_received varchar(10) ,
				time_help_swept_machine varchar(10),
				time_worked_alone int(2) NOT null,
				minutes_worked_alone int(2),
				resolved varchar(255),
				comments varchar(1000)


				)
