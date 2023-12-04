<?php
function logProgress($metric_id, $weight_change, $muscle_change, $new_nutrients, $heart_rate_change, $BMI_change, $email)
{
    global $db;
    $query = "insert into Performance values (:metric_id, :weight_change, :muscle_change, :new_nutrients, :heart_rate_change, :BMI_change, :email)";
    $statement = $db->prepare($query);
    $statement->bindValue(':metric_id',  $metricID);
    $statement->bindValue(':weight_change',  $weightChange);
    $statement->bindValue(':muscle_change',  $muscleChange);
    $statement->bindValue(':new_nutrients',  $newNutrients);
    $statement->bindValue(':heart_rate_change',  $hrChange);
    $statement->bindValue(':BMI_change',  $bmiChange);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $statement->closeCursor();
}

function getAllProgressMetrics($email) {
    global $db;
    $query="select * from Performance where Email=:email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    return $result;
}
?> 