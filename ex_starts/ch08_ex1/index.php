<?php

$customer_type = $_POST['type'];
$customer_type = strtoupper($customer_type);
$invoice_subtotal = $_POST['subtotal'];

switch ($customer_type) {
	case 'R':
		if ($invoice_subtotal < 100)
			$discount_percent = .0;
		else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250)
			$discount_percent = .1;
		else if ($invoice_subtotal >= 250 && $invoice_subtotal < 500)
			$discount_percent = .25;
		else if ($invoice_subtotal >= 500)
			$discount_percent = .30;
		break;
	case 'C':
			$discount_percent = .20;
		break;
	case 'T':
		if ($invoice_subtotal < 500)
			$discount_percent = .40;
		else if ($invoice_subtotal >= 500)
			$discount_percent = .50;
		break;
	default:
		$discount_percent = .10;
		break;	
}

/* if ($customer_type == 'R' || $customer_type == 'r') {
    if ($invoice_subtotal < 100)
        $discount_percent = .0;
    else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250)
        $discount_percent = .1;
    else if ($invoice_subtotal >= 250 && $invoice_subtotal < 500)
        $discount_percent = .25;
	else if ($invoice_subtotal >= 500)
		$discount_percent = .30;
} else if ($customer_type == 'C' || $customer_type == 'c') {
		$discount_percent = .20;
//    if ($invoice_subtotal < 250)
//        $discount_percent = .2;
//    else
//        $discount_percent = .3;
//} else {
//    $discount_percent = .0;
}
} else if ($customer_type == 'T' || $customer_type == 't') {
	if ($invoice_subtotal < 500)
		$discount_percent = .40;
	else if ($invoice_subtotal >= 500)
		$discount_percent = .50;
} else
	$discount_percent = .10; */

$discount_amount = $invoice_subtotal * $discount_percent;
$invoice_total = $invoice_subtotal - $discount_amount;

$percent = number_format(($discount_percent * 100));
$discount = number_format($discount_amount, 2);
$total = number_format($invoice_total, 2);

include 'invoice_total.php';

?>