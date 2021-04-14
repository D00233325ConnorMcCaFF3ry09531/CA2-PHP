



<?php

session_start();

/**
 * Check if the user is logged in.
 */
$a = $_SESSION['user_admin'];


if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_password']) || $a != 1 || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */



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
 <script src="validation.js"></script>
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
            <input type="input" name="name" id="name"   placeholder="Add Name"  onBlur="name_validation();"  required ><span id="name_err"></span>
            <br>

            <label>List Price:</label>
            <input type="input" name="price" id=price placeholder="Add Price" onBlur="price_validation();" required> <span id="price_err"></span>
            <br>      
            
            
            <label>Weight in (KG):</label>
            <input type="input" id="weight" name="weight" placeholder="Add Weight"  onBlur="weight_validation();"    required> <span id="weight_err"></span>
            <br>

            <label>Supplier Email Address :</label>
            <input type="input"  name= "email" id="email" placeholder="Add Email Address" onBlur="email_validation();" pattern="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$" required ><span id="email_err"></span>
            <br>
            
          
            <br>   
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>


            
      
            
            <label>&nbsp;</label>
            <input type="submit" value="Add electronics">
            <br>
        </form>
        <p><a class= "btn" href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>