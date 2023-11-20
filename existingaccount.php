<?php
require('workout-db.php');


$email = $_POST['email'];
$pass = $_POST['pass'];

$confirm_email = checkUser($email, $pass); # another security measure to ensure that a login account is correct
echo $confirm_email;
if (!($confirm_email == false)) {
	echo "Login successful";
	header("Location: home.php");
	exit();
}
echo "Login failed";
header("Location: login.php");

exit();

?>
