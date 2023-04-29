<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   // URL (without file name) to a default screen
      require 'login.php';
      break;
   case '/home.php':                   // URL (without file name) to a default screen
      require 'home.php';
      break; 
   case '/users-db.php':     // if you plan to also allow a URL with the file name 
      require 'users-db.php';
      break;  
   case '/product-db.php':     // if you plan to also allow a URL with the file name 
      require 'product-db.php';
      break; 
   case '/store-db.php':     // if you plan to also allow a URL with the file name 
         require 'store-db.php';
         break;     
   case '/manufacturer-db.php':     // if you plan to also allow a URL with the file name 
         require 'manufacturer-db.php';
         break;  
   case '/transactions-db.php':     // if you plan to also allow a URL with the file name 
      require 'transactions-db.php';
      break;     
   case '/instore_transactions-db.php':     // if you plan to also allow a URL with the file name 
      require 'instore_transactions-db.php';
      break; 
   case '/online_transactions-db.php':     // if you plan to also allow a URL with the file name 
      require 'online_transactions-db.php';
      break; 
   case '/delivery_costs-db.php':     // if you plan to also allow a URL with the file name 
      require 'delivery_costs-db.php';
      break;     
   default:
      http_response_code(404);
      exit('Not Found');
}  

?>

