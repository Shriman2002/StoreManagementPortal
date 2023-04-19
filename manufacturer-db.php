<?php
require("connect-db.php");
require("manufacturer-functions.php");

$manufacturers = selectAllManufacturers();
$manufacturer_info_to_update = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Update')){
        $manufacturer_info_to_update = getManufacturerByID($_POST['manufacturer_to_update']);
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Add Manufacturer")){
        addManufacturer($_POST['ManufacturerID'], $_POST['ManufacturerName']);
        // var_dump($_POST['Name']);
        $manufacturers = selectAllManufacturers();
    }
    else if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Delete')){
        deleteManufacturer($_POST['manufacturer_to_delete']);
        $manufacturers = selectAllManufacturers();
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Confirm update')){
        updateManufacturer($_POST['ManufacturerID'], $_POST['ManufacturerName']);
        $manufacturers = selectAllManufacturers();
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

  <h1>Manufacturers Database</h1>
  <form name="mainForm" action="manufacturer-db.php" method="post">  
        <div class="row mb-3 mx-3">
            Manufacturer ID:
            <input type="text" class="form-control" name="ManufacturerID" required 
                value="<?php if($manufacturer_info_to_update != null) echo $manufacturer_info_to_update['ManufacturerID'];?>"

            />        
        </div>  
        <div class="row mb-3 mx-3">
            Manufacturer Name:
            <input type="text" class="form-control" name="ManufacturerName" required 
                value="<?php if($manufacturer_info_to_update != null) echo $manufacturer_info_to_update['ManufacturerName'];?>"

            />        
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-primary" name="actionBtn" value="Add Manufacturer" title="click to insert manufacturer" />
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-dark" name="actionBtn" value="Confirm update" title="click to confirm update manufacturer" />
        </div>
    </form>

    <br>

    <div class="row justify-content-center">  
        <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
        <thead>
        <tr style="background-color:#B0B0B0">
            <th>Manufacturer ID</th> 
            <th>Manufacturer Name</th>               

        </tr>
        </thead>
        <?php foreach ($manufacturers as $item): ?>
        <tr>
            <td><?php echo $item['ManufacturerID']; ?></td>  
            <td><?php echo $item['ManufacturerName']; ?></td>      
             <td>
                <form action="manufacturer-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Update" class ="btn btn-dark" />
                    <input type="hidden" name="manufacturer_to_update" 
                        value="<?php echo $item['ManufacturerID']; ?>" />
                </form>
            </td>
            <td>
                <form action="manufacturer-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Delete" class ="btn btn-danger" />
                    <input type="hidden" name="manufacturer_to_delete" 
                        value="<?php echo $item['ManufacturerID']; ?>" />
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