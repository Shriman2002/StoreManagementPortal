<?php
require("connect-db.php");
require("product-functions.php");

$products = selectAllProducts();
$product_info_to_update = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Update')){
        $product_info_to_update = getProductByID($_POST['product_to_update']);
        //var_dump($friend_info_to_update);
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Add Product")){
        addProduct($_POST['ProductID'], $_POST['StoreID'], $_POST['ProductName'], $_POST['SalePrice'], $_POST['PurchasePrice']);
        // var_dump($_POST['Name']);
        $products = selectAllProducts();
    }
    else if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Delete')){
        deleteProduct($_POST['product_to_delete']);
        //var_dump($_POST['product_to_delete']);
        $products = selectAllProducts();
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Confirm update')){
        updateProduct($_POST['ProductID'], $_POST['StoreID'], $_POST['ProductName'], $_POST['SalePrice'], $_POST['PurchasePrice']);
        $products = selectAllProducts();
    }
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">    
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />    
  <title>Store DB</title>    
</head>

<body>
<div class="container">

  <h1>Product Database</h1>
  <form name="mainForm" action="product-db.php" method="post">  
        <div class="row mb-3 mx-3">
            Product ID:
            <input type="text" class="form-control" name="ProductID" required 
                value="<?php if($product_info_to_update != null) echo $product_info_to_update['ProductID'];?>"

            />        
        </div>  
        <div class="row mb-3 mx-3">
            Product Name:
            <input type="text" class="form-control" name="ProductName" required 
                value="<?php if($product_info_to_update != null) echo $product_info_to_update['ProductName'];?>"

            />        
        </div>
        <div class="row mb-3 mx-3">
            Store ID:
            <input type="text" class="form-control" name="StoreID" required 
                value="<?php if($product_info_to_update != null) echo $product_info_to_update['StoreID'];?>"
            />        
        </div>
        <div class="row mb-3 mx-3">
            Sale Price:
            <input type="number" class="form-control" name="SalePrice" required
                value="<?php if($product_info_to_update != null) echo $product_info_to_update['SalePrice'];?>" 
            />        
        </div>
        <div class="row mb-3 mx-3">
            Purchase Price:
            <input type="number" class="form-control" name="PurchasePrice" required
                value="<?php if($product_info_to_update != null) echo $product_info_to_update['PurchasePrice'];?>"
            />        
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-primary" name="actionBtn" value="Add Product" title="click to insert product" />
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-dark" name="actionBtn" value="Confirm update" title="click to confirm update product" />
        </div>
    </form>

    <form method = "GET">
        <label>Search</label>
        <input type = "text" name="search" placeholder = "Search by product name">
        <input type = "submit" name="submit">
    </form>
    <br>

    <?php

        //$con = new PDO("mysql:host=cs4750db-380303:us-east4:db-demo;dbname=storeManagementPortal", 'root','passworduva');
        //$con = mysqli_connect("cs4750db-380303:us-east4:db-demo", "root", "passworduva", "storeManagementPortal");

        if(isset($_GET['search']))
        {
            $filtervalues = $_GET['search'];
            global $db;
            $query = "SELECT * FROM Product WHERE ProductName ='$filtervalues'";
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(); //fetch()
            //close cursor
            $statement->closeCursor();

            if($results!=null)
            {
            ?>
            <div class="row justify-content-center">  
                <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
                <thead>
                <tr style="background-color:#B0B0B0">
                    <th>Product ID</th> 
                    <th>Product Name</th>               
                    <th>Store ID</th>  
                    <th>Sale Price</th>
                    <th>Purchase Price</th>
                    <th>Update?</th> 
                    <th>Delete?</th>  
                </tr>
                </thead>
                <?php foreach ($results as $item): ?>
                <tr>
                    <td><?php echo $item['ProductID']; ?></td>  
                    <td><?php echo $item['ProductName']; ?></td>      
                    <td><?php echo $item['StoreID']; ?></td>   
                    <td><?php echo '$'; echo $item['SalePrice']; ?></td>   
                    <td><?php echo '$'; echo $item['PurchasePrice']; ?></td>  
                </tr>
                <?php endforeach; ?>
                </table>
            </div> 
            <?php   
            }
            else{
                ?>
                <td><?php echo 'No Results Found'; ?></td>
                <?php 
            }
        }

    ?>

    <br>
    <br>
    <br>
    <div class="row justify-content-center">  
        <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
        <thead>
        <tr style="background-color:#B0B0B0">
            <th>Product ID</th> 
            <th>Product Name</th>               
            <th>Store ID</th>  
            <th>Sale Price</th>
            <th>Purchase Price</th>
            <th>Update?</th> 
            <th>Delete?</th>  

        </tr>
        </thead>
        <?php foreach ($products as $item): ?>
        <tr>
            <td><?php echo $item['ProductID']; ?></td>  
            <td><?php echo $item['ProductName']; ?></td>      
            <td><?php echo $item['StoreID']; ?></td>   
            <td><?php echo '$'; echo $item['SalePrice']; ?></td>   
            <td><?php echo '$'; echo $item['PurchasePrice']; ?></td>   
             <td>
                <form action="product-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Update" class ="btn btn-dark" />
                    <input type="hidden" name="product_to_update" 
                        value="<?php echo $item['ProductID']; ?>" />
                </form>
            </td>
            <td>
                <form action="product-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Delete" class ="btn btn-danger" />
                    <input type="hidden" name="product_to_delete" 
                        value="<?php echo $item['ProductID']; ?>" />
                </form>
            </td>

        </tr>
        <?php endforeach; ?>
        </table>
    </div> 


  
<?php
$str = "Hello world"; 
if (isset($_POST['yourname']))
   $str = "You've entered ". $_POST['yourname'];
// echo "<div style='font-style:italic; color:green'> $str </div>" ;  
?>

</div>
</body>
</html>  