<?php
// Get the survey data
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$gender = $_POST['gender'];
$team = $_POST['team'];
$plays = $_POST['plays'];
$improvements = $_POST['improvements'];

// Validate inputs
if (empty($first_name) || empty($last_name) || !isset($gender) || $team == "Select" || empty($plays) || empty($improvements)) {
    $message = "Cannot Submit Survey. Ensure All Fields Are Answered.";
    include('index.php');
} else {
	//implode array for selected boxes
	if(!empty($plays)){
		$f_plays = implode(",", $plays);
	}
    // If valid, add the survey to the database
    require_once('database.php');
    $query = "INSERT INTO survey
                 (FirstName, LastName, Gender, Team, Plays, Improvements)
              VALUES
                 ('$first_name', '$last_name', '$gender', '$team', '$f_plays', '$improvements')";
    $db->exec($query);
    // Display the Survey page
    include('index.php');
}
?>