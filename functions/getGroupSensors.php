    <?php
	$groupName = $_GET['id'] ;
	
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
    $sql_select = "SELECT `Device Name`, `Reading` FROM `4-Sensors` WHERE `Patient ID` = '00000000' AND `Device Name` = 'Heart Rate' ORDER BY `Time Stamp` DESC LIMIT 1";
    $stmt = $conn->query($sql_select);
//    $groupIDs = $stmt->fetchAll();
	// Set the JSON header
//	header("Content-type: text/json"); 
//	$arrayIDs = array();
//	echo "bello";
//   if(count($groupIDs) > 0) {
//        foreach($groupIDs as $groupID) {
	//		$sql_select2 = "SELECT `SensorID` FROM `SensorGroup` WHERE `GroupID` = ".$groupID." ";
   		//	$stmt2 = $conn->query($sql_select);
    //		$sensorIDs = $stmt2->fetchAll(); 
	//		if(count($sensorIDs) > 0) {
	//			foreach($sensorIDs as $sensorID) {
	//				array_push($arrayIDs, $sensorID);
	//				echo "hello";
	//			}
	//		}
     //   }
    //} else {
    //}
	//echo json_encode($arrayIDs);	
	echo $groupName;

?>
