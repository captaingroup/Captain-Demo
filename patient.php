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
		j(".heartRateDataContent").everyTime(1000,function(i){
			j.ajax({
			  url: "functions/getHeartRate.php?id=<?php echo $patientID;?>",
			  cache: false,
			  success: function(html){
				j(".heartRateDataContent").html(html);
			  }
			})
		})
	});
   j('.heartRateDataContent').css({color:"red"});
   
   var a = jQuery.noConflict();
	a(document).ready(function()
	{
		a(".bloodPressureDataContent").everyTime(1000,function(i){
			a.ajax({
			  url: "functions/getBloodPressure.php?id=<?php echo $patientID;?>",
			  cache: false,
			  success: function(html){
				a(".bloodPressureDataContent").html(html);
			  }
			})
		})
	});
   a('.bloodPressureDataContent').css({color:"red"});
   
   var b = jQuery.noConflict();
	b(document).ready(function()
	{
		b(".oxygenSaturationDataContent").everyTime(1000,function(i){
			b.ajax({
			  url: "functions/getOxygenSaturation.php?id=<?php echo $patientID;?>",
			  cache: false,
			  success: function(html){
				b(".oxygenSaturationDataContent").html(html);
			  }
			})
		})
	});
   b('.oxygenSaturationDataContent').css({color:"red"});
   
   var c = jQuery.noConflict();
	c(document).ready(function()
	{
		c(".waterContentDataContent").everyTime(60000,function(i){
			c.ajax({
			  url: "functions/getWaterContent.php?id=<?php echo $patientID;?>",
			  cache: false,
			  success: function(html){
				c(".waterContentDataContent").html(html);
			  }
			})
		})
	});
   c('.waterContentDataContent').css({color:"red"});
});



</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="dataContainer">
	<div class="patientLiveDataContainer">
    	<div class="ecgGraphData"><h6>hi</h6></div>
        <div class="otherDataContainer">
        	<div class="heartRateData">
            	<div class="liveDataTitle"><h6>Heart Rate</h6></div>
                <div class="heartRateDataContent"></div>
            </div>
            <div class="bloodPressureData">
            	<div class="liveDataTitle"><h6>Blood Pressure</h6></div>
                <div class="bloodPressureDataContent"></div>
            </div>
            <div class="oxygenSaturationData">
            	<div class="liveDataTitle"><h6>Oxygen Saturation</h6></div>
                <div class="oxygenSaturationDataContent"></div>
            </div>
            <div class="waterContentData">
            	<div class="liveDataTitle"><h6>Water Content</h6></div>
                <div class="waterContentDataContent"></div>
            </div>
        </div>
    </div>
    <div class="otherPatientDataContainer"><h6>hi</h6></div>
</div>

</body>
</html>
