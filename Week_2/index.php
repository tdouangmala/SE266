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
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="room_estimator.php" method="post">

        <div id="data">
            <label>Length (in ft):</label>
            <input type="text" name="length"
                   value="<?php echo $length; ?>"/><br />

            <label>Width (in ft):</label>
            <input type="text" name="width"
                   value="<?php echo $width; ?>"/><br />

            <label>Height (in ft):</label>
            <input type="text" name="height"
                   value="<?php echo $height; ?>"/><br />
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br />
        </div>

    </form>
    </div>
</body>
</html>