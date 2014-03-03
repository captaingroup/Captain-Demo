<?php
########## MySql details (Replace with yours) #############
$username = "sql331497"; //mysql username
$password = "sI2*yG2*"; //mysql password
$hostname = "sql3.freemysqlhosting.net"; //hostname
$databasename = 'sql331497'; //databasename

//connect to database
$connecDB = mysql_connect($hostname, $username, $password)or die('could not connect to database');
mysql_select_db($databasename,$connecDB);

?>