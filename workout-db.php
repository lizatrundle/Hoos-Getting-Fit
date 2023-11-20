
<?php
# Connect to the database
require("connect-db.php");

# function to create a new user account 
function addUser($username, $first, $last, $pass, $email, $id)
# added layer of security --> hashing password 
{
    global $db;
    //$query = "insert into friends values ('" . $friendname . "', '" . $major . "', '" . $year . "')";
    $query = "insert into user values (:username, :first, :last, SHA2(:password, 256),:email, :id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':first', $first);
    $statement->bindValue(':last', $last);
    $statement->bindValue(':pass', $pass);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':photo_URL_ID', $id)
    $statement->execute();
    $statement->closeCursor();
    return $email # return email of new user 
}


# function to check if a user exitsts in the database when they try to login 
function checkUser($email, $password)
{
    global $db;
    $query = "select email from user where email=:email AND password=SHA2(:password, 256);";
    # including security measure for encryption
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
	$statement->bindValue(':password', $password);
    $statement->execute();
    $result = $statement->fetchColumn();
    $statement->closeCursor();
	return $result;
}

function getAllUsers() {
    global $db;
    $query="select * from user";
    $statement = $db->prepare($query);
    $statement->execute();
    $result=$statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

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
