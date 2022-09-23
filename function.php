<?php 
session_start();

include('controller/confirmation.php');
include('controller/register.php');
include('controller/parameter_template.php');
include('controller/card.php');
include('config/db_connect.php');

//test des fonction ici

// register($bdd, "eddy.mahmoud@epitech.eu", "eddy", "mhd", "azerty83", "edman");
function function_register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser){
    register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser);

}

//fonction de connexion
//connexion($bdd, "baptiste.giraud@epitech.eu", "azerty83");
function function_connexion($bdd, $email, $mdpenter){
    connexion($bdd, $email, $mdpenter);

}

//fonction parametre de la page
//update_parameter_template($bdd, "ttt", "aa", "dd", "sss", "dd", "dqqd", "0");
function function_update_parameter_template($bdd, $type_composition, $template_url, $color_page, $description, $texte_color, $police, $views_count){
    update_parameter_template($bdd, $type_composition, $template_url, $color_page, $description, $texte_color, $police, $views_count);

}

//fonction insert lien
//insertcard($bdd, 1, "type", "effect", "url", "color_card", "texte");
function function_insertcard($bdd, $forme, $type, $effect, $url, $color_card, $texte){
    insertcard($bdd, $forme, $type, $effect, $url, $color_card, $texte);
}
//fonction get lien par rapport a l'utilisateur connecter
//selectcard($bdd);
function function_selectcard($bdd){
    return(selectcard($bdd));
}

//fonction get lien par rapport a l'id
//selectcardbyuserid($bdd, 3);
function function_selectcardbyuserid($bdd, $id){
   return( selectcardbyuserid($bdd, $id));
}

//fonction get lien par rapport a l'username
//selectcardbyuserid($bdd, fazzeurwhite);
function function_selectcardbyusername($bdd, $username){
    return( selectcardbyusername($bdd, $username));
 }

//fonction qui deconnecte l'utilisateur courant
//function_deconnexion();
function function_deconnexion(){
    session_destroy();
    unset( $_SESSION );
    echo '400';
}

//fonction qui permet de supprimer le lien par l'ID
//deletecard($bdd, 1)
function function_deletecard($bdd , $id){
    deletecard($bdd, $id);
}

?>
