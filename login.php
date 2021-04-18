<script type="text/javascript">
function jsFunction(){
    alert("Invalid Login Details");

}
</script>

<?php

//login.php

/**
 * Start the session.
 */
session_start();





/**
 * Include ircmaxell's password_compat library.
 */
require 'libary-folder/password.php';

/**
 * Include our MySQL connection.
 */
require 'login_connect.php';


//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['login'])){
    
    //Retrieve the field values from our login form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password,email,admin FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        $validEmail = false;

if( $email == $user['email']){

$validEmail = true;

}




        //If $validPassword is TRUE, the login has been successful.
        if($validPassword && $validEmail){
            
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_password'] = $user['password'];
            $_SESSION['user_admin'] = $user['admin'];
        $id = $_SESSION['user_id'];
        $admin = $_SESSION['user_admin'];
        $password = $_SESSION['user_password'];
            echo "<script type='text/javascript'>alert('$id');</script>";
            echo "<script type='text/javascript'>alert('$admin');</script>";
            echo "<script type='text/javascript'>alert('$password');</script>";
            $_SESSION['logged_in'] = time();
            
            //Redirect to our protected page, which we called home.php
            header('Location: index.php');
            exit;
            
        } else{
            
            //$validPassword was FALSE. Passwords do not match.
            echo '<script type="text/javascript">jsFunction();</script>';
        }
    }
    
}
 
?>
<!DOCTYPE html>
<div class="container">
<script src="validation.js"></script>
<?php
include('includes/header.php');
?>
<div id="invalidLogin_err"></span>
        <title>Login</title>
        <span id="login_err"></span>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" onBlur=email_validation()><span id="email_err"></span><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" onBlur="validate_password();"><span id="password_err"></span><br>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
include('includes/footer.php');
?>