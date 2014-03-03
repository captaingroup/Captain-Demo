<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient</title>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
       <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
        
       <script type="text/javascript">
               $(document).ready(function(){
 
                    function showComment(){
                      $.ajax({
                        type:"post",
                        url:"functions/getHeartRate.php",
                        data:"action=showcomment",
                        success:function(data){
                             $("#comment").html(data);
                        }
                      });
                    }
 
                    showComment();
 
 
                    $("#button").click(function(){
 
                          var name=$("#name").val();
                          var message=$("#message").val();
 
                          $.ajax({
                              type:"post",
                              url:"process.php",
                              data:"name="+name+"&message="+message+"&action=addcomment",
                              success:function(data){
                                showComment();
                                  
                              }
 
                          });
 
                    });
               });
       </script>

</head>

<body>

<ul id="comment"></ul>

<!--	<?php
	while (@ob_end_flush());
		$patientID = $_GET["id"] ;
		echo "<h1>Hello " . $_GET["id"] . "</h1>";
		
		// DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    $host = "sql3.freemysqlhosting.net";
    $user = "sql331497";
    $pwd = "sI2*yG2*";
    $db = "sql331497";
    // Connect to database.
    try {
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e){
        die(var_dump($e));
		echo 'did not work';
    }
    
    // Retrieve data
    $sql_select = "SELECT * FROM `3-Patient` WHERE `Patient ID` = " .$patientID;
    $stmt = $conn->query($sql_select);
    $patients = $stmt->fetchAll(); 
    if(count($patients) > 0) {
        foreach($patients as $patient) {
			
			$patientName = $patient['Patient Name'];
			$patientAge = $patient['Age'];
			$medicalCondition = $patient['Medical Condition'];
			$dateAdmitted = $patient['Date Admitted'];
			
			echo $patientID;
			echo $patientName;
			echo $patientAge;
			echo $medicalCondition;
			echo $dateAdmitted;
			
        }
    } else {
    }
	
	$active = 1;
	while($active = 1){
		$result = "SELECT `Device Name`, `Reading` FROM `4-Sensors` WHERE `Patient ID` = ".$patientID." ORDER BY `Time Stamp` DESC LIMIT 1"; 
		$stmt = $conn->query($result);
    	$readings = $stmt->fetchAll();
		
		if(count($readings) > 0) {
			foreach($readings as $reading) {
				$sensorName = $reading['Device Name'];
				$sensorReading = $reading['Reading'];
				
				echo $sensorName. " " .$sensorReading;	
			}
		}
		
	}
	
	
	?>
    
    !-->

</body>
</html>