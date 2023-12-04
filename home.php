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

<body>

<?php 
require('workoutdb.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';
// set for username 
setrawcookie('email', $_COOKIE['email'] = $email);

$user = array_key_exists('username', $_COOKIE) ? $_COOKIE['user'] : 'username not found in cookie';
#setrawcookie('user', $_COOKIE['user'] = $user);

$personalInfo = getPersonalInfo($user);



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
            <a class="nav-link" href="logworkout.php">Workouts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="nutrition.php">Nutrition</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="setGoals.php">Goals</a>
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
        <h2>Your Personal Information:</h2>
            <?php
            foreach ($personalInfo as $info) {
                echo "<p>Username: " . $info['username'] . "</p>";
                echo "<p>Resting Heart Rate: " . $info['resting_heart_rate'] . "</p>";
                echo "<p>Workout Status: " . $info['workout_status'] . "</p>";
                echo "<p>Age: " . $info['age'] . "</p>";
                echo "<p>Weight: " . $info['weight'] . "</p>";
                echo "<p>BMI: " . $info['BMI'] . "</p>";
              
            }
            ?>

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
