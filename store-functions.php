<?php

function addStore($StoreID, $StoreName, $Address)
{
    global $db; 
    $query = "insert into Store values (:StoreID, :StoreName, :Address)";
    $statement = $db->prepare($query);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->bindValue(':StoreName', $StoreName);
    $statement->bindValue(':Address', $Address);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllStores()
{
    //db
    global $db;
    //query
    $query = "select * from Store";
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

function getStoreByID($StoreID)
{
    //db
    global $db;
    //query
    $query = "select * from Store where StoreID=:StoreID";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':StoreID', $StoreID);
    //execute
    $statement->execute();
    $result = $statement->fetch();
    //close cursor
    $statement->closeCursor();
    return $result;
}

function updateStore($StoreID, $StoreName, $Address)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update Store set StoreName=:StoreName, Address=:Address where StoreID=:StoreID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->bindValue(':StoreName', $StoreName);
    $statement->bindValue(':Address', $Address);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deleteStore($store_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from Store where StoreID=:store_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':store_to_delete', $store_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>