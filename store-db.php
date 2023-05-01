<?php
require("connect-db.php");
require("store-functions.php");

$stores = selectAllStores();
$store_info_to_update = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Update')){
        $store_info_to_update = getStoreByID($_POST['store_to_update']);
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Add Store")){
        addStore($_POST['StoreID'], $_POST['StoreName'], $_POST['Address']);
        // var_dump($_POST['Name']);
        $stores = selectAllStores();
    }
    else if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Delete')){
        deleteStore($_POST['store_to_delete']);
        $stores = selectAllStores();
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Confirm update')){
        updateStore($_POST['StoreID'], $_POST['StoreName'], $_POST['Address']);
        $stores = selectAllStores();
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
    <a href='home.php'><button style='background-color:lightblue; margin:10px'>Home page</button></a>

  <h1>Stores Database</h1>
  <form name="mainForm" action="store-db.php" method="post">  
        <div class="row mb-3 mx-3">
            Store ID:
            <input type="text" class="form-control" name="StoreID" required 
                value="<?php if($store_info_to_update != null) echo $store_info_to_update['StoreID'];?>"

            />        
        </div>  
        <div class="row mb-3 mx-3">
            Store Name:
            <input type="text" class="form-control" name="StoreName" required 
                value="<?php if($store_info_to_update != null) echo $store_info_to_update['StoreName'];?>"

            />        
        </div>
        <div class="row mb-3 mx-3">
            Address:
            <input type="text" class="form-control" name="Address" required 
                value="<?php if($store_info_to_update != null) echo $store_info_to_update['Address'];?>"
            />        
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-primary" name="actionBtn" value="Add Store" title="click to insert store" />
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-dark" name="actionBtn" value="Confirm update" title="click to confirm update store" />
        </div>
    </form>

    <br>

    <div class="row justify-content-center">  
        <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
        <thead>
        <tr style="background-color:#B0B0B0">
            <th>Store ID</th> 
            <th>Store Name</th>               
            <th>Address</th>  
            <th>Update?</th> 
            <th>Delete?</th>  

        </tr>
        </thead>
        <?php foreach ($stores as $item): ?>
        <tr>
            <td><?php echo $item['StoreID']; ?></td>  
            <td><?php echo $item['StoreName']; ?></td>      
            <td><?php echo $item['Address']; ?></td>   
             <td>
                <form action="store-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Update" class ="btn btn-dark" />
                    <input type="hidden" name="store_to_update" 
                        value="<?php echo $item['StoreID']; ?>" />
                </form>
            </td>
            <td>
                <form action="store-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Delete" class ="btn btn-danger" />
                    <input type="hidden" name="store_to_delete" 
                        value="<?php echo $item['StoreID']; ?>" />
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