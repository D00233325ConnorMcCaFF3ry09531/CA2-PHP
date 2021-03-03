<?php
// Get ID
$region_id = filter_input(INPUT_POST, 'region_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($region_id == null || $region_id == false) {
    $error = "Invalid region ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'DELETE FROM regions 
              WHERE regionID = :region_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':region_id', $region_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the region List page
    include('region_list.php');
}
?>
