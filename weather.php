<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Captain - Temperature Example</title>
<link href="css/stylesheet.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="javascript/jquery-1.10.2.min.js"></script>
<script src="javascript/globalize.min.js"></script>
<script src="javascript/dx.chartjs.js"></script>

<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="js/modernizr.custom.63321.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.dropdown.js"></script>

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
                text: 'Live Temperature Data'
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
	
    
	<script>			
		$(function (){
   			$('#linearGaugeContainer').dxLinearGauge({
			scale: {
				startValue: 0,
				endValue: 150,
				majorTick: {
					tickInterval: 10
				},
				minorTick: {
					visible: true,
					tickInterval: 2
				}
			},
			title: {
				text: 'Wind-O-Meter',
				font: { size: 28 }
			},
			tooltip: {
				enabled: true
			},
			rangeContainer: {
        		ranges: [{
                	startValue: 0,
                	endValue: 30,
                	color: '#1E90FF'
            	}, {
                	startValue: 30,
                	endValue: 80,
                	color: '#EEC900'
            	}, {
                	startValue: 80,
                	endValue: 120,
                	color: '#FF9912'
            	}, {
                	startValue: 120,
                	endValue: 200,
                	color: '#EE2C2C'
            	}
        	]},
			valueIndicator: { color: '#8E388E', offset: 10 },
			value: 2	
			});
		});	

		var val = 0;
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
	<div id="weatherHeader" class="weatherHeader"><h6 class="weatherHeaderText">Captain - Weather Demo</h6></div>

	<div class="container">
		<section class="main clearfix">		
			<div class="fleft">
				<select id="cd-dropdown" name="cd-dropdown" class="cd-select">
					<option value="-1" selected>Select Sensor Group</option>
					<option value="1" class="icon-star">Monkey</option>
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
    		'$groupID' : name
			};

			var select = document.getElementById('cd-dropdown');
			for(index in myobject) {
				opt = new Option(myobject[index], index);
				opt.className = 'icon-star';
    			select.options[select.options.length] = opt;
			}
			</script>";
        }
    } else {
    }
?>
    

	<div class="chartContainer">
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</div>
    
    <div class="linearGaugeContainer">
        <div id="linearGaugeContainer" style=" background-color:#FBFBFB"></div>
	</div>

    

</body>
</html>
