<?php

function addTransaction($TransactionID, $StoreID)
{
    global $db; 
    $query = "insert into InstoreTransactions values (:TransactionID, :StoreID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':TransactionID', $TransactionID);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllTransactions()
{
    //db
    global $db;
    //query
    $query = "select * from InstoreTransactions";
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
    $query = "select * from InstoreTransactions where TransactionID=:TransactionID";
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

function updateTransaction($TransactionID, $StoreID)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update InstoreTransactions set StoreID=:StoreID where TransactionID=:TransactionID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':TransactionID', $TransactionID);
    $statement->bindValue(':StoreID', $StoreID);
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
    $query = "delete from InstoreTransactions where TransactionID=:transaction_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':transaction_to_delete', $transaction_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>