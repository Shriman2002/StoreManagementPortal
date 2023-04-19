<?php

function addTransaction($TransactionID, $DeliveryTime, $DeliveryAddress)
{
    global $db; 
    $query = "insert into OnlineTransactions values (:TransactionID, :DeliveryTime, :DeliveryAddress)";
    $statement = $db->prepare($query);
    $statement->bindValue(':TransactionID', $TransactionID);
    $statement->bindValue(':DeliveryTime', $DeliveryTime);
    $statement->bindValue(':DeliveryAddress', $DeliveryAddress);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllTransactions()
{
    //db
    global $db;
    //query
    $query = "select * from OnlineTransactions";
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

function getTransactionByID($TransactionID)
{
    //db
    global $db;
    //query
    $query = "select * from OnlineTransactions where TransactionID=:TransactionID";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':TransactionID', $TransactionID);
    //execute
    $statement->execute();
    $result = $statement->fetch();
    //close cursor
    $statement->closeCursor();
    return $result;
}

function updateTransaction($TransactionID, $DeliveryTime, $DeliveryAddress)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update OnlineTransactions set DeliveryTime=:DeliveryTime, DeliveryAddress=:DeliveryAddress where TransactionID=:TransactionID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':TransactionID', $TransactionID);
    $statement->bindValue(':DeliveryTime', $DeliveryTime);
    $statement->bindValue(':DeliveryAddress', $DeliveryAddress);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deleteTransaction($transaction_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from OnlineTransactions where TransactionID=:transaction_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':transaction_to_delete', $transaction_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>