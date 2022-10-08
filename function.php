<?php 
include('controller/confirmation.php');
include('controller/register.php');
include('controller/parameter_template.php');
include('controller/link.php');
include('controller/link_parameter_template.php');
include('controller/background_theme_user.php');
include('controller/user.php');
include('controller/views_count.php');
include('controller/dashboard_parameters.php');
include('controller/giphy.php');
include('controller/scrap.php');
include('config/db_connect.php');


//
// - Connexion - Inscription - Déconnexion - 
//


    //fonction d'inscription avec envoie de mail
    // function_register($bdd, "eddy.mahmoud@epitech.eu", "eddy", "mhd", "azerty83", "edman", "azerty83");
    function function_register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser, $mdpsueruser){
        register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser, $mdpsueruser);

    }

    //fonction de connexion
    //function_connexion($bdd, "baptiste.giraud@epitech.eu", "azerty83");
    function function_connexion($bdd, $email, $mdpenter){
        return(connexion($bdd, $email, $mdpenter));

    }

    //fonction qui deconnecte l'utilisateur courant
    //function_deconnexion();
    function function_deconnexion(){
        session_destroy();
        unset( $_SESSION );
        echo '400';
    }

// -----------------------------------------


//
// - Parameter (des liens du user) -
//

    //fonction qui permet de get les parametres de page pour le current user
    //function_select_parameter_by_current_user($bdd)
    function function_select_parameter_current_user($bdd){
    return (select_parameter_by_current_user($bdd));
    }

    //fonction qui permet de get les parametres de page par l'id
    //function_select_parameter_current_user_by_id_user($bdd,7)
    function function_select_parameter_current_user_by_id_user($bdd, $id){
        return(select_parameter_current_user_by_id_user($bdd,$id));
    }

    //fonction qui permet de get les parametres de page par le name
    //function_select_parameter_current_user_by_name($bdd, "baba")
    function function_select_parameter_current_user_by_name($bdd, $name){
        return(select_parameter_current_user_by_name($bdd, $name));
    }

    //fonction parametre de la page des lien de l'utilisateur
    //function_update_parameter_template($bdd, "ttt", 1, "dd", "sss", "dd", "dqqd", "0");
    function function_update_parameter_template($bdd, $type_composition, $theme_id, $color_page, $description, $texte_color, $police, $views_count){
        update_parameter_template($bdd, $type_composition, $theme_id, $color_page, $description, $texte_color, $police, $views_count);

    }

// -----------------------------------------


//
// - Parameter page + link -
//

    //fonction qui permet de get les parametres de la page + les liens de la page par le name
    //function_select_parameter_and_link_by_current_user($bdd, "baba")
    function function_select_parameter_and_link_by_current_user($bdd, $name){
        return(select_parameter_and_link_by_current_user($bdd, $name));
    }

// -----------------------------------------


//
// - Link -
//

    //fonction qui permet de update le lien par l'id (user deja connecter)
    // function_updatelink($bdd, 2, "http://facebook.fr", "test", "toto", 1, "rouge", "rond", "facebook", 1, 0, "2022-10-10 17:16:18", "2022-10-10 18:00:00", 1);
    function function_updatelink($bdd, $id, $url, $type, $texte, $forme, $couleur_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show,$date_finish_show, $sensitive){
        updatelink($bdd, $id, $url, $type, $texte, $forme, $couleur_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive);
    }

    //fonction qui permet de supprimer le lien par l'ID
    //function_deletelink($bdd, 1)
    function function_deletelink($bdd , $id){
        deletelink($bdd, $id);
    }

    //fonction insert lien
    //function_insertlink($bdd, 1, "type", "effect", "url", "color_link", "texte", "red", "facebook", 1, 1, "", "", 1);
    function function_insertlink($bdd, $forme, $type, $effect, $url, $color_link, $texte, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive){
        insertlink($bdd, $forme, $type, $effect, $url, $color_link, $texte, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive);
    }
    //fonction get lien par rapport a l'utilisateur connecter
    //function_selectalllinkuser($bdd);
    function function_selectalllinkuser($bdd){
        return(selectalllinkuser($bdd));
    }

    //fonction get lien par rapport a l'id
    //function_selectlinkbyuserid($bdd, 3);
    function function_selectlinkbyuserid($bdd, $id){
    return( selectlinkbyuserid($bdd, $id));
    }

    //fonction get lien par rapport a l'username
    //function_selectlinkbyuserid($bdd, fazzeurwhite);
    function function_selectlinkbyusername($bdd, $username){
        return( selectlinkbyusername($bdd, $username));
    }

