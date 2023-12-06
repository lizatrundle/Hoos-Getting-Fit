<?php 
require("connectdb.php");
require("progress-db.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';
setrawcookie('email', $_COOKIE['email'] = $email);

$listOfProgressMetrics=getAllProgressMetrics($email);
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    if (!empty($_POST['confirmUpdate'])) {
      updateProgressbyID($_POST['metricID'], $_POST['weightChange'], $_POST['muscleChange'], $_POST['newNutrients'], $_POST['hrChange'], $_POST['bmiChange'], $email);
      $listOfProgressMetrics=getAllProgressMetrics($email);
    }
    elseif (!empty($_POST['actionButton'])) {
      logProgress($_POST['metricID'], $_POST['weightChange'], $_POST['muscleChange'], $_POST['newNutrients'], $_POST['hrChange'], $_POST['bmiChange'], $email);
      $listOfProgressMetrics=getAllProgressMetrics($email);
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

    <title>Progress</title>
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
  <h1>Log Progress</h1>
  <form name="logProgressForm" action="progress.php" method="post"> 
    <div class="row mb-3 mx-3">
      Metric ID
      <input type="text" class="form-control" name="metricID" required 
        value="<?php echo $_POST['metricIDToUpdate']; ?>"
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Weight Change
      <input type="number" class="form-control" name="weightChange" required 
      value="<?php echo $_POST['weightChangeToUpdate']; ?>"/>        
    </div> 
    <div class="row mb-3 mx-3">
      Muscle Change
      <input type="text" class="form-control" name="muscleChange" required 
      value="<?php echo $_POST['muscleChangeToUpdate']; ?>"
      />        
    </div> 
    <div class="row mb-3 mx-3">
      New Nutrients
      <input type="text" class="form-control" name="newNutrients" required 
      value="<?php echo $_POST['newNutrientsToUpdate']; ?>"
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Heart Rate Change
      <input type="number" class="form-control" name="hrChange" required 
      value="<?php echo $_POST['hrChangeToUpdate']; ?>"
      />        
    </div>   
    <div class="row mb-3 mx-3">
      BMI Change
      <input type="number" class="form-control" name="bmiChange" required 
      value="<?php echo $_POST['bmiChangeToUpdate']; ?>"
      />        
    </div>    
    <div class="row mb-3 mx-3">
      <input value="Log Progress" type="submit" class="btn btn-primary" name="actionButton"
      title="Log Progress"/>        
    </div>  
    <div class="row mb-3 mx-3">
      <input value="Confirm Update" type="submit" class="btn btn-primary" name="confirmUpdate"
      title="confirm update"/>        
    </div> 
  </form> 
</div>  

<div class="row justify-content-center">  
    <table class="w3-table w3-bordered w3-card-4 center" style="width:50%">
      <thead>
      <tr style="background-color:#B0B0B0">
        <th width="20%">Metric ID       
        <th width="20%">Weight Change   
        <th width="20%">Muscle Change
        <th width="20%">New Nutrients
        <th width="20%">Heart Rate Change
        <th width="20%">BMI Change
        <th> &nbsp; </th> 
        <th> &nbsp; </th> 
      </tr>
      </thead>
    <?php foreach ($listOfProgressMetrics as $metricsList): ?>
      <tr>
        <td><?php echo $metricsList['metric_id']; ?></td>
        <td><?php echo $metricsList['weight_change']; ?></td>        
        <td><?php echo $metricsList['muscle_change']; ?></td> 
        <td><?php echo $metricsList['new_nutrients']; ?></td>  
        <td><?php echo $metricsList['heart_rate_change']; ?></td>
        <td><?php echo $metricsList['BMI_change']; ?></td>
        <td>
          <form action="progress.php" method="post">
          <input value="Update" type="submit" class="btn btn-secondary" name="updateBtn"
          title="Update"/>
          <input type="hidden" name="metricIDToUpdate" value="<?php echo $metricList['metric_id']; ?>" />
          <input type="hidden" name="weightChangeToUpdate" value="<?php echo $metricList['weight_change']; ?>" />
          <input type="hidden" name="muscleChangeToUpdate" value="<?php echo $metricList['muscle_change']; ?>" />
          <input type="hidden" name="newNutrientsToUpdate" value="<?php echo $metricList['new_nutrients']; ?>" />
          <input type="hidden" name="hrChangeToUpdate" value="<?php echo $metricList['heart_rate_change']; ?>" />
          <input type="hidden" name="bmiChangeToUpdate" value="<?php echo $metricList['BMI_change']; ?>" />
        </form> 
        </td>              
      </tr>
    <?php endforeach; ?>
    </table>
</div>  
</body>
</html>


