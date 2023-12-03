<?php 
require("connect-db.php");
require("progress-db.php");
$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';
setrawcookie('email', $_COOKIE['email'] = $email);

$listOfProgressMetrics=getAllProgressMetrics($email);
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (!empty($_POST['actionButton'])) {
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
        value=""
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Weight Change
      <input type="number" class="form-control" name="weightChange" required 
      value=""/>        
    </div> 
    <div class="row mb-3 mx-3">
      Muscle Change
      <input type="text" class="form-control" name="muscleChange" required 
      value=""
      />        
    </div> 
    <div class="row mb-3 mx-3">
      New Nutrients
      <input type="text" class="form-control" name="newNutrients" required 
      value=""
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Heart Rate Change
      <input type="number" class="form-control" name="hrChange" required 
      value=""
      />        
    </div>   
    <div class="row mb-3 mx-3">
      BMI Change
      <input type="number" class="form-control" name="bmiChange" required 
      value=""
      />        
    </div>    
    <div class="row mb-3 mx-3">
      <input value="Log Progress" type="submit" class="btn btn-primary" name="actionButton"
      title="Log Progress"/>        
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
        <td><?php echo $metricsList['metricID']; ?></td>
        <td><?php echo $metricsList['weightChange']; ?></td>        
        <td><?php echo $metricsList['muscleChange']; ?></td> 
        <td><?php echo $metricsList['newNutrients']; ?></td>  
        <td><?php echo $metricsList['hrChange']; ?></td>
        <td><?php echo $metricsList['bmiChange']; ?></td>              
      </tr>
    <?php endforeach; ?>
    </table>
</div>  
</body>
</html>


