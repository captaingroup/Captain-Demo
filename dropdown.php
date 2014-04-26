<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		
		
		<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="js/modernizr.custom.63321.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.dropdown.js"></script>
        </head>
	<body>
        
        
        
        
        
        
        
		<div class="container">	
					
			
			<section class="main clearfix">
				
				<div class="fleft">
					<select id="cd-dropdown" name="cd-dropdown" class="cd-select">
						<option value="-1" selected>Select Sensor Group</option>
						<option value="1" class="icon-monkey">Monkey</option>
						<option value="2" class="icon-bear">Bear</option>
						<option value="3" class="icon-squirrel">Squirrel</option>
						<option value="4" class="icon-elephant">Elephant</option>
                        <option value="4" class="icon-elephant">Elephant</option>
					</select>
				</div>
			</section>
		</div><!-- /container -->
		
		<script type="text/javascript">
			
			$( function() {
				
				$( '#cd-dropdown' ).dropdown( {
					gutter : 5
				} );

			});

		var myobject = {
    ValueA : 'Text A',
    ValueB : 'Text B',
    ValueC : 'Text C'
};

var select = document.getElementById("cd-dropdown");
for(index in myobject) {
    select.options[select.options.length] = new Option(myobject[index], index);
}
		
		</script>
        
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
			
			id = '$groupID';
			name = '$groupName';
			
			var myobject = {
    id : name
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
	</body>
</html>
