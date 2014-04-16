<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Captain - Temperature Example</title>
<link href="css/stylesheet.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<?php
		$patientID = $_GET["id"] ;
?>


<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>


<script>
	var chart;
	function requestData() {
        $.ajax({
            url: 'functions/live-server-data.php?id=<?php echo $patientID;?>', 
            success: function(point) {
                var series = chart.series[0],
                    shift = series.data.length > 20; // shift if the series is longer than 20

                // add the point
                chart.series[0].addPoint(eval(point), true, shift);

                // call it again after one second
                setTimeout(requestData, 1000);  
            },
            cache: false
        });
    }
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                defaultSeriesType: 'spline',
                events: {
                    load: requestData
                }
            },
            title: {
                text: 'Live random data'
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150,
                maxZoom: 20 * 1000
            },
            yAxis: {
                minPadding: 0.2,
                maxPadding: 0.2,
                title: {
                    text: 'Value',
                    margin: 80
                }
            },
            series: [{
                name: 'Random data',
                data: []
            }]
        });     
    });
</script>
	
<div id="weatherHeader" class="weatherHeader"></div>

<div class="chartContainer">
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
</div>

</body>
</html>
