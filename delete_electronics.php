<?php
require_once('database.php');

// Get IDs
$electronics_id = filter_input(INPUT_POST, 'electronics_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($electronics_id != false && $category_id != false) {
    $query = "DELETE FROM electronics
              WHERE electronicsID = :electronics_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':electronics_id', $electronics_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>