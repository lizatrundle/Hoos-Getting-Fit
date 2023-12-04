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
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="your name">
    <meta name="description" content="include some description about your page"> 

    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background-color: lightblue;
        }

        .nav-tabs {
            margin-top: 20px;
        }
    </style>
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
            <div class="form-group col-md-6">
                Username:
                <input type="text" class="form-control" name="user" required />
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
                <input type="text" class="form-control" name="user" />
            </div>

            <input type="submit" value="Create Account" name="new-account" class="btn btn-warning" />
        </form>
    </div>
  
</body>

</html>
