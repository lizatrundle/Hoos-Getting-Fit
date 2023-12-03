<?php 
require("connect-db.php");
require("setGoals-db.php");
$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';
setrawcookie('email', $_COOKIE['email'] = $email);

$listOfGoals=getAllGoals($email);
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (!empty($_POST['actionButton'])) {
       setGoal($_POST['goalID'], $_POST['targetedMuscle'], $_POST['weightLoss'], $_POST['muscleGain'], $_POST['heartRate'], $_POST['BMIchange'], $_POST['nutritionChange'], $email);
       $listOfGoals=getAllGoals($email);
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

    <title>Goals</title>
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
<a href="home.php" title="home"> return home</a>   
<div class="container">
  <h1>Set New Goal</h1>
  <form name="setGoalForm" action="setGoals.php" method="post"> 
    <div class="row mb-3 mx-3">
      Goal ID
      <input type="text" class="form-control" name="goalID" required 
        value=""
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Targeted Muscle Groups
      <input type="number" class="form-control" name="targetedMuscle" required 
      value=""/>        
    </div> 
    <div class="row mb-3 mx-3">
      Weight Loss Goal
      <input type="text" class="form-control" name="weightLoss" required 
      value=""
      />        
    </div> 
    <div class="row mb-3 mx-3">
      Muscle Gain Goal
      <input type="text" class="form-control" name="muscleGain" required 
      value=""
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Heart Rate Change Goal
      <input type="number" class="form-control" name="heartRate" required 
      value=""
      />        
    </div>   
    <div class="row mb-3 mx-3">
      BMI Change Goal
      <input type="number" class="form-control" name="BMIchange" required 
      value=""
      />        
    </div>   
    <div class="row mb-3 mx-3">
      Nutritional Change Goal
      <input type="number" class="form-control" name="nutritionChange" required 
      value=""
      />        
    </div>   
    <div class="row mb-3 mx-3">
      <input value="Set Goal" type="submit" class="btn btn-primary" name="actionButton"
      title="Set Goal"/>        
    </div>  
  </form> 
</div>  

<div class="row justify-content-center">  
    <table class="w3-table w3-bordered w3-card-4 center" style="width:50%">
      <thead>
      <tr style="background-color:#B0B0B0">
        <th width="20%">Goal ID       
        <th width="20%">Targeted Muscle Groups     
        <th width="20%">Weight Loss Goal
        <th width="20%">Muscle Gain Goal
        <th width="20%">Heart Rate Change Goal
        <th width="20%">BMI Change Goal
        <th width="20%">Nutritional Change Goal
        <th> &nbsp; </th> 
        <th> &nbsp; </th> 
      </tr>
      </thead>
    <?php foreach ($listOfGoals as $goalList): ?>
      <tr>
        <td><?php echo $goalList['goalID']; ?></td>
        <td><?php echo $goalList['targetedMuscle']; ?></td>        
        <td><?php echo $goalList['weightLoss']; ?></td> 
        <td><?php echo $goalList['muscleGain']; ?></td>  
        <td><?php echo $goalList['heartRate']; ?></td>
        <td><?php echo $goalList['BMIchange']; ?></td>
        <td><?php echo $goalList['nutritionChange']; ?></td>
      </tr>
    <?php endforeach; ?>
    </table>
</div>  
</body>
</html>


