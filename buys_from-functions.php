<?php


function addPurchase($ManufacturerID, $StoreID)
{
    global $db; 
    $query = "insert into BuysFrom values (:ManufacturerID, :StoreID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':ManufacturerID', $ManufacturerID);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->execute();
    $statement->closeCursor();

}


function selectAllPurchases()
{
    //db
    global $db;
    //query
    $query = "select * from BuysFrom";
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

function getPurchaseByID($StoreID)
{
    //db
    global $db;
    //query
    $query = "select * from BuysFrom where StoreID=:StoreID";
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

function updatePurchase($ManufacturerID, $StoreID)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update BuysFrom set StoreID=:StoreID where ManufacturerID=:ManufacturerID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':ManufacturerID', $ManufacturerID);
    $statement->bindValue(':StoreID', $StoreID);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deletePurchase($purchase_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from BuysFrom where StoreID=:purchase_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':purchase_to_delete', $purchase_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>