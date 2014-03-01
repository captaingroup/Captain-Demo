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
    		<ul class="list">
       			<li>
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
	$(document).ready(function(){
  		$('#list li:nth-child(odd)').addClass('listAlternate');
	});
	</script>
    
    
    
    <form method="post" action="index.php" enctype="multipart/form-data" >
      Name  <input type="text" name="name" id="name"/></br>
      Email <input type="text" name="email" id="email"/></br>
      Company <input type="text" name="company" id="company"/></br>
      <input type="submit" name="submit" value="Submit" />
</form>
<?php
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    $host = "eu-cdbr-azure-west-b.cloudapp.net";
    $user = "be224999e5fadd";
    $pwd = "103685ae";
    $db = "uclsystAzPBrx7bc";
    // Connect to database.
    try {
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e){
        die(var_dump($e));
    }
    // Insert registration info
    if(!empty($_POST)) {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
	$company = $_POST['company'];
        $date = date("Y-m-d");
        // Insert data
        $sql_insert = "INSERT INTO registration_tbl (name, email, company, date) 
                   VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
	$stmt->bindValue(3, $company);
        $stmt->bindValue(4, $date);
        $stmt->execute();
    }
    catch(Exception $e) {
        die(var_dump($e));
    }
    echo "<h3>Your're registered!</h3>";
    }
    // Retrieve data
    $sql_select = "SELECT * FROM registration_tbl";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
        echo "<h2>People who are registered:</h2>";
        echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
	echo "<th>Company</th>";
        echo "<th>Date</th></tr>";
        foreach($registrants as $registrant) {
			
			$test = $registrant['name'];
			
			echo "<script> 
			var spge = '<?php echo $test ;?>';
			
			patients.add( { patientID: '2651994780', patientName: document.write(spge), patientAge:'19', medicalCondition: 'Atherosclerosis', dateAdmitted: '26/05/1994' } ); </script>";

            echo "<tr><td>".$registrant['name']."</td>";
            echo "<td>".$registrant['email']."</td>";
	    echo "<td>".$registrant['company']."</td>";
            echo "<td>".$registrant['date']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
?>
    

</section>

</body>
</html>
