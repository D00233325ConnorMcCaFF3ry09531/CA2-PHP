
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

require_once('database.php');



// Get name for current category


// Get users for selected category
$queryusers = "SELECT * FROM users
ORDER BY id";
$statement3 = $db->prepare($queryusers);

$statement3->execute();
$users = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>

<!-- display a table of users -->


<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
<th>Admin</th>
<th>Edit</th>
</tr>
<?php foreach ($users as $users) : ?>
<tr>

<td><?php echo $users['id']; ?></td>
<td class="right"><?php echo $users['username']; ?></td>
<td><?php echo $users['password']; ?></td>
<td><?php echo $users['admin']; ?></td>
<td><form action="edit_user_form.php" method="post"
id="edit_user_form">
<input type="hidden" name="id"
value="<?php echo $users['id']; ?>">
<input type="submit" value="Edit">
</td>

</form>
</tr>
<?php endforeach; ?>
</table>





</section>

<?php
include('includes/footer.php');
?>