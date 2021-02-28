<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
     
     <h1>Add Electronics</h1>
     <form action="add_electronics.php" method="post" enctype="multipart/form-data"
              id="add_electronics_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Name:</label>
            <input type="input" name="name" required  placeholder="Add Name">
            <br>

            <label>List Price:</label>
            <input type="input" name="price" required>
            <br>      
            
            
            <label>Weight in (KG):</label>
            <input type="input" name="weight" required>
            <br>

            <label>Supplier Email Address :</label>
            <input type="input" name= "email" required>
            <br>
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>


            
      
            
            <label>&nbsp;</label>
            <input type="submit" value="Add electronics">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>