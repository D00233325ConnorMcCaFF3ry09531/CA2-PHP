<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get electronics for selected category
$queryelectronics = "SELECT * FROM electronics
WHERE categoryID = :category_id
ORDER BY electronicsID";
$statement3 = $db->prepare($queryelectronics);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$electronics = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>
<h1>electronics List</h1>

<aside>
<!-- display a list of categories -->
<h2>Categories</h2>
<nav>
<ul>
<?php foreach ($categories as $category) : ?>
<li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
<?php echo $category['categoryName']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>          
</aside>

<section>
<!-- display a table of electronics -->
<h2><?php echo $category_name; ?></h2>
<h1> This is a normal H! </h1>
<table>
<tr>
<th>Image</th>
<th>Name</th>
<th>Price (£)</th>
<th>Weight (KG)</th>
<th>Supplier Email Address </th>
<th>Delete</th>
<th>Edit</th>
</tr>
<?php foreach ($electronics as $electronics) : ?>
<tr>
<td><img src="image_uploads/<?php echo $electronics['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $electronics['name']; ?></td>
<td class="right"><?php echo $electronics['price']; ?></td>
<td><?php echo $electronics['weight']; ?></td>
<td><?php echo $electronics['email']; ?></td>
<td><form action="delete_electronics.php" method="post"
id="delete_electronics_form">
<input type="hidden" name="electronics_id"
value="<?php echo $electronics['electronicsID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $electronics['categoryID']; ?>">
<input type="submit" value="Delete">
</form></td>
<td><form action="edit_electronics_form.php" method="post"
id="delete_electronics_form">
<input type="hidden" name="electronics_id"
value="<?php echo $electronics['electronicsID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $electronics['categoryID']; ?>">
<input type="submit" value="Edit">
</form></td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="add_electronics_form.php">Add electronics</a></p>
<p><a href="category_list.php">Manage Categories</a></p>
<p><a href="regions_menu.php">View</a></p>




</section>

<?php
include('includes/footer.php');
?>