<?php include '../view/header.php'; ?>
<div id="main">

    <h1 class="top">Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
    <!-- add categories table here -->
		<?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td><form action="index.php" method="post">
            <input type="hidden" name="action" value="delete_category" />
			<input type="hidden" name="category_name" value="<?php echo $category['categoryName']; ?>" />
            <input type="submit" value="Delete" />
            </form></td>
        </tr>
		<?php endforeach; ?>
    
    </table>
    <br />

    <h2>Add Category</h2>
    <!-- add form for adding a category here -->
	<form action="index.php" method="post">
	<input type="hidden" name="action" value="add_category" />
	<label>Name:</label>
	<input type="text" name="category_name" value=""/>
    <label>&nbsp;</label>
	<input type="submit" value="Add"/><br />
	</form>
    
    <br />
    <p><a href="index.php?action=list_products">List Products</a></p>

</div>
<?php include '../view/footer.php'; ?>