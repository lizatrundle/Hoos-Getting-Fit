<?php 
require("connect-db.php");
require("workout-db.php");
<?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="your name">
    <meta name="description" content="include some description about your page"> 

    <title>Get started with db</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
</head>



<body> 
<div class="container">
  <h1>Hoos Getting Fit Home page </h1>
    <h2>current users</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Username</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($listOfUsers as $user): ?>
          <tr>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['first']; ?></td>
            <td><?php echo $user['last']; ?></td>
            <td><?php echo $user['email']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </body>
</html>
