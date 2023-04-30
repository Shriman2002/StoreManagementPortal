<?php
require("connect-db.php");
require("makes-functions.php");

$makes = selectAllMakes();
$make_info_to_update = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Update')){
        $make_info_to_update = getMakeByID($_POST['make_to_update']);
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Add Make")){
        addMake($_POST['ManufacturerID'], $_POST['ProductID']);
        // var_dump($_POST['Name']);
        $makes = selectAllMakes();
    }
    else if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Delete')){
        deleteMake($_POST['make_to_delete']);
        $makes = selectAllMakes();
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Confirm update')){
        updateMake($_POST['ManufacturerID'], $_POST['ProductID']);
        $makes = selectAllMakes();
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

  <h1>Production Database</h1>
  <form name="mainForm" action="makes-db.php" method="post">  
        <div class="row mb-3 mx-3">
            Manufacturer ID:
            <input type="text" class="form-control" name="ManufacturerID" required 
                value="<?php if($make_info_to_update != null) echo $make_info_to_update['ManufacturerID'];?>"

            />        
        </div>  
        <div class="row mb-3 mx-3">
            Product ID:
            <input type="text" class="form-control" name="ProductID" required 
                value="<?php if($make_info_to_update != null) echo $make_info_to_update['ProductID'];?>"

            />        
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-primary" name="actionBtn" value="Add Make" title="click to insert transaction" />
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
            <th>Manufacturer ID</th> 
            <th>Product ID</th>               
            <th>Update?</th> 
            <th>Delete?</th>  

        </tr>
        </thead>
        <?php foreach ($makes as $item): ?>
        <tr>
            <td><?php echo $item['ManufacturerID']; ?></td>  
            <td><?php echo $item['ProductID']; ?></td>    
             <td>
                <form action="makes-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Update" class ="btn btn-dark" />
                    <input type="hidden" name="make_to_update" 
                        value="<?php echo $item['ProductID']; ?>" />
                </form>
            </td>
            <td>
                <form action="makes-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Delete" class ="btn btn-danger" />
                    <input type="hidden" name="make_to_delete" 
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