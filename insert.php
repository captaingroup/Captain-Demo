<?php
$username="root@localhost";
$password="";$database="captain";
$patientName=$_POST['Value1'];
$patientAge=$_POST['Value2'];
$medicalCondition=$_POST['Value3'];
$dateAdmitted=$_POST['Value4'];
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query = "INSERT INTO hearthospital VALUES('','$field1-name','$field2-name',
'$field3-name','$field4-name')";mysql_query($query);mysql_close();?>
