<?php 
require("connect-db.php");
require("logWorkout-db.php");
$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';
setrawcookie('email', $_COOKIE['email'] = $email);

$listOfWorkouts=getAllWorkouts($email);
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (!empty($_POST['actionButton'])) {
       logWorkout($_POST['workoutName'], $_POST['duration'], $_POST['Difficulty'], $_POST['Type'], $_POST['Calories'], $email);
       $listOfWorkouts=getAllWorkouts($email);
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="your name">
    <meta name="description" content="include some description about your page"> 

    <title>Log Workout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body> 
<a href="home.php" title="home"> return home</a>   
<div class="container">
  <h1>Log New Workout</h1>
  <form name="logWorkOutForm" action="logworkout.php" method="post"> 
    <div class="row mb-3 mx-3">
      Name of workout
      <input type="text" class="form-control" name="workoutName" required 
        value=""
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Duration
      <input type="number" class="form-control" name="duration" required 
      value=""/>        
    </div> 
    <div class="row mb-3 mx-3">
      Difficulty
      <input type="text" class="form-control" name="Difficulty" required 
      value=""
      />        
    </div> 
    <div class="row mb-3 mx-3">
      Type
      <input type="text" class="form-control" name="Type" required 
      value=""
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Calories Burned
      <input type="number" class="form-control" name="Calories" required 
      value=""
      />        
    </div>   
    <div class="row mb-3 mx-3">
      <input value="Log Workout" type="submit" class="btn btn-primary" name="actionButton"
      title="Log Workout"/>        
    </div>  
  </form> 
</div>  

<div class="row justify-content-center">  
    <table class="w3-table w3-bordered w3-card-4 center" style="width:50%">
      <thead>
      <tr style="background-color:#B0B0B0">
        <th width="20%">Name        
        <th width="20%">Duration        
        <th width="20%">Difficulty
        <th width="20%">Type
        <th width="20%">Calories Burned
        <th> &nbsp; </th> 
        <th> &nbsp; </th> 
      </tr>
      </thead>
    <?php foreach ($listOfWorkouts as $workOut): ?>
      <tr>
        <td><?php echo $workOut['name']; ?></td>
        <td><?php echo $workOut['duration']; ?></td>        
        <td><?php echo $workOut['difficulty']; ?></td> 
        <td><?php echo $workOut['type']; ?></td>  
        <td><?php echo $workOut['calories_burner']; ?></td>   
        <td>
          <form action="logworkout.php" method="post">
          <input value="Update" type="submit" class="btn btn-secondary" name="updateBtn"
          title="Update"/>
          <input type="hidden" name="workoutName" value="<?php echo $workOut['workoutName']; ?>" />
          <input type="hidden" name="duration" value="<?php echo $workOut['duration']; ?>" />
          <input type="hidden" name="difficulty" value="<?php echo $workOut['difficulty']; ?>" />
          <input type="hidden" name="type" value="<?php echo $workOut['type']; ?>" />
          <input type="hidden" name="calories_burner" value="<?php echo $workOut['calories_burner']; ?>" />
        </form> 
        </td>
        <td>
          <form action="logworkout.php" method="post"> 
          <input value="Delete" type="submit" class="btn btn-danger" name="deleteButton"
          title="delete"/>  
          <input type="hidden" name="workoutToDelete" value="<?php echo $workOut['workoutName']; ?>" />
        </form> 
        </td>                   
      </tr>
    <?php endforeach; ?>
    </table>
</div>  
</body>
</html>


