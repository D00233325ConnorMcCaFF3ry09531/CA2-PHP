<?php

session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */



require('database.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
 echo "<script type='text/javascript'>alert('$id');</script>";
$query = 'SELECT *
          FROM users
          WHERE id = :id';
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
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
        <form action="edit_user.php" method="post" enctype="multipart/form-data"
              id="edit_user_form">
         
            <input type="hidden" name="id"
                   value="<?php echo $electronics['id']; ?>">
<br>
            <label>Username:</label>
            <input type="input" name="username"  required
            value="<?php echo $electronics['username']; ?>">
            <br>

            <label>Password:</label>
            <input type="input" name="password" id="password" onBlur="validate_password();" required
                   value="<?php echo $electronics['password']; ?>"><span id="password_err"></span>
            <br>

<label>Admin:</label>

<select name="admin" id="admin">
  <option value="">Select...</option>
  <option value="1">Male</option>
  <option value="2">Female</option>
</select>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a class= "btn" href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>