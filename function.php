<?php 
session_start();

include('controller/confirmation.php');
include('controller/register.php');
include('controller/parameter_template.php');
include('controller/card.php');
include('config/db_connect.php');

//test des fonction ici

//register($bdd, "baptiste.giraud@epitech.eu", "giraud", "baptiste", "azerty83", "baba");
function function_register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser){
    register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser);

}

//connexion($bdd, "baptiste.giraud@epitech.eu", "azerty83");
function function_connexion($bdd, $email, $mdpenter){
    connexion($bdd, $email, $mdpenter);

}

//update_parameter_template($bdd, "ttt", "aa", "dd", "sss", "dd", "dqqd", "0");
function function_update_parameter_template($bdd, $type_composition, $template_url, $color_page, $description, $texte_color, $police, $views_count){
    update_parameter_template($bdd, $type_composition, $template_url, $color_page, $description, $texte_color, $police, $views_count);

}

//insertcard($bdd, 1, "type", "effect", "url", "color_card", "texte");
function function_insertcard($bdd, $forme, $type, $effect, $url, $color_card, $texte){
    insertcard($bdd, $forme, $type, $effect, $url, $color_card, $texte);
}

//selectcard($bdd);
function function_selectcard($bdd){
    return(selectcard($bdd));
}


//selectcardbyuserid($bdd, 3);
function function_selectcardbyuserid($bdd, $id){
   return( selectcardbyuserid($bdd, $id));
}

?>