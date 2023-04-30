<?php

function addSale($StoreID, $ProductID)
{
    global $db; 
    $query = "insert into Sells values (:StoreID, :ProductID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->bindValue(':ProductID', $ProductID);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllSales()
{
    //db
    global $db;
    //query
    $query = "select * from Sells";
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

function getSaleByID($StoreID)
{
    //db
    global $db;
    //query
    $query = "select * from Sells where StoreID=:StoreID";
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

function updateSale($StoreID, $ProductID)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update Sells set ProductID=:ProductID where StoreID=:StoreID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->bindValue(':ProductID', $ProductID);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deleteSale($sale_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from Sells where ProductID=:sale_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':sale_to_delete', $sale_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>