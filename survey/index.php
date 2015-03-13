<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Winter Survey</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
	<div id="main">
	<h1>Winter 2015 PHP Survey</h1>
	<h2>by Tony Douangmala</h2>
	<p>Please answer the following questions.<br /> Note: All questions need a response.</p>
	<form action="survey.php" method="post">
		<fieldset id="info"><legend>Info</legend>
		<label for="fname">First Name: </label><input type="text" name="fname" /><br />
		<label for="lname">Last Name: </label><input type="text" name="lname" /><br />
		</fieldset>
		
		<fieldset id="gender">
			<legend>
				Gender:
			</legend>
			<input type="radio" name="gender" id="male" value="male" /> Male: <br />
			<input type="radio" name="gender" id="female" value="female" />Female: <br />
		</fieldset>
		
		<select id="team" name="team">
			<option value="Select">Select Your Football Team:</option>
			<option value="Cardinals">Arizona Cardinals</option>
			<option value="Patriots">NEW ENGLAND PATRIOTS</option>
			<option value="Giants">New York Giants</option>
			<option value="Jets">New York Jets</option>
			<option value="Eagles">Philadelphia Eagles</option>
			<option value="Steelers">Pittsburgh Steelers</option>
			</select>
		<br /> <br />

		<fieldset id="shows_watched"><legend>Favorite Plays</legend>
		<input type="checkbox" name="plays[]" value="Picks" />Pick 6s<br />
		<input type="checkbox" name="plays[]" value="Touchdown" />Touchdown Passes<br />
		<input type="checkbox" name="plays[]" value="FieldGoals" />50 Yard Field Goals<br />
		</fieldset>
		
		<p>
			What can we do to improve this survey?<br />
		</p>
		<textarea name="improvements" id="feedback" rows="6" cols="60"></textarea><br /><br />

		<input type="submit" name="submit" value="Submit" /><br />

		<h2>Message:</h2>
		<?php echo nl2br(htmlspecialchars($message));?>
	</form>
	</div>	
</body>
</html>

