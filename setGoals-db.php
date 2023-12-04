<?php
function setGoal($goalID, $targetedMuscle, $weightLoss, $muscleGain, $heartRate, $BMIchange, $nutritionChange, $email)
{
    global $db;
    $query = "insert into GoalsInfo values (:goal_id, :targeted_muscle_groups, :weight_loss_goal, :muscle_gain_goal, :heart_rate_change_goal, :BMI_change_goal, :nutritional_change_goal, :email)";
    $statement = $db->prepare($query);
    $statement->bindValue(':goal_id',  $goalID);
    $statement->bindValue(':targeted_muscle_groups',  $targetedMuscle);
    $statement->bindValue(':weight_loss_goal',  $weightLoss);
    $statement->bindValue(':muscle_gain_goal',  $muscleGain);
    $statement->bindValue(':heart_rate_change_goal',  $heartRate);
    $statement->bindValue(':BMI_change_goal',  $BMIchange);
    $statement->bindValue(':nutritional_change_goal',  $nutritionChange);
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