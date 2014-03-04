<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Add/Delete a Record with jQuery Fade In/Fade Out</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>

<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refreshMe").everyTime(1000,function(i){
			j.ajax({
			  url: "functions/getHeartRate.php",
			  cache: false,
			  success: function(html){
				j(".refreshMe").html(html);
			  }
			})
		})
	});
   j('.refreshMe').css({color:"red"});
});



</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
		$patientID = $_GET["id"] ;
		echo "<h1>Hello " . $_GET["id"] . "</h1>";
?>

<div class="refreshMe">Heart Rate</div>
</body>
</html>
