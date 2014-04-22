<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Captain - Temperature Example</title>
<link href="css/stylesheet.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Nova+Slim|Parisienne|Nova+Mono|Pacifico|Comfortaa|Varela+Round|Dr+Sugiyama' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

<script>
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$(function() {
    $('form').submit(function() {
        $('#result').text(JSON.stringify($('form').serializeObject()));
        return false;
    });
});

function add_fields() {
    var newspan = document.createElement('span');
    newspan.innerHTML = '<input id="sensorgroupings" type="text" name="SensorGroupings" placeholder="Sensor(id,type...)" >';
    document.getElementById('sensorgroupings').appendChild(newspan);
}
</script>

</head>
<body>
	
    <div class="formContainer">
    	<form id="addgroup" action="" method="post">
    	<h2>Add Group</h2>
    	<fieldset id="inputs">
        	<input id="groupname" type="text" name="GroupName" placeholder="Group Name" autofocus required>   
        	<input id="sensorgroupings" type="text" name="SensorGroupings" placeholder="Sensor(id,type...)" required>
            <input id="sensorfrequency" type="text" name="SensorFrequency" placeholder="Sensor Frequency" required>
    	</fieldset>
    	<fieldset id="actions">
        	<input type="button" id="more_fields" onclick="add_fields();" value="Add Sensor">
        	<input type="submit" id="submit" value="Send to Captain">
    	</fieldset>
	</form>
    </div>   
    
    
    
    
    <h2>JSON</h2>
	<pre id="result"></pre>
</body>
</html>
