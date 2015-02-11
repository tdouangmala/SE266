<?php
    // get the data from the form
    $email = $_POST['email'];

    // get the rest of the data for the form
	$password = $_POST['password'];
	$phone = $_POST['phone'];

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button
	if (isset($_POST['heard_from'])) {
		$heard_from = $_POST['heard_from'];
	} else {
		$heard_from = "unknown";
	}

    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
	if (isset($_POST['wants_updates'])) {
		$wants_updates = 'YES';
	} else {
		$wants_updates = 'NO';
	}

	$contact_via = $_POST['contact_via'];

	// text area
	$comments = $_POST['comments'];
	$comments = nl2br($comments, false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br />

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password); ?></span><br />

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br />

        <label>Heard From:</label>
        <span><?php echo $heard_from; ?></span><br />

        <label>Send Updates:</label>
        <span><?php echo $wants_updates; ?></span><br />

        <label>Contact Via:</label>
        <span><?php echo $contact_via; ?></span><br /><br />

        <span>Comments:</span><br />
        <span><?php echo $comments; ?></span><br />
        
        <p>&nbsp;</p>
    </div>
</body>
</html>