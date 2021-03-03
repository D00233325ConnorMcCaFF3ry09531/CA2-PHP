<?php

// Get the region data
$region_id = filter_input(INPUT_POST, 'region_id', FILTER_VALIDATE_INT);
$store_id = filter_input(INPUT_POST, 'store_id', FILTER_VALIDATE_INT);
$address = filter_input(INPUT_POST, 'address');

$postcode = filter_input(INPUT_POST, 'postcode');
// Validate inputs
if ($region_id == NULL ||$postcode == NULL || $region_id == FALSE || $store_id == NULL ||
$store_id == FALSE ||
$address== NULL || $postcode  == NULL) {
$error = "Invalid region data. Check all fields and try again.";
include('error.php');
} else {

/**************************** Image upload ****************************/

$imgFile = $_FILES['image']['name'];
$tmp_dir = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
$original_image = filter_input(INPUT_POST, 'original_image');

if ($imgFile) {
$upload_dir = 'image_uploads/'; // upload directory	
$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$image = rand(1000, 1000000) . "." . $imgExt;
if (in_array($imgExt, $valid_extensions)) {
if ($imgSize < 5000000) {
if (filter_input(INPUT_POST, 'original_image') !== "") {
unlink($upload_dir . $original_image);                    
}
move_uploaded_file($tmp_dir, $upload_dir . $image);
} else {
$errMSG = "Sorry, your file is too large it should be less then 5MB";
}
} else {
$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
} else {
// if no image selected the old image remain as it is.
$image = $original_image; // old image from database
}

/************************** End Image upload **************************/

// If valid, update the region in the database
require_once('database.php');

$query = 'UPDATE store
SET regionID = :region_id,


address = :address,
postcode = :postcode,
image = :image
WHERE storeID = :store_id';
$statement = $db->prepare($query);

$statement->bindValue(':region_id', $region_id);

$statement->bindValue(':address', $address);
$statement->bindValue(':postcode', $postcode);
$statement->bindValue(':image', $image);
$statement->bindValue(':store_id', $store_id);

$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('index.php');
}
?>