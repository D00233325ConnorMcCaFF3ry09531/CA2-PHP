<?php

// Get the electronics data
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$admin = filter_input(INPUT_POST, 'admin');
echo "<script type='text/javascript'>alert('$username');</script>";
echo "<script type='text/javascript'>alert('$admin');</script>";
echo "<script type='text/javascript'>alert('$id');</script>";

// Validate inputs
if ($id == NULL ||$username == NULL || $password= null 
) {
$error = "Invalid  data. Check all fields and try again.";
include('error.php');
} else {

/**************************** Image upload ****************************/

// If valid, update the electronics in the database
require_once('database.php');

$query = 'UPDATE users
SET username = :username,
password = :password,
admin = :admin

WHERE id = :id';
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $password);

$statement->bindValue(':admin', $admin);

$statement->execute();
$statement->closeCursor();
echo "<script type='text/javascript'>alert('$query');</script>";
// Display the Product List page
include('index.php');
}
?>