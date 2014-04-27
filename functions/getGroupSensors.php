    <?php
	//$groupName = urldecode($_GET["id"]) ;
	
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
    $sql_select = "SELECT `GroupID` FROM `GroupInformation` WHERE `GroupName` = 'Group 123' ";
    $stmt = $conn->query($sql_select);
    $groupIDs = $stmt->fetchAll(); 
	$arrayIDs = array();
    if(count($groupIDs) > 0) {
        foreach($groupIDs as $groupID) {
			$sql_select = "SELECT `SensorID` FROM `SensorGroup` WHERE `GroupID` = ".$groupID." ";
   			$stmt = $conn->query($sql_select);
    		$sensorIDs = $stmt->fetchAll(); 
			if(count($sensorIDs) > 0) {
				foreach($sensorIDs as $sensorID) {
					array_push($arrayIDs, $sensorID);
				}
			}
        }
    } else {
    }
	echo json_encode($arrayIDs);	
	

?>
