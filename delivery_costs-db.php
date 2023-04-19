<?php
require("connect-db.php");
require("delivery_costs-functions.php");

$costs = selectAllCosts();
$cost_info_to_update = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Update')){
        $cost_info_to_update = getCostByID($_POST['cost_to_update']);
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Add Cost")){
        addCost($_POST['DeliveryTime'], $_POST['DeliveryCost']);
        // var_dump($_POST['Name']);
        $costs = selectAllCosts();
    }
    else if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Delete')){
        deleteCost($_POST['cost_to_delete']);
        $costs = selectAllCosts();
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Confirm update')){
        updateCost($_POST['DeliveryTime'], $_POST['DeliveryCost']);
        $costs = selectAllCosts();
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

  <h1>Delivery Costs Database</h1>
  <form name="mainForm" action="delivery_costs-db.php" method="post">  
        <div class="row mb-3 mx-3">
            Delivery Time:
            <input type="text" class="form-control" name="DeliveryTime" required 
                value="<?php if($cost_info_to_update != null) echo $cost_info_to_update['DeliveryTime'];?>"

            />        
        </div>  
        <div class="row mb-3 mx-3">
            Delivery Cost:
            <input type="text" class="form-control" name="DeliveryCost" required 
                value="<?php if($cost_info_to_update != null) echo $cost_info_to_update['DeliveryCost'];?>"

            />        
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-primary" name="actionBtn" value="Add Cost" title="click to insert cost" />
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-dark" name="actionBtn" value="Confirm update" title="click to confirm update cost" />
        </div>
    </form>

    <br>

    <div class="row justify-content-center">  
        <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
        <thead>
        <tr style="background-color:#B0B0B0">
            <th>Delivery Time</th> 
            <th>Delivery Cost</th>                
            <th>Update?</th> 
            <th>Delete?</th>  

        </tr>
        </thead>
        <?php foreach ($costs as $item): ?>
        <tr>
            <td><?php echo $item['DeliveryTime']; ?></td>    
            <td><?php echo $item['DeliveryCost']; ?></td>     
             <td>
                <form action="delivery_costs-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Update" class ="btn btn-dark" />
                    <input type="hidden" name="cost_to_update" 
                        value="<?php echo $item['DeliveryTime']; ?>" />
                </form>
            </td>
            <td>
                <form action="delivery_costs-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Delete" class ="btn btn-danger" />
                    <input type="hidden" name="cost_to_delete" 
                        value="<?php echo $item['DeliveryTime']; ?>" />
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