// -----------------------------------------


//
// - Background_theme_user -
//

    //fonction qui permet de select un theme pour la page de l'user par l'id du theme
    //function_selectbackground_theme_userid($bdd, 1);
    function function_selectbackground_theme_userid($bdd, $id){
        selectbackground_theme_userid($bdd, $id);
    }

    //fonction qui permet de select un theme pour la page de l'user par le label du theme
    //function_selectbackground_theme_userid($bdd, "toto");
    function function_selectbackground_theme_userlabel($bdd, $label){
        selectbackground_theme_userlabel($bdd, $label);
    }


    //fonction qui permet de crée un theme pour la page de l'user
    //function_insertbackground_theme_userid($bdd, "toto", "/asset/template/svg/template1.svg", "svg", true, "orange");
    function function_insertbackground_theme_userid($bdd, $label, $slug, $file_path, $type, $status, $couleur){
        insertbackground_theme_userid($bdd, $label, $slug, $file_path, $type, $status, $couleur);
    }

    function function_background_theme_user_by_page_parameter($bdd , $theme_id){
        return(background_theme_user_by_page_parameter($bdd, $theme_id));
    }

// -----------------------------------------


//
// - User infos  -
//

//fonction qui permet de mettre à jour les données de l'utilisateur nom, email...
//function_updateinfouser($bdd, 1, "edman", "eddy.mahmoud@epitech.eu", "eddy", "mhd");
function function_updateinfouser($bdd, $iduser, $name_user, $email_user, $nom_user, $prenom_user, $description){
    updateinfouser($bdd, $iduser, $name_user, $email_user, $nom_user, $prenom_user, $description);
}

function function_selectinfouserbypseudo($bdd, $name_user){
    return(selectinfouserbypseudo($bdd, $name_user));
}

// -----------------------------------------



//
// - Views of page -
//

//fonction qui rajoute 1 vue quand une personne vois la page d'un user
// function_views_count_insert($bdd, 1);
function function_views_count_insert($bdd, $user_id){
    return(views_count_insert($bdd, $user_id));
}


//fonction qui donne le nombre total de vue de l'utilisateur
// function_views_count_insert($bdd, 1);
function function_views_count_select_by_total($bdd){
    return(views_count_select_by_total($bdd));
}

// -----------------------------------------


//
// - Dashboard parameters -
//

function function_insert_dashboard_parameters($bdd, $type, $parameter){
    insert_dashboard_parameters($bdd, $type, $parameter);
}

function function_select_dashboard_parameters_by_type($bdd, $type){
    return(select_dashboard_parameters_by_type($bdd, $type));
}

function function_select_dashboard_parameters_id($bdd, $id){
    return(select_dashboard_parameters_id($bdd, $id));
}

// -----------------------------------------


//
// - giphy -
//

function function_trend_giphy_sticker_search($search, $offset){
    trend_giphy_sticker_search($search, $offset);
}

function function_trend_giphy_sticker(){
    trend_giphy_sticker();
}

function function_trend_giphy_giph(){
    trend_giphy_giph();
}

function function_search_giphy_giph($search, $offset){
    search_giphy_giph($search, $offset);
}

// -----------------------------------------


//
// - scrap -
//

function function_scrap_linktree($url){
    scrap_linktree($url);
}

// -----------------------------------------
?>
