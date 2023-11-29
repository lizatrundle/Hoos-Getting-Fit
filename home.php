<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="your name">
    <meta name="description" content="include some description about your page">
    <title> DashBoard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh">
    <style>
        body {
            background-color: lightblue;
        }

        .nav-tabs {
            margin-top: 20px;
        }
    </style>
</head>

<body>

<?php 

$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';

setrawcookie('email', $_COOKIE['email'] = $email);

require('workoutdb.php');

// Check if the delete account button is clicked
if (isset($_POST['deleteAccount'])) {
    $test = deleteUser($email);
    echo $test;
    if ($test == $email) {
        header("Location: delete.php");
        exit();
    }
    header("Location: login.php");
    // exit();
}

?>  

<div class="container">
    <h1>Welcome, <font color="green" style="font-style:italic"><?php echo $email; ?></font></h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="workouts.php">Workouts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="nutrition.php">Nutrition</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="goals.php">Goals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="progress.php">Progress</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade show active">
            <p>This is your dashboard home.</p>
        </div>
    </div>

    <br/><br/>
    <form method="post" action="">
        <input type="submit" name="logout" value="Log out" class="btn btn-warning" />
        <br/><br/>
        <input type="submit" name="deleteAccount" value="Delete Account" class="btn btn-danger" />
    </form>
</div>

<?php

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
   
    header("Location: logout.php");
    exit();
}

?>
    
</body>
</html>
