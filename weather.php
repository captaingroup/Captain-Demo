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
		<script type="text/javascript" src="js/jquery.dropdown.js"></script>

<?php
		$patientID = $_GET["id"] ;
		$groupNameDisplaying = null;
?>


<link href="css/style.css" rel="stylesheet" type="text/css" />
<script>
    function check() {
       alert("Hi");
    }
</script>
</head>
<body>

	<script>			
		
	</script>    
    
    
	<div id="weatherHeader" class="weatherHeader"><h6 class="weatherHeaderText">Captain - Weather Demo</h6></div>

	<div class="container">
		<section class="main clearfix">		
			<div class="fleft">
				<select id="cd-dropdown" name="cd-dropdown" class="cd-select" onchange="check();">
					<option value="-1" selected>Select Sensor Group</option>
				</select>
			</div>
		</section>
	</div><!-- /container -->
        
    <script type="text/javascript">	
	
	
	var chart;
	function requestData(i, id) {
        $.ajax({
            url: 'functions/live-server-data.php?id='+id, 
            success: function(point) {
                var series = chart.get('series' + i),
                    shift = series.data.length > 10; // shift if the series is longer than 20

                // add the point
                series.addPoint(eval(point), true, shift);

                // call it again after one second
                setTimeout(requestData(i, id), 1000);  
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

		/*var val = 0;
		$(document).ready(function requestData2(id) {
				var gauge = $('#linearGaugeContainer').dxLinearGauge('instance');
				
				$.ajax({
            		url: 'functions/live-server-data.php?id='+id, 
            		success: function(point) {
            			gauge.value(point);
						val = val + 1;
                		setTimeout(requestData2(id), 1000);  
            		},
            		cache: false
        			});
		});*/
	
		function requestData2(id) {
			var gauge = $('#linearGaugeContainer').dxLinearGauge('instance');
        	$.ajax({
	            url: 'functions/live-server-data2.php?id='+id, 
    	        success: function(point) {
       		        gauge.value(point);

                	// call it again after one second
                	setTimeout(requestData2(id), 1000);  
            	},
            	cache: false
        	});
    	}
	
		
		$( function() {	
			$( '#cd-dropdown' ).dropdown( {
				gutter : 5,
				onOptionSelect : function(opt) {
					var a = opt.get(0).childNodes[0].childNodes[0].nodeValue;
					console.log( opt.get( 0 ).childNodes[0].childNodes[0].nodeValue);
					alert(a);
					<?php
						$groupNameDisplaying = 'a';
					?>
					
					var gauge = $('#linearGaugeContainer').dxLinearGauge('instance');
					$.ajax({
            		url: 'functions/getGroupSensors.php?id=' + a, 
            		success: function(data) {
						
						
						console.log(data[0].SensorID);
						console.log(data[1].SensorID);
						console.log(data[2].SensorID);
						
						<!--Remove current lines on chart and add new lines to the chart !-->
						
						chart.series[0].remove();
						
						for(var i = 0 ; i < data.length - 1 ; i++){
							console.log(i + "testing");
							
							var series = {
            					id: 'series' + i,
           	 					data: []
            				}	
							chart.addSeries(series);
							
							requestData(i, data[i].SensorID);
							
						}
						
						for(var i = data.length-1 ; i < data.length ; i++){
							console.log(i + "Gauge Change");
							gauge.value(100);
							requestData2(data[i].SensorID);
						}
						
						
						<!-- END of new chart line code !-->
						
						
						
						
            		},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
     					alert(errorThrown);
  					},
            		cache: false
        			});
				}
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
