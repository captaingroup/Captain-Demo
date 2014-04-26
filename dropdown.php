<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		
		
		<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="js/modernizr.custom.63321.js"></script>
	</head>
	<body>
    <script>
	$(document).ready(function requestData2() {
				var gauge = $('#linearGaugeContainer').dxLinearGauge('instance');
				
				$.ajax({
            		url: 'functions/live-server-data2.php?id=<?php echo $patientID;?>', 
            		success: function(point) {
            			gauge.value(point);
						val = val + 1;
                		setTimeout(requestData2, 1000);  
            		},
            		cache: false
        			});
		});
		</script>
        
        
        
        
        
        
        
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
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.dropdown.js"></script>
		<script type="text/javascript">
			
			$( function() {
				
				$( '#cd-dropdown' ).dropdown( {
					gutter : 5
				} );

			});

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
    $sql_select = "SELECT * FROM `3-Patient`";
    $stmt = $conn->query($sql_select);
    $patients = $stmt->fetchAll(); 
    if(count($patients) > 0) {
        foreach($patients as $patient) {
			
			$patientID = $patient['Patient ID'];
			$patientName = $patient['Patient Name'];
			$patientAge = $patient['Age'];
			$medicalCondition = $patient['Medical Condition'];
			$dateAdmitted = $patient['Date Admitted'];
			
			echo "<script>
			
			id = '$patientID';
			name = '$patientName';
			age = '$patientAge';
			medicalCondition = '$medicalCondition';
			dateAdmitted = '$dateAdmitted';
			
			add_fields();
	
	 </script>";
        }
    } else {
    }
?>
        <script>
		function add_fields() {
		var newspan = document.createElement('span');
    		newspan.innerHTML = '<option value="6" class="icon-elephant">Elephant</option>';
    		document.getElementById('cd-dropdown').appendChild(newspan);
		}
        </script>
	</body>
</html>
