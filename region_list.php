<?php
session_start();
$a = $_SESSION['user_admin'];


if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_password']) || $a != 1 || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */



    require_once('database.php');

    // Get all regions
    $query = 'SELECT * FROM regions
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
    <h1>region List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($regions as $region) : ?>
        <tr>
            <td><?php echo $region['regionName']; ?></td>
            <td>
                <form action="delete_region.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="region_id"
                           value="<?php echo $region['regionID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add region</h2>
    <form action="add_region.php" method="post"
          id="add_region_form">

        <label>Name:</label>
        <input type="input" name="name">
        <input id="add_region_button" type="submit" value="Add">
    </form>
    <br>
    <p><a class= "btn" href="index.php">Homepage</a></p>

    <?php
include('includes/footer.php');
?>