<?php

function addCost($DeliveryTime, $DeliveryCost)
{
    global $db; 
    $query = "insert into DeliveryCosts values (:DeliveryTime, :DeliveryCost)";
    $statement = $db->prepare($query);
    $statement->bindValue(':DeliveryTime', $DeliveryTime);
    $statement->bindValue(':DeliveryCost', $DeliveryCost);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllCosts()
{
    //db
    global $db;
    //query
    $query = "select * from DeliveryCosts";
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

function getCostByID($DeliveryTime)
{
    //db
    global $db;
    //query
    $query = "select * from DeliveryCosts where DeliveryTime=:DeliveryTime";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':DeliveryTime', $DeliveryTime);
    //execute
    $statement->execute();
    $result = $statement->fetch();
    //close cursor
    $statement->closeCursor();
    return $result;
}

function updateCost($DeliveryTime, $DeliveryCost)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update DeliveryCosts set DeliveryCost=:DeliveryCost where DeliveryTime=:DeliveryTime";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':DeliveryTime', $DeliveryTime);
    $statement->bindValue(':DeliveryCost', $DeliveryCost);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deleteCost($transaction_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from DeliveryCosts where DeliveryTime=:transaction_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':transaction_to_delete', $transaction_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>