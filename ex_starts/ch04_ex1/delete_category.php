<?php
// Get the category data
$category_name= $_POST['category_name'];

// Delete the category from the database
require_once('database.php');
$query = "DELETE FROM categories
          WHERE categoryName = '$category_name'";
$db->exec($query);

// display the Category List page
include('category_list.php');
?>