<?php 
include('controller/confirmation.php');
include('controller/register.php');
include('controller/parameter_template.php');
include('controller/card.php');
include('controller/card_parameter_template.php');
include('config/db_connect.php');


//fonction d'inscription avec envoie de mail
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

//fonction qui permet de get les parametres de page pour le current user
//select_parameter_by_current_user($bdd)
function function_select_parameter_current_user($bdd){
   return (select_parameter_by_current_user($bdd));
}

//fonction qui permet de get les parametres de page par l'id
//select_parameter_current_user_by_id_user($bdd,7)
function function_select_parameter_current_user_by_id_user($bdd, $id){
    return(select_parameter_current_user_by_id_user($bdd,$id));
}

//fonction qui permet de get les parametres de page par le name
//select_parameter_current_user_by_name($bdd, "baba")
function function_select_parameter_current_user_by_name($bdd, $name){
    return(select_parameter_current_user_by_name($bdd, $name));
}

//fonction qui permet de get les parametres de la page + les liens de la page par le name
//select_parameter_and_card_by_current_user($bdd, "baba")
function function_select_parameter_and_card_by_current_user($bdd, $name){
    return(select_parameter_and_card_by_current_user($bdd, $name));
}

// A FINIR POUR NE PAS TOUT MODIFER LES ELEMENTS
//fonction qui permet de update le lien par l'id (user deja connecter)
// updatecard($bdd, 2, "http://facebook.fr", "url", "ça marche", 1, "rouge", "fe");
function function_updatecard($bdd, $id, $url, $type, $texte, $forme, $couleur_card, $effect){
    updatecard($bdd, $id, $url, $type, $texte, $forme, $couleur_card, $effect);
}
?>
