<?php
session_start();

if (isset($_GET['code'])) {
    $_SESSION['loggedIn'] = true;
}

?>

<!-- 1. create HTML5 doctype -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 
  Bootstrap is designed to be responsive to mobile.
  Mobile-first styles are part of the core framework.
   
  width=device-width sets the width of the page to follow the screen-width
  initial-scale=1 sets the initial zoom level when the page is first loaded   
  -->
  
  <meta name="author" content="Ankisha">
  <meta name="description" content="html page">  
    
  <title>Bootstrap example</title>
  
  <!-- 3. link bootstrap -->
  <!-- if you choose to use CDN for CSS bootstrap -->  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!-- you may also use W3's formats -->
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
  
  <!-- 
  Use a link tag to link an external resource.
  A rel (relationship) specifies relationship between the current document and the linked resource. 
  -->
  
  <!-- If you choose to use a favicon, specify the destination of the resource in href -->
  <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
  
  <!-- if you choose to download bootstrap and host it locally -->
  <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> --> 
  
  <!-- include your CSS -->
  <!-- <link rel="stylesheet" href="custom.css" />  -->
       
</head>
<style>
  <?php include "styles.css" ?>
</style>

<body>
<div class="container">
  <h1>Store Database Menu</h1>  

  <a href='/'><button style="background-color:lightblue">Login Page</button></a>

  <!-- CDN for JS bootstrap -->
  <!-- you may also use JS bootstrap to make the page dynamic -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
  
  <!-- for local -->
  <!-- <script src="your-js-file.js"></script> -->  
  
</div> 


<div class="cards">

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="users-db.php">Click to view the Users database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="product-db.php">Click to view the Product database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="store-db.php">Click to view the Store database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="manufacturer-db.php">Click to view the Manufacturer database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="transactions-db.php">Click to view the Transactions database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="instore_transactions-db.php">Click to view the Instore database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="online_transactions-db.php">Click to view the Online Transactions database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="delivery_costs-db.php">Click to view the Delivery Costs database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="sells-db.php">Click to view each Store's inventory database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="makes-db.php">Click to view each Manufacturer's product database</a>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p>
        <a style="text-decoration:none" href="buys_from-db.php">Click to view which store each Manufacturer buys from</a>
      </p>
    </div>
  </div>

<div>


</body>
</html>  
