<?php 
// require("connect-db.php");
require("workout-db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the login form was submitted
  if (isset($_POST['login'])) {
      // Get email and password from the form
      $email = $_POST['email'];
      $password = $_POST['pass'];
      $password = hash('sha256', $password); // Hash the password

      // Check if the user exists in the database
      $result = checkUser($email, $password); // Assuming checkUser is defined in workout-db.php

      if ($result) {
          // User exists, show success message
          session_start();
          $_SESSION['email'] = $email;
          echo "Login successful!";
          header('Location: home.php');
          exit();
      } else {
          // User does not exist, give option to try again or create a new user
          echo "Invalid login. Would you like to try again or create a new user?";
          echo "<br>";
          echo "<a href='login.php'>Try again</a> | <a href='newaccount.php'>Create new user</a>";
      }
  }
  if (isset($_POST['new-account'])) {
    // Process the data for creating a new account
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $id = $_POST['id'];
    $username = $_POST['username'];
    addUser($username, $first, $last, $password, $email, $id); // Assuming addUser is defined in workout-db.php

    // Redirect to the home page after creating the account
    header("Location: home.php");
    exit();
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="liza trundle">
    <meta name="login page" content="login to existing account or create new account"> 

    <title>Hoos getting fit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
</head>

<body>
    <div class="container">
        <br />
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                Your email:
                <input type="text" class="form-control" name="email" required />
            </div>
            <div class="form-group">
                Password:
                <input type="password" class="form-control" name="pass" required />
            </div>
            <input type="submit" value="Login" name="login" class="btn btn-dark" />

        </form>
        <h1>Create account</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                Your email:
                <input type="text" class="form-control" name="email" required />
            </div>
            <div class="form-group">
                Password:
                <input type="text" class="form-control" name="pass" required />
            </div>
            <div class="form-group">
                First Name:
                <input type="text" class="form-control" name="first" required />
            </div>
            <div class="form-group">
                Last Name:
                <input type="text" class="form-control" name="last" required />
            </div>
            <div class="form-group">
                Username:
                <input type="text" class="form-control" name="username" required />
            </div>

            <input type="submit" value="Create Account" name="new-account" class="btn btn-dark" />

        </form>


    </div>
</body>

</html>

