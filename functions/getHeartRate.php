<?php
  mysql_connect("sql3.freemysqlhosting.net","sql331497","sI2*yG2*");
  mysql_select_db("sql331497");
 
   
  $action=$_POST["action"];
 
  if($action=="showcomment"){
     $show=mysql_query("SELECT `Device Name`, `Reading` FROM `4-Sensors` WHERE `Patient ID` = 00000000 ORDER BY `Time Stamp` DESC LIMIT 1");
 
     while($row=mysql_fetch_array($show)){
        echo "<li><b>$row[name]</b> : $row[message]</li>";
     }
  }
  
  