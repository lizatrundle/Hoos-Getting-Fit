<?php
function logWorkout($workoutName, $duration, $Difficulty, $type, $calories, $email)
{
    global $db;
    $query = "insert into loggedWorkout values (:name, :duration, :difficulty, :type, :calories_burner, :email)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name',  $workoutName);
    $statement->bindValue(':duration',  $duration);
    $statement->bindValue(':difficulty',  $Difficulty);
    $statement->bindValue(':type',  $type);
    $statement->bindValue(':calories_burner',  $calories);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $statement->closeCursor();
}

function getAllWorkouts($email) {
    global $db;
    $query="select * from loggedWorkout where email=:email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function updateWorkoutByName($workoutName, $duration, $Difficulty, $type, $calories, $email)
{
    global $db;
    $query="update loggedWorkout set duration=:duration, difficulty=:difficulty, type=:type, calories_burner=:calories_burner where name=:name and email=:email";
    $statement = $db->prepare($query);
    $statement->bindValue(':name',  $workoutName);
    $statement->bindValue(':duration',  $duration);
    $statement->bindValue(':difficulty',  $Difficulty);
    $statement->bindValue(':type',  $type);
    $statement->bindValue(':calories_burner',  $calories);
    $statement->bindValue(':email',  $email);
    $statement->execute();
    $statement->closeCursor();
}
?> 