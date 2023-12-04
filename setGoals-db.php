<?php
function setGoal($goal_id, $targeted_muscle_groups, $weight_loss_goal, $muscle_gain_goal, $heart_rate_change_goal, $BMI_change_goal, $nutritional_change_goal, $email)
{
    global $db;
    $query = "insert into GoalsInfo values (:goalID, :targetedMuscle, :weightLoss, :muscleGain, :heartRate, :BMIchange, :nutritionChange, :email)";
    $statement = $db->prepare($query);
    $statement->bindValue(':goalID',  $goal_id);
    $statement->bindValue(':targetedMuscle',  $targeted_muscle_groups);
    $statement->bindValue(':weightLoss',  $weight_loss_goal);
    $statement->bindValue(':muscleGain',  $muscle_gain_goal);
    $statement->bindValue(':heartRate',  $heart_rate_change_goal);
    $statement->bindValue(':BMIchange',  $BMI_change_goal);
    $statement->bindValue(':nutritionChange',  $nutritional_change_goal);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $statement->closeCursor();
}

function getAllGoals($email) {
    global $db;
    $query="select * from GoalsInfo where email=:email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    return $result;
}
?> 