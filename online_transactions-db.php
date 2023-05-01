<?php
require("connect-db.php");
require("online_transactions-functions.php");

$transactions = selectAllTransactions();
$transaction_info_to_update = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Update')){
        $transaction_info_to_update = getTransactionByID($_POST['transaction_to_update']);
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Add Transaction")){
        addTransaction($_POST['TransactionID'], $_POST['DeliveryTime'], $_POST['DeliveryAddress']);
        // var_dump($_POST['Name']);
        $transactions = selectAllTransactions();
    }
    else if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Delete')){
        deleteTransaction($_POST['transaction_to_delete']);
        $transactions = selectAllTransactions();
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Confirm update')){
        updateTransaction($_POST['TransactionID'], $_POST['DeliveryTime'], $_POST['DeliveryAddress']);
        $transactions = selectAllTransactions();
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

  <h1>Online Transactions Database</h1>
  <form name="mainForm" action="online_transactions-db.php" method="post">  
        <div class="row mb-3 mx-3">
            Transaction ID:
            <input type="text" class="form-control" name="TransactionID" required 
                value="<?php if($transaction_info_to_update != null) echo $transaction_info_to_update['TransactionID'];?>"

            />        
        </div>  
        <div class="row mb-3 mx-3">
            Delivery Time:
            <input type="text" class="form-control" name="DeliveryTime" required 
                value="<?php if($transaction_info_to_update != null) echo $transaction_info_to_update['DeliveryTime'];?>"

            />        
        </div>
        <div class="row mb-3 mx-3">
            Delivery Address:
            <input type="text" class="form-control" name="DeliveryAddress" required 
                value="<?php if($transaction_info_to_update != null) echo $transaction_info_to_update['DeliveryAddress'];?>"

            />        
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-primary" name="actionBtn" value="Add Transaction" title="click to insert transaction" />
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-dark" name="actionBtn" value="Confirm update" title="click to confirm update transaction" />
        </div>
    </form>

    <br>

    <div class="row justify-content-center">  
        <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
        <thead>
        <tr style="background-color:#B0B0B0">
            <th>Transaction ID</th> 
            <th>Delivery Time</th> 
            <th>Delivery Address</th>                
            <th>Update?</th> 
            <th>Delete?</th>  

        </tr>
        </thead>
        <?php foreach ($transactions as $item): ?>
        <tr>
            <td><?php echo $item['TransactionID']; ?></td>  
            <td><?php echo $item['DeliveryTime']; ?></td>    
            <td><?php echo $item['DeliveryAddress']; ?></td>     
             <td>
                <form action="online_transactions-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Update" class ="btn btn-dark" />
                    <input type="hidden" name="transaction_to_update" 
                        value="<?php echo $item['TransactionID']; ?>" />
                </form>
            </td>
            <td>
                <form action="online_transactions-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Delete" class ="btn btn-danger" />
                    <input type="hidden" name="transaction_to_delete" 
                        value="<?php echo $item['TransactionID']; ?>" />
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