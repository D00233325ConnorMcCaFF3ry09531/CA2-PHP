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
 <script src="validation.js"></script>
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
            <input type="category_id" name="category_id"  required
            value="<?php echo $electronics['categoryID']; ?>">
            <br>

            <label>Name:</label>
            <input type="input" name="name" id="name" onBlur="name_validation();" required
                   value="<?php echo $electronics['name']; ?>"><span id="name_err"></span>
            <br>

            <label>List Price:</label>
            <input type="input" name="price" id="price" onBlur="price_validation();"  required
                   value="<?php echo $electronics['price']; ?>"><span id="price_err"></span>
            <br>


            <label>Weight:</label>
            <input type="input" name="weight" id="weight"   onBlur="weight_validation();" 
                   value="<?php echo $electronics['weight']; ?>"><span id="weight_err"></span>
            <br>

            <label>Email:</label>
            <input type="input"    name="email" id=email onBlur="email_validation();"
            pattern="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$" required  value="<?php echo $electronics['email'];  ?>"><span id="email_err"></span>
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
        <p><a class= "btn" href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>