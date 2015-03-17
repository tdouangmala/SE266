<?php
    require_once('database.php');

    // Get all actors
    $query = 'SELECT * 
			  FROM actors
              ORDER BY LastName, FirstName';
    $actors = $db->query($query); //PDOStatement Object
	
	//Set and format current date
	$now = date('F d', time());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Actors</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
	<div id="main">
	<!-- the errors -->
	<?php if (count($errors) > 0) : ?>
   		<h2>Errors:</h2>
    	<ul>
    	 	<?php foreach($errors as $error) : ?>
   	         	<li><?php echo $error; ?></li>
   	     	<?php endforeach; ?>
    	</ul>
    <?php endif; ?>
		
	<!--  if database has no actors -->
    <h2>Actors</h2>
	<?php if ($actors->rowCount() == 0): ?>
    	<p>There are no actors in the database.</p>
	
	<!-- list actors if Search is clicked -->	
    <?php elseif (!empty($searching)): ?>
		<form action="actions.php" method="post">
		<label>First Name:</label>
    	<input type="text" name="search_first_name" value="<?php echo $search_first_name ?>"/><br />
		<label>Last Name:</label>
    	<input type="text" name="search_last_name" value="<?php echo $search_last_name ?>"/>
		<input type="submit" name="action" value="Search"/>
		<input type="submit" name="action" value="Return"/>
    	<table>
			<?php foreach ($searches as $search) : ?>
				<?php $formatted_birth_date = date('F d, Y', strtotime($search['Birthday'])); ?>
				<?php if (date('F d', strtotime($search['Birthday'])) == $now): //compare dates?>
					<tr id="birthday">
						<?php include'search_actor_list.php'; ?>
					</tr>
				
				<?php else: ?>
					<tr>
						<?php include'search_actor_list.php'; ?>
					</tr>
				<?php endif; ?>
            <?php endforeach; ?>
        </table>
	
	<!-- list actors when page starts -->		
    <?php else: ?>
		<form action="actions.php" method="post">
		<label>First Name:</label>
    	<input type="text" name="search_first_name" /><br />
		<label>Last Name:</label>
    	<input type="text" name="search_last_name" />
		<input type="submit" name="action" value="Search"/>
    	<table>
			<?php foreach ($actors as $actor) : ?>
				<?php $formatted_birth_date = date('F d, Y', strtotime($actor['Birthday'])); ?>
				<?php if (date('F d', strtotime($actor['Birthday'])) == $now): //compare dates?>
					<tr id="birthday">
						<?php include 'actor_list.php'; ?>
					</tr>
				
				<?php else: ?>
					<tr>
						<?php include 'actor_list.php'; ?>
					</tr>
				<?php endif; ?>
            <?php endforeach; ?>
        </table>
	<?php endif; ?>
    <br />

    <!-- the add form -->
    <?php if ($actors->rowCount() >= 0 && empty($actor_to_edit)) : ?>
    <h2>Add Actor</h2>
	<form action="actions.php" method="post">
		<label>First Name:</label>
        <input type="text" name="first_name" /><br />
		
		<label>Last Name:</label>
        <input type="text" name="last_name" class="LastName"/><br />
		
        <label>Birth Date:</label>
        <input type="text" name="birthdate" /><br />
		
		<label>Gender:</label>
		<input type="radio" name="gender" id="male" value="M" /> Male
		<input type="radio" name="gender" id="female" value="F" /> Female <br />
	
        <div class="buttons">
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Add Actor"/><br />
        </div><!-- end buttons -->
	</form>
	<?php endif; ?>
	</div><!-- end main -->
</body>
		</html>