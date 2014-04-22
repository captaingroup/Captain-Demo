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
</script>

</head>
<body>
	
    <div class="formContainer">
    	<form id="addgroup" action="" method="post">
    	<h2>Add Group</h2>
    	<fieldset id="inputs">
        	<input id="groupname" type="text" name="Gname" maxlength="12" size="12" placeholder="Group Name" autofocus required>   
        	<input id="sensorgroupings" type="text" name="Sgroupings" maxlength="12" size="12" placeholder="Sensor(id,type...)" required>
            <input id="sensorfrequency" type="text" name="Sfrequency" maxlength="12" size="12" placeholder="Sensor Frequency" required>
    	</fieldset>
    	<fieldset id="actions">
        	<input type="submit" id="submit" value="Send to Captain">
    	</fieldset>
	</form>
    </div>   
    
    
    <form action="" method="post">
First Name:<input type="text" name="Fname" maxlength="12" size="12"/> <br/>
Last Name:<input type="text" name="Lname" maxlength="36" size="12"/> <br/>
Gender:<br/>
Male:<input type="radio" name="gender" value="Male"/><br/>
Female:<input type="radio" name="gender" value="Female"/><br/>
Favorite Food:<br/>
Steak:<input type="checkbox" name="food[]" value="Steak"/><br/>
Pizza:<input type="checkbox" name="food[]" value="Pizza"/><br/>
Chicken:<input type="checkbox" name="food[]" value="Chicken"/><br/>
<textarea wrap="physical" cols="20" name="quote" rows="5">Enter your favorite quote!</textarea><br/>
Select a Level of Education:<br/>
<select name="education">
<option value="Jr.High">Jr.High</option>
<option value="HighSchool">HighSchool</option>
<option value="College">College</option></select><br/>
Select your favorite time of day:<br/>
<select size="3" name="TofD">
<option value="Morning">Morning</option>
<option value="Day">Day</option>
<option value="Night">Night</option></select>
<p><input type="submit" /></p>
</form>
    
    
    <h2>JSON</h2>
	<pre id="result"></pre>
</body>
</html>
