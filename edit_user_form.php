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
$users = $statement->fetch(PDO::FETCH_ASSOC);
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
                   value="<?php echo $users['id']; ?>">
<br>
            <label>Username:</label>
            <input type="input" name="username"  required
            value="<?php echo $users['username']; ?>">
            <br>

            <label>Password:</label>
            <input type="input" name="password" id="password" onBlur="validate_password();" required
                   value="<?php echo $users['password']; ?>"><span id="password_err"></span>
            <br>
            
            <label>Email:</label>
            <input type="input" name="email" id="email" onBlur="email_validation();" required
                   value="<?php echo $users['email']; ?>"><span id="email_err"></span>
            <br>


<label>Admin:</label>

<select name="admin" id="admin">
  <option value="0">No</option>
  <option value="1">Yes</option>
</select>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a class= "btn" href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>