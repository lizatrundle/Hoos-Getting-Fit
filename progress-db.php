<?php
function logProgress($metricID, $weightChange, $muscleChange, $newNutrients, $hrChange, $bmiChange, $email)
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
    $query="select * from Performance where email=:email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function updateProgressByID($metricID, $weightChange, $muscleChange, $newNutrients, $hrChange, $bmiChange, $email)
{
    global $db;
    $query = "UPDATE Performance 
              SET metric_id = :metricID, 
                  weight_change = :weightChange, 
                  muscle_change = :muscleChange, 
                  new_nutrients = :newNutrients, 
                  heart_rate_change = :hrChange, 
                  BMI_change = :bmiChange, 
              WHERE metric_id = :metricIDParam AND email = :email";

    $statement = $db->prepare($query);
    $statement->bindValue(':metricID', $metricID);
    $statement->bindValue(':weightChange', $weightChange);
    $statement->bindValue(':muscleChange', $muscleChange);
    $statement->bindValue(':newNutrients', $newNutrients);
    $statement->bindValue(':hrChange', $hrChange);
    $statement->bindValue(':bmiChange', $bmiChange);
    $statement->bindValue(':metricIDParam', $metricID);
    $statement->bindValue(':email', $email);

    $statement->execute();
    $statement->closeCursor();
}
?> 