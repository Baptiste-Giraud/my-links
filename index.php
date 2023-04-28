<?php
include("function.php");
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
$url = $_SERVER['REQUEST_URI'];
$url = str_replace("/", "", $url);
$url = rtrim($url, '?');


$value = selectinfouserbypseudo($bdd ,$url);
$value['name_user'] = "edman";

    if($value == false || $value == null){
        include 'templates/home.php';
    }else{
        $user = function_selectinfouserbypseudo($bdd,  $value["name_user"]);
        include 'templates/user.php';
    }
?>
