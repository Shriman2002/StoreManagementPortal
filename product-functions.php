<?php

function addProduct($ProductID, $StoreID, $ProductName, $SalePrice, $PurchasePrice)
{
    global $db; 
    //old style: $query = "insert into friends values ($name, $major, $year)";
    //old style: $statement = $db->query($query); //compile and exe
    $query = "insert into Product values (:ProductID, :StoreID, :ProductName, :SalePrice, :PurchasePrice)";
    $statement = $db->prepare($query);
    $statement->bindValue(':ProductID', $ProductID);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->bindValue(':ProductName', $ProductName);
    $statement->bindValue(':SalePrice', $SalePrice); 
    $statement->bindValue(':PurchasePrice', $PurchasePrice);
    $statement->execute();
    $statement->closeCursor();
}


function selectAllProducts()
{
    //db
    global $db;
    //query
    $query = "select * from Product";
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

function getProductByID($ProductID)
{
    //db
    global $db;
    //query
    $query = "select * from Product where ProductID=:ProductID";
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

function updateProduct($ProductID, $StoreID, $ProductName, $SalePrice, $PurchasePrice)
{
    //db
    global $db;
    //echo "in update";
    //query
    $query = "update Product set StoreID=:StoreID, ProductName=:ProductName, SalePrice=:SalePrice, PurchasePrice=:PurchasePrice where ProductID=:ProductID";
    //prepare
    $statement = $db->prepare($query);
    $statement->bindValue(':ProductID', $ProductID);
    $statement->bindValue(':StoreID', $StoreID);
    $statement->bindValue(':ProductName', $ProductName);
    $statement->bindValue(':SalePrice', $SalePrice); 
    $statement->bindValue(':PurchasePrice', $PurchasePrice);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

function deleteProduct($product_to_delete)
{
    //db
    global $db;
    //query
    $query = "delete from Product where ProductID=:product_to_delete";
    //prepeare
    $statement = $db->prepare($query);
    $statement->bindValue(':product_to_delete', $product_to_delete);
    //execute
    $statement->execute();
    //close cursor
    $statement->closeCursor();
}

?>