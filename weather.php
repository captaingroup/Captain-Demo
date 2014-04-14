<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Captain - Temperature Example</title>
<link href="css/stylesheet.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script src="javascript/Chart.js"></script>

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
   j('.heartRateData').css({color:"black"});
   
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
   a('.bloodPressureData').css({color:"black"});
   
   var b = jQuery.noConflict();
	b(document).ready(function()
	{
		b(".oxygenSaturationData").everyTime(1000,function(i){
			b.ajax({
			  url: "functions/getOxygenSaturation.php?id=<?php echo $patientID;?>",
			  cache: false,
			  success: function(html){
				b(".oxygenSaturationData").html(html);
			  }
			})
		})
	});
   b('.oxygenSaturationData').css({color:"black"});
   
   var c = jQuery.noConflict();
	c(document).ready(function()
	{
		c(".waterContentData").everyTime(60000,function(i){
			c.ajax({
			  url: "functions/getWaterContent.php?id=<?php echo $patientID;?>",
			  cache: false,
			  success: function(html){
				c(".waterContentData").html(html);
			  }
			})
		})
	});
   c('.waterContentData').css({color:"black"});
});



</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<canvas id="myChart" height="450" width="600"></canvas>



<script>
$(document).ready(function(){
  var count = 10;
  var data = {
	  labels : ["1","2","3","4","5", "6", "7", "8", "9", "10"],
		datasets : [
		  {
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				data : [65,59,90,81,56,45,30,20,3,37]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				data : [28,48,40,19,96,87,66,97,92,85]
			}
		]
  }
  // this is ugly, don't judge me
  var updateData = function(oldData){
    var labels = oldData["labels"];
    var dataSetA = oldData["datasets"][0]["data"];
    var dataSetB = oldData["datasets"][1]["data"];
    
    labels.shift();
    count++;
    labels.push(count.toString());
    var newDataA = dataSetA[9] + var a = jQuery.noConflict();
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
	});;
    var newDataB = dataSetB[9] + (20 - Math.floor(Math.random() * (41)));
    dataSetA.push(newDataA);
    dataSetB.push(newDataB);
    dataSetA.shift();
    dataSetB.shift();    };
      
  var optionsAnimation = {
    //Boolean - If we want to override with a hard coded scale
    scaleOverride : true,
    //** Required if scaleOverride is true **
    //Number - The number of steps in a hard coded scale
    scaleSteps : 10,
    //Number - The value jump in the hard coded scale
    scaleStepWidth : 10,
    //Number - The scale starting value
    scaleStartValue : 0
  }
  
  // Not sure why the scaleOverride isn't working...
  var optionsNoAnimation = {
    animation : false,
    //Boolean - If we want to override with a hard coded scale
    scaleOverride : true,
    //** Required if scaleOverride is true **
    //Number - The number of steps in a hard coded scale
    scaleSteps : 20,
    //Number - The value jump in the hard coded scale
    scaleStepWidth : 10,
    //Number - The scale starting value
    scaleStartValue : 0
  }
  
  //Get the context of the canvas element we want to select
  var ctx = document.getElementById("myChart").getContext("2d");
  var optionsNoAnimation = {animation : false}
  var myNewChart = new Chart(ctx);
  myNewChart.Line(data, optionsAnimation);	
  
  setInterval(function(){
    updateData(data);
    myNewChart.Line(data, optionsNoAnimation)
    ;}, 2000
  );
});


</script>	
	
	


</body>
</html>
