<?php
session_start();

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
$client->setHostedDomain('virginia.edu');

// Initialize the loggedIn variable to false
$_SESSION['loggedIn'] = false;

if (isset($_GET['code'])) {
    echo "Inside the code block.<br>"; 

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Verify if the token is valid
    if ($client->getAccessToken()) {
        // Get user profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Set the loggedIn variable to true
        $_SESSION['loggedIn'] = true;
    }
} else {
    echo "<a href='" . $client->createAuthUrl() . "'><button style='background-color:lightblue; margin:10px' >Login with Google</button></a>";
    echo "<a href='home.php'><button style='background-color:lightblue; margin:10px'>Visit the home page</button></a>";
    echo "<h4>You must be logged in and authenticated to edit the databases!</h4> ";
}

?>
