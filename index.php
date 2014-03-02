<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Heart Hospital</title>
<link href="css/stylesheet.css" rel="stylesheet">
<script src="http://listjs.com/no-cdn/list.js"></script> 

</head>

<body>


<section id="loginBar"></section>

<section id="currentlyAdmittedPatients">
	
	<div id="patients">

		<div class="CAPHeaderBar">
    		<div class="CAPHeaderBarTitle"><p>Currently Admitted Patients</p></div>
        	<div class="CAPHeaderBarSearch"><input class="search" /></div>
    	</div>
    
    	<div class="CAPColumnHeadingsBar">
    		<div class="CAPColumnTitle"><span class="sort" data-sort="patientID">Patient ID</span></div>
        	<div class="CAPColumnTitle"><span class="sort" data-sort="patientName">Patient Name</span></div>
    		<div class="CAPColumnTitle"><span class="sort" data-sort="patientAge">Age</span></div>
    		<div class="CAPColumnTitle"><span class="sort" data-sort="medicalCondition">Medical Condition</span></div>
    		<div class="CAPColumnTitle"><span class="sort" data-sort="dateAdmitted">Date Admitted</span></div>
    	</div>

		<div class="CAPRows">
    		<ul id="list" class="list">
       			<li id="hey">
           			<p class="patientID">0123456789</p>
           			<p class="patientName">Jonny Walthstow</p>
           			<p class="patientAge">25</p>
           			<p class="medicalCondition">Atherosclerosis</p>
           			<p class="dateAdmitted">01/01/14</p>
       			</li>
       			<li>
           			<p class="patientID">1234567890</p>
           			<p class="patientName">Jamie Berlin</p>
           			<p class="patientAge">22</p>
           			<p class="medicalCondition">Atherosclerosis</p>
           			<p class="dateAdmitted">01/01/13</p>
       			</li>
    		</ul>
    	</div>
	</div>
    

	<script>
	var options = {
    	valueNames: [ 'patientID', 'patientName', 'patientAge', 'medicalCondition', 'dateAdmitted']
	};

	var patients = new List('patients', options);
	patients.add( { patientID: '2651994780', patientName: 'Aditya Gandhi', patientAge:'19', medicalCondition: 'Atherosclerosis', dateAdmitted: '26/05/1994' } );
	patients.add( { patientID: '2651994780', patientName: 'Aditya Gandhi', patientAge:'19', medicalCondition: 'Atherosclerosis', dateAdmitted: '26/05/1994' } );

	</script>
    
    <script> 
			spge = "hello";
			
			patients.add( { patientID: '2651994780', patientName: spge, patientAge:'19', medicalCondition: 'Atherosclerosis', dateAdmitted: '26/05/1994' } ); </script>

	<script>
	$(document).ready(function(){
  		$('#list li:nth-child(odd)').addClass('listAlternate');
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
			
			patients.add( { patientID: id, patientName: name, patientAge:age, medicalCondition: medicalCondition, dateAdmitted: dateAdmitted } ); </script>";
        }
    } else {
    }
?>
    
    <script type="text/javascript">
    // locate your element and add the Click Event Listener
    document.getElementById("list").addEventListener("click",function(e) {
        // e.target is our targetted element.
                    // try doing console.log(e.target.nodeName), it will result LI
        if(e.target && e.target.nodeName == "LI") {
            console.log(e.target.id + " was clicked");
        }
    });
</script>


</section>

</body>
</html>
