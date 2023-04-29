<?php
require_once 'vendor/autoload.php';

$clientID = '346526762075-qjvsnli3jh5an4pjrt131lgjibjem5ij.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUrl = 'https://cs4750db-380303.uk.r.appspot.com/home.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');

if(isset($_GET['code'])){

}

else {
  echo "<a href='" . $client->createAuthUrl() . "'>Login with Google</a>";
}
?>