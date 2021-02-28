<?php
require('database.php');

$electronics_id = filter_input(INPUT_POST, 'electronics_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM electronics
          WHERE electronicsID = :electronics_id';
$statement = $db->prepare($query);
$statement->bindValue(':electronics_id', $electronics_id);
$statement->execute();
$electronics = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_electronics.php" method="post" enctype="multipart/form-data"
              id="add_electronics_form">
            <input type="hidden" name="original_image" value="<?php echo $electronics['image']; ?>" />
            <input type="hidden" name="electronics_id"
                   value="<?php echo $electronics['electronicsID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
            value="<?php echo $electronics['categoryID']; ?>">
            <br>

            <label>Name:</label>
            <input type="input" name="name"
                   value="<?php echo $electronics['name']; ?>">
            <br>

            <label>List Price:</label>
            <input type="input" name="price"
                   value="<?php echo $electronics['price']; ?>">
            <br>


            <label>Weight:</label>
            <input type="input" name="weight"
                   value="<?php echo $electronics['weight']; ?>">
            <br>

            <label>Email:</label>
            <input type="input" name="email"
                   value="<?php echo $electronics['email']; ?>">
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($electronics['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $electronics['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>