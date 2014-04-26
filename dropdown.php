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
        
        <script>
		function add_fields() {
		var newspan = document.createElement('span');
    		newspan.innerHTML = '<option value="6" class="icon-elephant">Elephant</option>';
    		document.getElementById('cd-dropdown').appendChild(newspan);
		}
		"add_fields()";
        </script>
	</body>
</html>
