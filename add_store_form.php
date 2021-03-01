<?php
require('database.php');
$query = 'SELECT *
          FROM regions
          ORDER BY regionID';
$statement = $db->prepare($query);
$statement->execute();
$regions = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
 
<?php
include('includes/header.php');
?>
     
     <h1>Add Store</h1>
     <form action="add_store.php" method="post" enctype="multipart/form-data"
              id="add_store_form">

            <label>region:</label>
            <select name="region_id">
            <?php foreach ($regions as $region) : ?>
                <option value="<?php echo $region['regionID']; ?>">
                    <?php echo $region['regionName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Address:</label>
            <input type="input" name="address" id="address"   placeholder="Add Address"    required >
            <br>

            <label>Postcode:</label>
            <input type="input" name="postcode" id="postcode"  required> 
            <br>      
            
            
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>


            
      
            
            <label>&nbsp;</label>
            <input type="submit" value="Add store">
            <br>
        </form>
        <p><a href="regions_menu.php">View Stores</a></p>
    <?php
include('includes/footer.php');
?>