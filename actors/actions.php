<?php
require_once('database.php');

$errors = array();

switch( $_POST['action'] ) {
    case 'Add Actor':
		// Get the actor data
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$birth_date = $_POST['birthdate'];
		$gender = $_POST['gender'];

		//function to validate Date format
		function validateDate($date)
		{
			$d = DateTime::createFromFormat('Y-m-d', $date);
			return $d && $d->format('Y-m-d') == $date;
		}

		// Validate inputs
		if (empty($first_name) || empty($last_name) || empty($birth_date) || !isset($gender)) {
			$errors[] = "To Add An Actor, All Fields Must Be Entered.";
		}
		else if (validateDate($birth_date) == false){
			$errors[] = "Invalid Date Format. Enter in yyyy-mm-dd format.";
		}
		else {
		// If valid, add the actor to the database
			$query = "INSERT INTO actors
						 (FirstName, LastName, Birthday, Gender)
					  VALUES
						 ('$first_name', '$last_name', '$birth_date', '$gender')";
			$db->exec($query);
		}
        break;
    
    case 'Update Actor':
		// Get the actor data
		$update_actor_id = $_POST['update_actor_id'];
		$update_first_name = $_POST['update_first_name'];
		$update_last_name = $_POST['update_last_name'];
		$update_birth_date = $_POST['update_birthdate'];
		$update_gender = $_POST['update_gender'];

		//function to validate Date format
		function validateDate($date)
		{
			$d = DateTime::createFromFormat('Y-m-d', $date);
			return $d && $d->format('Y-m-d') == $date;
		}

		// Validate inputs
		if (empty($update_first_name) || empty($update_last_name) || empty($update_birth_date) || !isset($update_gender)) {
			$errors[] = "To Update Actors, All Updating Fields Must Be Entered.";
		}
		else if (validateDate($update_birth_date) == false){
			$errors[] = "Invalid Date Format. Enter in yyyy-mm-dd format.";
		}
		else {
		// If valid, update the actor to the database
			$query = "UPDATE actors
					  SET FirstName = '$update_first_name',
					      LastName = '$update_last_name',
						  Birthday = '$update_birth_date',
						  Gender = '$update_gender'
					  WHERE ActorID = '$update_actor_id' ";
			$db->exec($query);
			$actor_to_edit = '';
		}
		break;
	
     case 'Delete Actor':
			$update_actor_id = $_POST['update_actor_id'];
			$query = "DELETE FROM actors
					  WHERE ActorID = '$update_actor_id'";
			$db->exec($query);
        break;
    
    case 'Cancel Changes':
		$actor_to_edit = '';
		break;
	
	case 'Search':
		$searching = "Searching";
		$search_first_name = $_POST['search_first_name'];
		$search_last_name = $_POST['search_last_name'];
		
		// Validate inputs
		if (empty($search_first_name) && empty($search_last_name)) {
			$errors[] = "To Search For An Actor, Enter First Name OR Last Name.";
			$searching = '';
		} 
		else {
			if (!empty($search_first_name) || !empty($search_last_name)) {
				$query = "SELECT *
						  FROM actors
						  WHERE FirstName LIKE '$search_first_name%' AND 
						        LastName LIKE '$search_last_name%'
						  ORDER BY LastName, FirstName";
				$searches = $db->query($query);
				if ($searches->rowCount() == 0){
					$errors[] = "No Results Found.";
					$searching = '';
				}
			}
		}
		break;
    
    case 'Return':
		$searching = '';
		break;
}

include('index.php');
// || !empty($search_last_name)
?>