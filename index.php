<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   // URL (without file name) to a default screen
      require 'home.php';
      break; 
   case '/users-db.php':     // if you plan to also allow a URL with the file name 
      require 'users-db.php';
      break;  
    case '/product-db.php':     // if you plan to also allow a URL with the file name 
      require 'product-db.php';
      break;              
   default:
      http_response_code(404);
      exit('Not Found');
}  

?>
