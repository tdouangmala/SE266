<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $categories = $db->query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Product Manager</h1>
    </div>

    <div id="main">

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
    <!-- add code for the rest of the table here -->
    
		<?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td><form action="delete_category.php" method="post">
			<input type="hidden" name="category_name" value="<?php echo $category['categoryName']; ?>" />
            <input type="submit" value="Delete" />
            </form></td>
        </tr>
		<?php endforeach; ?>
    </table>
    <br />

    <h2>Add Category</h2>
	<form action="add_category.php" method="post">
		<label>Name:</label>
		<input type="text" name="category_name" value=""/>
        <label>&nbsp;</label>
	    <input type="submit" value="Add"/><br />
	</form>
    
    <br />
    <p><a href="index.php">List Products</a></p>

    </div> <!-- end main -->

    <div id="footer">
        <p>
            &copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.
        </p>
    </div>

    </div><!-- end page -->
</body>
</html>