<?php
function logProgress($metric_id, $weight_change, $muscle_change, $new_nutrients, $heart_rate_change, $BMI_change, $email)
{
    global $db;
    $query = "insert into loggedProgress values (:goalID, :weightChange, :muscleChange, :newNutrients, :hrChange, :bmiChange, :email)";
    $statement = $db->prepare($query);
    $statement->bindValue(':metricID',  $metric_id);
    $statement->bindValue(':weightChange',  $weight_change);
    $statement->bindValue(':muscleChange',  $muscle_change);
    $statement->bindValue(':newNutrients',  $new_nutrients);
    $statement->bindValue(':hrChange',  $heart_rate_change);
    $statement->bindValue(':bmiChange',  $BMI_change);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $statement->closeCursor();
}

function getAllProgressMetrics($email) {
    global $db;
    $query="select * from loggedProgress where email=:email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    return $result;
}
?> 