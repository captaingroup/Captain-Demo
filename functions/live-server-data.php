    <?php
	$sensorID = $_GET["id"] ;
	
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
    $sql_select = "SELECT `Data` FROM `Data` WHERE `SensorID` = ".$sensorID." ORDER BY `Timestamp` DESC LIMIT 1";
    $stmt = $conn->query($sql_select);
    $sensors = $stmt->fetchAll(); 
    if(count($sensors) > 0) {
        foreach($sensors as $sensor) {
			
			// Set the JSON header
header("Content-type: text/json");

// The x value is the current JavaScript time, which is the Unix time multiplied by 1000.
$x = time() * 1000;
// The y value is a random number
$y = $sensor['Data']+0;

// Create a PHP array and echo it as JSON
$ret = array($x, $y);
echo json_encode($ret);

        }
    } else {
    }
	
	

?>
