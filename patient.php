<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Add/Delete a Record with jQuery Fade In/Fade Out</title>
<link href="css/stylesheet.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>

<?php
		$patientID = $_GET["id"] ;
		echo "<h1>Hello " . $_GET["id"] . "</h1>";
?>


<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".heartRateData").everyTime(1000,function(i){
			j.ajax({
			  url: "functions/getHeartRate.php?id=<?php echo $patientID;?>",
			  cache: false,
			  success: function(html){
				j(".heartRateData").html(html);
			  }
			})
		})
	});
   j('.heartRateData').css({color:"red"});
   
   var a = jQuery.noConflict();
	a(document).ready(function()
	{
		a(".bloodPressureData").everyTime(1000,function(i){
			a.ajax({
			  url: "functions/getBloodPressure.php?id=<?php echo $patientID;?>",
			  cache: false,
			  success: function(html){
				a(".bloodPressureData").html(html);
			  }
			})
		})
	});
   a('.bloodPressureData').css({color:"red"});
});



</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="dataContainer">
	<div class="patientLiveDataContainer">
    	<div class="ecgGraphData"><h6>hi</h6></div>
        <div class="otherDataContainer">
        	<div class="heartRateData"></div>
            <div class="bloodPressureData"></div>
            <div class="oxygenSaturationData"><h6>hi</h6></div>
            <div class="waterContentData"><h6>hi</h6></div>
        </div>
    </div>
    <div class="otherPatientDataContainer"><h6>hi</h6></div>
</div>

</body>
</html>
