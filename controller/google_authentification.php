<?php
session_start();
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('../config');
$dotenv->load();

try
{
    $bdd = new PDO('mysql:host='.$_ENV['HOST'].';dbname='.$_ENV['DBNAME'].';charset=utf8', $_ENV['USERNAME'], $_ENV['PASS']);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

function name_exist($bdd, $name_user){
  $requname = $bdd->prepare('SELECT * FROM user WHERE name_user = ?');
  $requname->execute(array($name_user));
  $requnameexist = $requname->rowCount();

  return($requnameexist);
}


function email_exist($bdd,$mail){
$requser = $bdd->prepare('SELECT * FROM user WHERE email_user = ?');
$requser->execute(array($mail));
$userexist = $requser->rowCount();

return($userexist);
}



function user_register($bdd, $email, $name,$image, $family_name, $prenom){
  echo $date = date("Y-m-d");
  $insert = $bdd->prepare("INSERT INTO user VALUES (NULL, :name_user ,:email_user, :mdp_user, :nom_user ,:prenom_user , :confirmkey, :uniqid, :token,:path_img, :description ,:confirme, :date_creation,:star_account, :type_account)");
            $insert->bindValue(':name_user', $name);
            $insert->bindValue(':email_user', $email);
            $insert->bindValue(':mdp_user', "");
            $insert->bindValue(':nom_user', $family_name);
            $insert->bindValue(':prenom_user', $prenom);
            $insert->bindValue(':confirmkey', uniqid());
            $insert->bindValue(':uniqid', uniqid());
            $insert->bindValue(':token', NULL);
            $insert->bindValue(':path_img', $image);
            $insert->bindValue(':description', "");
            $insert->bindValue(':confirme', "1");
            $insert->bindValue(':date_creation', $date);
            $insert->bindValue(':star_account',0);
            $insert->bindValue(':type_account','google');
            $resultats = $insert->execute();
            if($resultats == TRUE){

                $last_id = $bdd->lastInsertId();
                $insert = $bdd->prepare("INSERT INTO page_parameter VALUES (NULL, :id_user, :type_composition, :theme_id ,:color_page, :police, :views_count, :texte_color)");
                $insert->bindValue(':id_user', $last_id);
                $insert->bindValue(':type_composition', "Couleur");
                $insert->bindValue(':theme_id', 1);
                $insert->bindValue(':color_page', "#ffff");
                $insert->bindValue(':police', "");
                $insert->bindValue(':views_count', "");
                $insert->bindValue(':texte_color', "rgb(255, 255, 255);");
                $insert->execute();
            }
}

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
  $image =  $google_account_info->picture;
  $family_name =  $google_account_info->familyName;
  $prenom =  $google_account_info->givenName;
  $requnameexist = name_exist($bdd, $name);
  $userexist = email_exist($bdd, $email);
  if($userexist >= 1){
    //create get by email_id_user;
  }else{
    if($requnameexist >=1){
      //crée un message vous devez changez de pseudo
      $name = $name."".uniqid();
      user_register($bdd, $email, $name, $image, $family_name, $prenom);
    }else{
      user_register($bdd, $email, $name, $image, $family_name, $prenom);
    }
  }
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