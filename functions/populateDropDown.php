<?php
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
    $sql_select = "SELECT * FROM `GroupInformation`";
    $stmt = $conn->query($sql_select);
    $groups = $stmt->fetchAll(); 
    if(count($groups) > 0) {
        foreach($groups as $group) {
			
			$groupID = $group['ID'];
			$groupName = $group['Name'];
			
			echo "<script>
			alert('$groupID');
			id = '$groupID';
			name = '$groupName';
			
			var myobject = {
    		'$groupID' : name
			};

			var select = document.getElementById('cd-dropdown');
			for(index in myobject) {
    			select.options[select.options.length] = new Option(myobject[index], index);
			}
			</script>";
        }
    } else {
    }
?>