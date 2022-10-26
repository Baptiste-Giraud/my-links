<?php


function language(){

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$array = [];


$array['fr']['accueil']['titre'] = "Salut les français";
$array['fr']['accueil']['sous titre'] = "twerk";
$array['fr']['parametre']['titre'] = "Modifier les informations";
$array['en']['accueil']['titre'] = "Hello";

return($array[$lang]);
}

?>