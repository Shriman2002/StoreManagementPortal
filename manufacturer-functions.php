<?php

function addManufacturer($ManufacturerID, $ManufacturerName)
{
    global $db; 
    $query = "insert into Manufacturer values (:ManufacturerID, :ManufacturerName)";
    $statement = $db->prepare($query);
    $statement->bindValue(':ManufacturerID', $ManufacturerID);
    $statement->bindValue(':ManufacturerName', $ManufacturerName);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllManufacturers()
{
    //db
    global $db;
    //query
    $query = "select * from Manufacturer";
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

function getManufacturerByID($ManufacturerID)
{
    //db
    global $db;
    //query
    $query = "select * from Manufacturer where ManufacturerID=:ManufacturerID";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':ManufacturerID', $ManufacturerID);
    //execute
    $statement->execute();
    $result = $statement->fetch();
    //close cursor
    $statement->closeCursor();
    return $result;
}

function updateManufacturer($ManufacturerID, $ManufacturerName)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update Manufacturer set ManufacturerName=:ManufacturerName where ManufacturerID=:ManufacturerID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':ManufacturerID', $ManufacturerID);
    $statement->bindValue(':ManufacturerName', $ManufacturerName);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deleteManufacturer($manufacturer_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from Manufacturer where ManufacturerID=:manufacturer_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':manufacturer_to_delete', $manufacturer_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>