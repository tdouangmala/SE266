<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':
        $message = 'Enter some data and click on the Submit button.';
        break;
    case 'process_data':
        $name = $_POST['name'];
        $email = $_POST['email'];
		$atPos = strpos($email, '@');
		$dotPos = strrpos($email, '.');
        $phone = $_POST['phone'];
		$phone_symbols = array(')','(','-',' ');
		$phone_digits = str_replace($phone_symbols, '', $phone);
		$phone_length = strlen($phone_digits);

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
		if (empty($name)) {
			$message = 'Name is a required field.';
			break;
		}
        // 2. display the name with only the first letter capitalized
		$name = ucwords($name);
		//first name
		$spacePos = strpos($name, ' ');
		if ($spacePos === false) {
			$first_name = $name;
		} else {
			$first_name = substr($name, 0, $spacePos);
		}
        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
		if (empty($email)){
			$message = 'Email is a required field.';
			break;
		}
        // 2. make sure the email address has at least one @ sign and one dot character
		else if ($atPos === false || $dosPos === false) {
			$message = 'Email is invalid. Must contain at least one @ sign and one dot.';
			break;
		}

        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
		if ($phone_length < 7) {
			$message = 'Invalid Phone Number. Enter at least 7 digits.';
			break;
		}
		else if ($phone_length != 7 && $phone_length != 10) {
			$message = 'Invalid Phone Number.';
			break;
		}

		// 2. format the phone number like this 123-4567 or this 123-456-7890
		if ($phone_length == 10) {
			$part1 = substr($phone_digits, 0, 3);
			$part2 = substr($phone_digits, 3, 3);
			$part3 = substr($phone_digits, 6);
			$phone = $part1 . '-' . $part2 . '-' . $part3;
		}
		else if ($phone_length == 7) {
			$part1 = substr($phone_digits, 0, 3);
			$part2 = substr($phone_digits, 3);
			$phone = $part1 . '-' . $part2;
			break;
		}
	
		
        /*************************************************
         * Display the validation message
         ************************************************/
		$message = "Hello $first_name, \n \n
				   Thank you for entering this data: \n \n
				   Name: $name \n
				   Email: $email \n
				   Phone: $phone ";
		break;
}
include 'string_tester.php';
?>