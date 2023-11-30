<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

# doing login by setting cookies

include('connectdb.php');
require('workoutdb.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="your name">
    <meta name="description" content="include some description about your page">
    <title>Hoos getting fit Login</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: lightblue;">
    <div class="container">
        <br />
        <h1> HOOS GETTING FIT! </h1>
        <img src="uva2.jpg"style="width: 200px; height: auto; margin-bottom: 20px;" />
        <h1>Login</h1>
        <form id="loginForm" action="existing.php" method="post">
            <div class="form-group col-md-6">
                Your email:
                <input type="text" class="form-control" name="email" required />
            </div>
            <div class="form-group col-md-6">
                Password:
                <input type="password" class="form-control" name="password" required />
            </div>
            <input type="submit" value="Login" name="login" class="btn btn-warning" />
        </form>

        <h1>Create account</h1>
        <form id="registerForm" action="registration.php" method="post">
        
            <div class="form-group col-md-6">
                Your email:
                <input type="text" class="form-control" name="email" required />
            </div>
            <div class="form-group col-md-6">
                Password:
                <input type="text" class="form-control" name="password" input-typrequired />
            </div>
            <div class="form-group col-md-6">
                First Name:
                <input type="text" class="form-control" name="first" required />
            </div>
            <div class="form-group col-md-6">
                Last Name:
                <input type="text" class="form-control" name="last" required />
            </div>
            <div class="form-group col-md-6">
                Username:
                <input type="text" class="form-control" name="username" />
            </div>

            <input type="submit" value="Create Account" name="new-account" class="btn btn-warning" />
        </form>
    </div>
  
</body>

</html>
