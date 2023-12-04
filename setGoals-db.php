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
function updateGoalByID($goalID, $targetedMuscle, $weightLoss, $muscleGain, $heartRate, $BMIchange, $nutritionChange, $email)
{
    global $db;
    $query = "UPDATE GoalsInfo 
              SET goal_id = :goalID, 
                  targeted_muscle_groups = :targetedMuscle, 
                  weight_loss_goal = :weightLoss, 
                  muscle_gain_goal = :muscleGain, 
                  heart_rate_change_goal = :heartRate, 
                  BMI_change_goal = :BMIchange, 
                  nutritional_change_goal = :nutritionChange 
              WHERE goal_id = :goalIDParam AND email = :email";

    $statement = $db->prepare($query);
    $statement->bindValue(':goalID', $goalID);
    $statement->bindValue(':targetedMuscle', $targetedMuscle);
    $statement->bindValue(':weightLoss', $weightLoss);
    $statement->bindValue(':muscleGain', $muscleGain);
    $statement->bindValue(':heartRate', $heartRate);
    $statement->bindValue(':BMIchange', $BMIchange);
    $statement->bindValue(':nutritionChange', $nutritionChange);
    $statement->bindValue(':goalIDParam', $goalID);
    $statement->bindValue(':email', $email);

    $statement->execute();
    $statement->closeCursor();
}

?> 