
<?php  


require_once('database.php');



// Get name for current category


// Get electronics for selected category
$queryelectronics = "SELECT * FROM users
ORDER BY id";
$statement3 = $db->prepare($queryelectronics);

$statement3->execute();
$electronics = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>
<h1>Electronics List</h1>

<aside>
<!-- display a list of categories -->
<h2>Categories</h2>
<nav>
<ul>



</ul>
</nav>          
</aside>

<section>
<!-- display a table of electronics -->


<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
<th>Admin</th>
<th>Edit</th>
</tr>
<?php foreach ($electronics as $electronics) : ?>
<tr>

<td><?php echo $electronics['id']; ?></td>
<td class="right"><?php echo $electronics['username']; ?></td>
<td><?php echo $electronics['password']; ?></td>
<td><?php echo $electronics['admin']; ?></td>
<td><form action="edit_user_form.php" method="post"
id="edit_user_form">
<input type="hidden" name="id"
value="<?php echo $electronics['id']; ?>">
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