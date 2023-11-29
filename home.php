
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="your name">
    <meta name="description" content="include some description about your page">
    <title> DashBoard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      >
</head>
<body style="background-color: lightorange;">

<?php 


$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';

setrawcookie('email', $_COOKIE['email'] = $email);

?>  
  <div class="container">
    <h1>Welcome, <font color="green" style="font-style:italic"><?php echo $email; ?></font></h1>
    <p>
      This is your dahsboard 
    </p>
   
    <p>
      Log workout <a href="logworkout.php" title="Start the first question"> log workout</a>.
      <br/><br/>
      Or <a href="logout.php">log out</a>.     
    </p>

    
  </div>    
</body>
</html>
