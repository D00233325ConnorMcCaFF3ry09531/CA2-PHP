<?php

// Get the electronics data
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$username1 = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
$admin = filter_input(INPUT_POST, 'admin');
echo "<script type='text/javascript'>alert('$username1');</script>";
echo "<script type='text/javascript'>alert('$admin');</script>";
echo "<script type='text/javascript'>alert('$id');</script>";
echo "<script type='text/javascript'>alert('$password');</script>";
// Validate inputs
if ($id == NULL ||$username1 == NULL || $password= null 
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

$statement->bindValue(':username', $username1);
$statement->bindValue(':password', $passwordHash);
$statement->bindValue(':admin', $admin);
$statement->bindValue(':id', $id);
$statement->execute();
$statement->closeCursor();
echo "<script type='text/javascript'>alert('$query');</script>";
// Display the Product List page
include('administration.php');
}
?>