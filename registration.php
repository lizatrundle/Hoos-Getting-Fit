<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('workoutdb.php');

$email = $_POST['email'];
$pass = $_POST['password'];
$first = $_POST['first'];
$last = $_POST['last'];
$user = $_POST['user'];
$id = 2; # presetting to 2 -- we dont really need photo id 


$acc_email = addUser($user, $first, $last, $pass, $email, $id);
$acc_username = confirmUsername($acc_email);
// echo $acc_email;


setrawcookie('email', $_COOKIE['email'] = $acc_email);
setrawcookie('user', $_COOKIE['user'] = $acc_username);


header("Location: home.php");

exit();
?>