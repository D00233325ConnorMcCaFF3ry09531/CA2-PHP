<?php
require_once('database.php');

// Get IDs
$store_id = filter_input(INPUT_POST, 'store_id', FILTER_VALIDATE_INT);
$region_id = filter_input(INPUT_POST, 'region_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($store_id != false && $region_id != false) {
    $query = "DELETE FROM store
              WHERE storeID = :store_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':store_id', $store_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('regions_menu.php');
?>