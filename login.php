<?php
require_once 'vendor/autoload.php';

session_start();

$clientID = '346526762075-qjvsnli3jh5an4pjrt131lgjibjem5ij.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUrl = 'https://cs4750db-380303.uk.r.appspot.com/home.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');
$client->setHostedDomain('virginia.edu'); // Add this line

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $accessToken = $client->getAccessToken();
    $client->setAccessToken($accessToken);

    $service = new Google_Service_Oauth2($client);
    $userinfo = $service->userinfo->get();
    
    $email = $userinfo->email;
    $emailDomain = substr($email, strpos($email, '@') + 1);
    

    if ($emailDomain === 'virginia.edu') {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token['access_token'];
        // User with 'virginia.edu' email is allowed to log in
        // Do your logic here, e.g. store user data, set session, etc.
        header("Location: " . $redirectUrl); // Redirect to the desired page
        exit;
    } else {
        // User with non-'virginia.edu' email is not allowed to log in
        echo "Access restricted. Please log in with a 'virginia.edu' email.";
    }
} else {
    echo "<a href='" . $client->createAuthUrl() . "'>Login with Google</a>";
}
?>
