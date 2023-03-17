<?php
include("function.php");

$url = $_SERVER['REQUEST_URI'];
$url = str_replace("/", "", $url);
$url = rtrim($url, '?');


$value = selectinfouserbypseudo($bdd ,$url);

    if($value == false || $value == null){
        include 'templates/home.php';
    }else{
        $user = function_selectinfouserbypseudo($bdd,  $value["name_user"]);
        include 'templates/user.php';
    }
?>
