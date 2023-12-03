<?php 
require("connect-db.php");
require("nutrition-db.php");
$email = array_key_exists('email', $_COOKIE) ? $_COOKIE['email'] : 'email not found in cookie';
setrawcookie('email', $_COOKIE['email'] = $email);

$listOfMeals=getAllMeals($email);
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (!empty($_POST['actionButton'])) {
       logNutrition($_POST['mealName'], $_POST['Calories'], $_POST['HealthGroup'], $_POST['Amount'], $email);
       $listOfMeals=getAllMeals($email);
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

    <title>Nutrition</title>
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
  <h1>Log Nutrition</h1>
  <form name="logNutritionForm" action="nutrition.php" method="post"> 
    <div class="row mb-3 mx-3">
      Name of food eaten
      <input type="text" class="form-control" name="mealName" required 
        value=""
      />        
    </div>  
    <div class="row mb-3 mx-3">
      Calories
      <input type="number" class="form-control" name="Calories" required 
      value=""/>        
    </div> 
    <div class="row mb-3 mx-3">
      Health Group
      <input type="text" class="form-control" name="HealthGroup" required 
      value=""
      />        
    </div> 
    <div class="row mb-3 mx-3">
      Amount (in grams)
      <input type="number" class="form-control" name="Amount" required 
      value=""
      />        
    </div>    
    <div class="row mb-3 mx-3">
      <input value="Log Nutrition" type="submit" class="btn btn-primary" name="actionButton"
      title="Log Nutrition"/>        
    </div>  
  </form> 
</div>  

<div class="row justify-content-center">  
    <table class="w3-table w3-bordered w3-card-4 center" style="width:50%">
      <thead>
      <tr style="background-color:#B0B0B0">
        <th width="25%">Name of food eaten        
        <th width="25%">Calories        
        <th width="25%">Health Group
        <th width="25%">Amount
      </tr>
      </thead>
    <?php foreach ($listOfMeals as $meal): ?>
      <tr>
        <td><?php echo $meal['name_of_food']; ?></td>
        <td><?php echo $meal['Calories']; ?></td>        
        <td><?php echo $meal['health_group']; ?></td> 
        <td><?php echo $meal['food_amount']; ?></td>      
      </tr>
    <?php endforeach; ?>
    </table>
</div>  
</body>
</html>



