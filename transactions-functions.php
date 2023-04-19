<?php

function addTransaction($TransactionID, $StoreID, $Quantity, $Cost, $Date)
{
    global $db; 
    $query = "insert into Transactions values (:TransactionID, :StoreID, :Quantity, :Cost, :Date)";
    $statement = $db->prepare($query);
    $statement->bindValue(':TransactionID', $TransactionID);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->bindValue(':Quantity', $Quantity);
    $statement->bindValue(':Cost', $Cost);
    $statement->bindValue(':Date', $Date);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllTransactions()
{
    //db
    global $db;
    //query
    $query = "select * from Transactions";
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
    $query = "select * from Transactions where TransactionID=:TransactionID";
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

function updateTransaction($TransactionID, $StoreID, $Quantity, $Cost, $Date)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update Transactions set StoreID=:StoreID, Quantity=:Quantity, Cost=:Cost, Date=:Date where TransactionID=:TransactionID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':TransactionID', $TransactionID);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->bindValue(':Quantity', $Quantity);
    $statement->bindValue(':Cost', $Cost);
    $statement->bindValue(':Date', $Date);
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
    $query = "delete from Transactions where TransactionID=:transaction_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':transaction_to_delete', $transaction_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>