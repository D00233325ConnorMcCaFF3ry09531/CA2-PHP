<?php

// Get the electronics data
$electronics_id = filter_input(INPUT_POST, 'electronics_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');

$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$weight = filter_input(INPUT_POST, 'weight');
$email = filter_input(INPUT_POST, 'email');
// Validate inputs
if ($electronics_id == NULL ||$email == NULL || $electronics_id == FALSE || $category_id == NULL ||
$category_id == FALSE || empty($name) ||
$price == NULL || $price == FALSE || $weight == NULL) {
$error = "Invalid electronics data. Check all fields and try again.";
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

// If valid, update the electronics in the database
require_once('database.php');

$query = 'UPDATE electronics
SET categoryID = :category_id,
name = :name,
price = :price,
weight = :weight,
email = :email,
image = :image
WHERE electronicsID = :electronics_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->bindValue(':weight', $weight);
$statement->bindValue(':email', $email);
$statement->bindValue(':image', $image);
$statement->bindValue(':electronics_id', $electronics_id);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('index.php');
}
?>