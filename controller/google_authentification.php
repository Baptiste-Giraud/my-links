<?php
session_start();
require_once '../vendor/autoload.php';
  
// init configuration
$clientID = '179209385922-inf2tn66d0pphkkihl0v5pcqnre2f0l2.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/my-links/controller/google_authentification';
   
// create Client Request to access Google API
$client = new Google\Client();
$client->setAccessType("online");
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->setIncludeGrantedScopes(true);
$client->setScopes(array('https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile'));

  
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
   
  // get profile info
  $google_oauth = new Google\Service\Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  var_dump($google_account_info);
  echo $name;
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  echo '

  <div class="row">
<div class="col-md-3">
  <a class="btn btn-outline-dark" href="'.$client->createAuthUrl().'" role="button" style="text-transform:none">
    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
    Login with Google
  </a>
</div>
</div>

<!-- Minified CSS and JS -->
<link   rel="stylesheet" 
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
      crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
      crossorigin="anonymous">
</script>';
  
}
?>