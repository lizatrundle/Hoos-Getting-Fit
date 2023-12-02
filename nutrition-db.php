<?php
function logNutrition($mealName, $Calories, $HealthGroup, $Amount, $email)
{
    global $db;
    $query = "insert into Meal_info values (:meal_id, :name_of_food, :health_group, :food_amount, :date, :Email, :Calories)";
    $statement = $db->prepare($query);
    $statement->bindValue(':meal_id',  101); #need to figure this out
    $statement->bindValue(':name_of_food',  $mealName);
    $statement->bindValue(':health_group',  $HealthGroup);
    $statement->bindValue(':food_amount',  $Amount);
    $statement->bindValue(':date',  "2023-10-25");
    $statement->bindValue(':Email',  $email);
    $statement->bindValue(':Calories',  $Calories);
    $statement->execute();
    $statement->closeCursor();
}

function getAllMeals($email) {
    global $db;
    $query="select * from Meal_info where Email=:Email";
    $statement = $db->prepare($query);
    $statement->bindValue(':Email',  $email);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    return $result;
}
?> 