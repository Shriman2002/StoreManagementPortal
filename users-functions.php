<?php

function addUser($Name, $EmployeeID, $StoreID)
{
    global $db; 
    //old style: $query = "insert into friends values ($name, $major, $year)";
    //old style: $statement = $db->query($query); //compile and exe
    $query = "insert into User values (:EmployeeID, :Name, :StoreID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':EmployeeID', $EmployeeID);
    $statement->bindValue(':Name', $Name);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->execute();
    $statement->closeCursor();
}

function selectAllUsers()
{
    //db
    global $db;
    //query
    $query = "select * from User";
    //prepeare
    $statement = $db->prepare($query);
    //execute
    $statement->execute();
    //retrieve
    $results = $statement->fetchAll(); //fetch()
    //close cursor
    $statement->closeCursor();

    //return results
    return $results;

}

function getUserByName($Name)
{
    //db
    global $db;
    //query
    $query = "select * from User where Name=:Name";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':Name', $Name);
    //execute
    $statement->execute();
    $result = $statement->fetch();
    //close cursor
    $statement->closeCursor();
    return $result;
}

function updateUser($Name, $EmployeeID, $StoreID)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update User set Name=:Name, StoreID=:StoreID where EmployeeID=:EmployeeID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':EmployeeID', $EmployeeID);
    $statement->bindValue(':Name', $Name);
    $statement->bindValue(':StoreID', $StoreID);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deleteUser($user_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from User where EmployeeID=:user_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':user_to_delete', $user_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}
?>