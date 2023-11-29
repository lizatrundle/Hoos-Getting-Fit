
<?php
# Connect to the database
require("connectdb.php");

# function to create a new user account 
function addUser($username, $first, $last, $pass, $email, $id)
{
    global $db;
    $query = "insert into user values (:username, :first, :last, SHA2(:password, 256), :email, :id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':first', $first);
    $statement->bindValue(':last', $last);
    $statement->bindValue(':password', $pass); // Corrected this line
    $statement->bindValue(':email', $email);
    $statement->bindValue(':id', $id); // Added a missing semicolon
    $statement->execute();
    $statement->closeCursor();
    return $email; // Added a missing semicolon and fixed the return statement
}
function checkUser($email, $password)
{
    global $db;
    $query = "select email from user where email =:email and password =:password";
    
    # including security measure for encryption
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    
    $result = $statement->fetchColumn();
    $statement->closeCursor();
    
    return $result;
}
// function getAllUsers() {
//     global $db;
//     $query="select * from user";
//     $statement = $db->prepare($query);
//     $statement->execute();
//     $result=$statement->fetchAll();
//     $statement->closeCursor();
//     return $result;
// }

// function updateFriendByName($name, $major, $year) 
// {
//     global $db;
//     $query="update friends set major=:major, year=:year where name=:name";
//     $statement = $db->prepare($query);
//     $statement->bindValue(':name',  $name);
//     $statement->bindValue(':major',  $major);
//     $statement->bindValue(':year',  $year);
//     $statement->execute();
//     $statement->closeCursor();
// }

// function deleteUser($username) {
//     global $db;
//     $query="delete from user where username=:username";
//     $statement = $db->prepare($query);
//     $statement->bindValue(':username',  $username);
//     $statement->execute();
//     $statement->closeCursor();
// }

// function getPersonInfo($username){
//     global $db;
//     $query="select * from user where username=:username";
//     $statement = $db->prepare($query);
//     $statement->bindValue(':username',  $username); // FILL IN PLAIN STRING 
    
//     $statement->execute();
//     $result=$statement->fetchAll();
//     $statement->closeCursor();
//     return $result;
// }

?>
