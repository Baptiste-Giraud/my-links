<?php
include("function.php");

$url = $_SERVER['REQUEST_URI'];
$url = str_replace("/", "", $url);
$url = rtrim($url, '?');

// include("controller/google_authentification.php");
//function_connexion($bdd, "baptiste.giraud@epitech.eu", "azerty83");
// $data = function_select_parameter_current_user_by_id_user($bdd, 2);
// var_dump($data);

// $data = select_parameter_current_user_by_name($bdd, "baba");
// var_dump($data);
//$data = function_selectlinkbyusername($bdd, "baba");
//var_dump($data);

//function_insertbackground_theme_userid($bdd, "Template 8", "template-8", "", "svg", 1, "purple pink");
// function_register($bdd, "flo", "flo", "flo", "azerty83@", "flo", "azerty83@");
// function_connexion($bdd, "flo", "azerty83@");
// $token = function_veriftoken($bdd);
// echo $_SESSION['token'];

// $value = selectinfouserbypseudo($bdd ,$url);
// function_insertlink($bdd, 1, "type", "test", "https://onlyfans.porn/eddyass", "red", "coucou", "", "", 1, 1, NULL, NULL, 0, NULL);
$value = selectinfouserbypseudo($bdd ,$url);
//function_insertlink($bdd, 1, "type", "effect", "url", "color_link", "texte", "red", "facebook", 1, 1);

// if($url == "link"){
//     include 'templates/link.php';
// }else if($url == "login"){
//     include 'templates/login.php';
// }else{

    if($value == false || $value == null  || $url == ""){
        include 'templates/home.php';
    }else{
        $user = function_selectinfouserbypseudo($bdd,  $value["name_user"]);
        include 'templates/user.php';
    }
// }
//echo $val = function_views_count_select_by_total($bdd);
//function_updateinfouser($bdd, 3, "baba", "eddy.mahmoud@epitech.eu", "eddy", "mhd");
// $data = function_select_parameter_and_link_by_current_user($bdd, "baba");
// var_dump($data);

// $value = function_selectlink($bdd);
//var_dump($value);
//function_insertlink($bdd, 1, "sqdqs", "dfff", "sqdqsd", "dsfdsf", "qdsdqsdqsfff");
?>
