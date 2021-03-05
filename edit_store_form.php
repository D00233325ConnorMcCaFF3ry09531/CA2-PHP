<?php
require('database.php');

$store_id = filter_input(INPUT_POST, 'store_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM store
          WHERE storeID = :store_id';
$statement = $db->prepare($query);
$statement->bindValue(':store_id', $store_id);
$statement->execute();
$store = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
 <script src="validation.js"></script>
<?php
include('includes/header.php');
?>
        <h1>EditStore</h1>
        <form action="edit_store.php" method="post" enctype="multipart/form-data"
              id="add_store_form">
            <input type="hidden" name="original_image" value="<?php echo $store['image']; ?>" />
            <input type="hidden" name="store_id"
                   value="<?php echo $store['storeID']; ?>">

            <label>Region ID:</label>
            <input type="region_id" name="region_id"  required
            value="<?php echo $store['regionID']; ?>">
            <br>

            <label>Address</label>
            <input type="input" name="address" id="address" onBlur="address_validation();" required
                   value="<?php echo $store['address']; ?>"><span id="address_err"></span>
            <br>

            <label>Postcode: </label>
            <input type="input" name="postcode" id="postcode" onBlur="postcode_validation();"
              pattern="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}" required
   value="<?php echo $store['postcode']; ?>"><span id="postcode_err"></span>
            <br>



            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>   
            
                     
            <?php if ($store['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $store['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a class= "btn" href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>