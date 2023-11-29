<?php

require('workoutdb.php');

$email = $_POST['email'];
$pass = $_POST['password'];
$first = $_POST['first'];
$last = $_POST['last'];
$username = $_POST['username'];
$id = 2; # presetting to 2 -- we dont really need photo id 


$acc_email = addUser($username, $first, $last, $pass, $email, $id);
echo $acc_email;

setrawcookie('email', $_COOKIE['email'] = $acc_email);

header("Location: home.php");

exit();
