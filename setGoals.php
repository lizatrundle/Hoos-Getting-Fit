<?php 
require("connectdb.php");
require("setGoals-db.php");

$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';
setrawcookie('email', $_COOKIE['email'] = $email);

$listOfGoals = getAllGoals($email);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['confirmUpdate'])) {
        updateGoalByID($_POST['goalID'], $_POST['targetedMuscle'], $_POST['weightLoss'], $_POST['muscleGain'], $_POST['heartRate'], $_POST['BMIchange'], $_POST['nutritionChange'], $email);
        $listOfGoals = getAllGoals($email);
    } elseif (!empty($_POST['actionButton'])) {
        setGoal($_POST['goalID'], $_POST['targetedMuscle'], $_POST['weightLoss'], $_POST['muscleGain'], $_POST['heartRate'], $_POST['BMIchange'], $_POST['nutritionChange'], $email);
        $listOfGoals = getAllGoals($email);
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
        value="<?php echo $_POST['goalIDToUpdate']; ?>"
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Targeted Muscle Groups
      <input type="text" class="form-control" name="targetedMuscle" required 
      value="<?php echo $_POST['targetedMuscleToUpdate']; ?>"/>        
    </div> 
    <div class="row mb-3 mx-3">
      Weight Loss Goal
      <input type="number" class="form-control" name="weightLoss" required 
      value="<?php echo $_POST['weightLossToUpdate']; ?>"
      />        
    </div> 
    <div class="row mb-3 mx-3">
      Muscle Gain Goal
      <input type="number" class="form-control" name="muscleGain" required 
      value="<?php echo $_POST['muscleGainToUpdate']; ?>"
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Heart Rate Change Goal
      <input type="number" class="form-control" name="heartRate" required 
      value="<?php echo $_POST['heartRateToUpdate']; ?>"
      />        
    </div> 
    <div class="row mb-3 mx-3">
      BMI Change Goal
      <input type="number" class="form-control" name="BMIchange" required 
      value="<?php echo $_POST['BMIchangeToUpdate']; ?>"
      />        
    </div>    
    <div class="row mb-3 mx-3">
      Nutrtion Change Goal
      <input type="text" class="form-control" name="nutritionChange" required 
      value="<?php echo $_POST['nutritionChangeToUpdate']; ?>"
      />        
    </div>
    <div class="row mb-3 mx-3">
      <input value="Set Goal" type="submit" class="btn btn-primary" name="actionButton"
      title="Set Goal"/>        
    </div>  
    <div class="row mb-3 mx-3">
      <input value="Confirm Update" type="submit" class="btn btn-secondary" name="confirmUpdate"
      title="confirm update"/>        
    </div>   
  </form> 
  
</div>  

<div class="row justify-content-center">  
    <table class="w3-table w3-bordered w3-card-4 center" style="width:50%">
      <thead>
      <tr style="background-color:#B0B0B0">
        <th width="14%">Goal ID         
        <th width="14%">Targeted Muscle Groups          
        <th width="14%">Weight Loss Goal
        <th width="14%">Muscle Gain Goal
        <th width="14%">Heart Rate Change Goal
        <th width="14%">BMI Change Goal
        <th width="14%">Nutritional Change Goal
        <th> &nbsp; </th> 
        <th> &nbsp; </th> 
      </tr>
      </thead>
    <?php foreach ($listOfGoals as $goalList): ?>
      <tr>
        <td><?php echo $goalList['goal_id']; ?></td>
        <td><?php echo $goalList['targeted_muscle_groups']; ?></td>        
        <td><?php echo $goalList['weight_loss_goal']; ?></td> 
        <td><?php echo $goalList['muscle_gain_goal']; ?></td>  
        <td><?php echo $goalList['heart_rate_change_goal']; ?></td>
        <td><?php echo $goalList['BMI_change_goal']; ?></td>    
        <td><?php echo $goalList['nutritional_change_goal']; ?></td> 
        <td>
          <form action="setGoals.php" method="post">
          <input value="Update" type="submit" class="btn btn-secondary" name="updateBtn"
          title="Update"/>
          <input type="hidden" name="goalIDToUpdate" value="<?php echo $goalList['goal_id']; ?>" />
          <input type="hidden" name="targetedMuscleToUpdate" value="<?php echo $goalList['targeted_muscle_groups']; ?>" />
          <input type="hidden" name="weightLossToUpdate" value="<?php echo $goalList['weight_loss_goal']; ?>" />
          <input type="hidden" name="muscleGainToUpdate" value="<?php echo $goalList['muscle_gain_goal']; ?>" />
          <input type="hidden" name="heartRateToUpdate" value="<?php echo $goalList['heart_rate_change_goal']; ?>" />
          <input type="hidden" name="BMIchangeToUpdate" value="<?php echo $goalList['BMI_change_goal']; ?>" />
          <input type="hidden" name="nutritionChangeToUpdate" value="<?php echo $goalList['nutritional_change_goal']; ?>" />
        </form> 
        </td>
                     
      </tr>
    <?php endforeach; ?>
    </table>
</div>  
</body>
</html>



