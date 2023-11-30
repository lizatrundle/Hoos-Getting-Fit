<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('workoutdb.php');


$email = trim($_POST['email']);
$pass = trim($_POST['password']);
$user = trim($_POST['user']);

// echo email and pass 
echo $email;
echo $pass;
# they are empty --> might mean that the form was cleared 

$confirmed_email = checkUser($email, $pass, $user);
$confirmed_username = confirmUsername($confirmed_email);

if ($confirmed_email) {
    setrawcookie('email', $_COOKIE['email'] = $confirmed_email);
    setrawcookie('user', $_COOKIE['user'] = $confirmed_username);
   
    header("Location: home.php");
    exit();
} else {

    echo "Invalid login. Would you like to try again or create a new user?";
   
    // header("Location: login.php");
    exit();
}
?>
