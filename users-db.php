<?php
require("connect-db.php");
require("users-functions.php");


$users = selectAllUsers();
//var_dump($users);
$user_info_to_update = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Update')){
        $user_info_to_update = getUserByName($_POST['user_to_update']);
        //var_dump($friend_info_to_update);
    }
    else if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Add User")){
        addUser($_POST['Name'], $_POST['EmployeeID'], $_POST['StoreID']);
        // var_dump($_POST['Name']);
        $users = selectAllUsers();
    }
    else if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Delete')){
        deleteUser($_POST['user_to_delete']);
        //var_dump($_POST['user_to_delete']);
        $users = selectAllUsers();
    }
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == 'Confirm update')){
        updateUser($_POST['Name'], $_POST['EmployeeID'], $_POST['StoreID']);
        $users = selectAllUsers();
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

  <h1>Users Database</h1>
  <form name="mainForm" action="users-db.php" method="post">  
        <div class="row mb-3 mx-3">
            Name:
            <input type="text" class="form-control" name="Name" required 
                value="<?php if($user_info_to_update != null) echo $user_info_to_update['Name'];?>"
            />        
        </div>  
        <div class="row mb-3 mx-3">
            Employee ID:
            <input type="number" class="form-control" name="EmployeeID" required 
                value="<?php if($user_info_to_update != null) echo $user_info_to_update['EmployeeID'];?>"
            />        
        </div>
        <div class="row mb-3 mx-3">
            Store ID:
            <input type="number" class="form-control" name="StoreID" required min = 10000 and max = 10035
                value="<?php if($user_info_to_update != null) echo $user_info_to_update['StoreID'];?>"
            />        
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-primary" name="actionBtn" value="Add User" title="click to insert friend" />
        </div>

        <div class="row mb-3 mx-3">
            <input type="submit" class="btn btn-dark" name="actionBtn" value="Confirm update" title="click to confirm update friend" />
        </div>
    </form>

    <div class="row justify-content-center">  
        <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
        <thead>
        <tr style="background-color:#B0B0B0">
            <th>Name</th>        
            <th>Employee ID</th>        
            <th>Store ID</th>  
            <th>Update?</th>
            <th>Delete?</th> 

        </tr>
        </thead>
        <?php foreach ($users as $item): ?>
        <tr>
            <td><?php echo $item['Name']; ?></td>
            <td><?php echo $item['EmployeeID']; ?></td>        
            <td><?php echo $item['StoreID']; ?></td>   
             <td>
                <form action="users-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Update" class ="btn btn-dark" />
                    <input type="hidden" name="user_to_update" 
                        value="<?php echo $item['Name']; ?>" />
                </form>
            </td>
            <td>
                <form action="users-db.php" method="post">
                    <input type="submit" name="actionBtn" value="Delete" class ="btn btn-danger" />
                    <input type="hidden" name="user_to_delete" 
                        value="<?php echo $item['EmployeeID']; ?>" />
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