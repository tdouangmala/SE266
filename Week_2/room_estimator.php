<?php
    // get the data from the form
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];

    // validate length entry
    if ( empty($length) ) {
        $error_message = 'Length is a required field.'; }
    else if ( !is_numeric($length) )  {
        $error_message = 'Length must be a valid number.'; }
    else if ( $length <= 0 ) {
        $error_message = 'Length must be greater than zero.'; }

    // validate width entry
    else if ( empty($width) ) {
        $error_message = 'Width is a required field.'; }
    else if ( !is_numeric($width) )  {
        $error_message = 'Width must be a valid number.'; }
    else if ( $width <= 0 ) {
        $error_message = 'Width must be greater than zero.'; }

	// validate height entry
	else if ( empty($height) ){
		$error_message = 'Height is a required field.'; }
	else if ( !is_numeric($height) ) {
		$error_message = 'Height must be a valid number.'; }
	else if ( $height <=0 ) { 
		$error_message = 'Height must be greater than zero.'; }

    // set error message to empty string if no invalid entries
    else {
        $error_message = ''; }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }

    // calculate volume
    $volume = $length * $width * $height;
	// calculate ceiling
	$ceiling = $length * $width;
	// calculate wall lh
	$wall_lh = $length * $height * 2;
	// calculate wall wh
	$wall_wh = $width * $height * 2;
	// calculate paintable area
	$paintable_area = $ceiling + $wall_lh + $wall_wh;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Room Estimator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Room Estimator</h1>

        <label>Length :</label>
        <span><?php echo $length . ' ft'; ?></span><br />

        <label>Width  :</label>
        <span><?php echo $width . ' ft'; ?></span><br />

        <label>Height :</label>
        <span><?php echo $height . ' ft'; ?></span><br />

        <label>Paintable Area:</label>
        <span><?php echo $paintable_area . ' sq. ft'; ?></span><br />

        <label>Volume Space:</label>
        <span><?php echo $volume . ' cu. ft'; ?></span><br />
		
		<br />
		<span><?php echo 'This calculation was done on '.date('m/d/Y'); ?></span>
    </div>
</body>
</html>