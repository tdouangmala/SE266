<?php
// Get the category data
$category_name = $_POST['category_name'];

// valid inputs
if (empty($category_name)) {
    $error = "Invalid category data. Check the field and try again.";
    include('error.php');
} else {
    // Add the category to database
    require_once('database.php');
    $query = "INSERT INTO categories
                 (categoryName)
              VALUES
                 ('$category_name')";
    $db->exec($query);

    // Display the Category List page
    include('category_list.php');
}
?>