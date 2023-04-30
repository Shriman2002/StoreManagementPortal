<?php

function addMake($ManufacturerID, $ProductID)
{
    global $db; 
    $query = "insert into Makes values (:ManufacturerID, :ProductID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':ManufacturerID', $ManufacturerID);
    $statement->bindValue(':ProductID', $ProductID);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllMakes()
{
    //db
    global $db;
    //query
    $query = "select * from Makes";
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

function getMakeByID($ProductID)
{
    //db
    global $db;
    //query
    $query = "select * from Makes where ProductID=:ProductID";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':ProductID', $ProductID);
    //execute
    $statement->execute();
    $result = $statement->fetch();
    //close cursor
    $statement->closeCursor();
    return $result;
}

function updateMake($ManufacturerID, $ProductID)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update Makes set ManufacturerID=:ManufacturerID where ProductID=:ProductID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':ManufacturerID', $ManufacturerID);
    $statement->bindValue(':ProductID', $ProductID);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deleteMake($make_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from Makes where ProductID=:make_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':make_to_delete', $make_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>