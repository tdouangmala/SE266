<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = $_POST['invoice_date'];
        $due_date_s = $_POST['due_date'];

        // make sure the user enters both dates
		if (empty($invoice_date_s) || empty($due_date_s)) {
			$message = 'Both Dates Must Be Entered.';
			break;
		}

        // convert date strings to DateTime objects
        // and use a try/catch to make sure the dates are valid
        try {
            $new_invoice_date = new DateTime($invoice_date_s);
            $new_due_date = new DateTime($due_date_s);
        } catch (Exception $e) {
            $message = 'Both Dates Must Be In Valid Format.';
            break;
        }

        // make sure the due date is after the invoice date
		if ($new_due_date < $new_invoice_date) {
			$message = 'Due Date Must Be After Invoice Date.';
			break;
		}

        // format both dates
		$invoice_date_f = $new_invoice_date->format('F j, Y');
		$due_date_f = $new_due_date->format('F j, Y');
	
        // get the current date and time and format it
		$now = new DateTime();
		$current_date_f = $now->format('F j, Y');
        $current_time_f = $now->format('g:i:s a');

        // get the amount of time between the current date and the due date
		$time_span = $now->diff($new_due_date);
        // and format the due date message
        if ($new_due_date < $now) {
            $due_date_message = $time_span->format(
                'This invoice is %y years, %m months, and %d days overdue.');
        } else {
            $due_date_message = $time_span->format(
                'This invoice is due in %y years, %m months, and %d days.');
        }
        break;
}
include 'date_tester.php';
?>