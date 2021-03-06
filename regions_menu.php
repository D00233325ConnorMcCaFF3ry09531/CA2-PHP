


<?php
require_once('database.php');

// Get region ID
if (!isset($region_id)) {
$region_id = filter_input(INPUT_GET, 'region_id', 
FILTER_VALIDATE_INT);
if ($region_id == NULL || $region_id == FALSE) {
$region_id = 1;
echo  $region_id;
}
}

// Get name for current region
$queryregion = "SELECT * FROM regions
WHERE regionID = :region_id";
$statement1 = $db->prepare($queryregion);
$statement1->bindValue(':region_id', $region_id);
$statement1->execute();
$region = $statement1->fetch();
$statement1->closeCursor();
$region_name = $region['regionName'];

// Get all regions
$queryAllregions = 'SELECT * FROM regions
ORDER BY regionID';
$statement2 = $db->prepare($queryAllregions);
$statement2->execute();
$regions = $statement2->fetchAll();
$statement2->closeCursor();

// Get store for selected region
$querystore = "SELECT * FROM store
WHERE regionID = :region_id
ORDER BY storeID";
$statement3 = $db->prepare($querystore);
$statement3->bindValue(':region_id', $region_id);
$statement3->execute();
$store = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">

<?php
include('includes/header.php');
?>
<h1>Store List</h1>


<aside>
<!-- display a list of categories -->
<h2>Categories</h2>
<nav>
<ul>
<?php foreach ($regions as $region) : ?>
<li><a class="btn" href="?region_id=<?php echo $region['regionID']; ?>">
<?php echo $region['regionName']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>          
</aside>
<section>
<!-- display a table of store -->
<h2><?php echo $region_name; ?></h2>

<table>
<tr>
<th>Image</th>
<th>Address</th>
<th>Postcode</th>

<th>Delete</th>
<th>Edit</th>
</tr>
<?php foreach ($store as $store) : ?>
<tr>
<td><img src="image_uploads/<?php echo $store['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $store['address']; ?></td>

<td><?php echo $store['postcode']; ?></td>

<td><form action="delete_store.php" method="post"
id="delete_store_form">
<input type="hidden" name="store_id"
value="<?php echo $store['storeID']; ?>">
<input type="hidden" name="region_id"
value="<?php echo $store['regionID']; ?>">
<input type="submit" value="Delete">
</form></td>
<td><form action="edit_store_form.php" method="post"
id="delete_store_form">
<input type="hidden" name="store_id"
value="<?php echo $store['storeID']; ?>">
<input type="hidden" name="region_id"
value="<?php echo $store['regionID']; ?>">
<input type="submit" value="Edit">
</form></td>
</tr>
<?php endforeach; ?>
</table>
<p><a class= "btn" href="add_store_form.php">Add Store</a></p>
<p><a class= "btn" href="region_list.php">Manage Regions</a></p>
<p><a class= "btn" href="index.php">Return to Products</a></p>




</section>
<?php
include('includes/footer.php');
?>
