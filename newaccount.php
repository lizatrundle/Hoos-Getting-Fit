<?php
require('workout-db.php');

$email = $_POST['email'];
$pass = $_POST['pass'];
$first = $_POST['first'];
$last = $_POST['last'];
$id = $_POST['id'];
$username = $_POST['username'];
addUser($username, $first, $last, $pass,$email, $id);

// Redirect to items page
header("Location: home.php");
exit();
?>
