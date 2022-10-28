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
include('controller/newsletter.php');
include('controller/vcard.php');
include('config/db_connect.php');


//
// - Connexion - Inscription - Déconnexion - 
//


    //fonction d'inscription avec envoie de mail
    // function_register($bdd, "eddy.mahmoud@epitech.eu", "eddy", "mhd", "azerty83", "edman", "azerty83");
    function function_register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser, $mdpsueruser){
        register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser, $mdpsueruser);

    }

    //fonction qui permet de se connecter
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

    //fonction qui permet de mettre à jour les parametres de la page des liens de l'utilisateur (le thème, la police, le texte, la couleur de la page...)
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

    //fonction que permet de vérifier si le lien est un contenu sensible
    //function_verifSensiteLink($bdd, "https://mym.fans");
    function function_verifSensiteLink($bdd, $url){
        verifSensiteLink($bdd, $url);
    }

    //fonction qui permet de mettre à jour le lien par l'id (user deja connecter)
    //function_updatelink($bdd, 2, "http://facebook.fr", "test", "toto", 1, "rouge", "rond", "facebook", 1, 0, "2022-10-10 17:16:18", "2022-10-10 18:00:00", 1, NULL);
    function function_updatelink($bdd, $id, $url, $type, $texte, $forme, $couleur_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show,$date_finish_show, $sensitive, $private_pass){
        updatelink($bdd, $id, $url, $type, $texte, $forme, $couleur_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive,$private_pass);
    }

    //fonction qui permet de supprimer le lien par l'ID
    //function_deletelink($bdd, 1, 'vcard')
    function function_deletelink($bdd, $id, $type){
        deletelink($bdd, $id, $type);
    }

    //fonction qui permet d'inserer un lien
    //function_insertlink($bdd, 1, "type", "effect", "url", "color_link", "texte", "red", "facebook", 1, 1, "", "", 1, NULL);
    function function_insertlink($bdd, $forme, $type, $effect, $url, $color_link, $texte, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass){
        insertlink($bdd, $forme, $type, $effect, $url, $color_link, $texte, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass);
    }
    //fonction qui permet de get le lien par rapport a l'utilisateur connecter
    //function_selectalllinkuser($bdd);
    function function_selectalllinkuser($bdd){
        return(selectalllinkuser($bdd));
    }

    //fonction qui permet de get le lien par rapport a l'id
    //function_selectlinkbyuserid($bdd, 3);
    function function_selectlinkbyuserid($bdd, $id){
    return( selectlinkbyuserid($bdd, $id));
    }

    //fonction qui permet de get le lien par rapport a l'username
    //function_selectlinkbyuserid($bdd, fazzeurwhite);
    function function_selectlinkbyusername($bdd, $username){
        return( selectlinkbyusername($bdd, $username));
    }

// -----------------------------------------


//
// - Background_theme_user -
//

    //fonction qui permet de selectionner un theme lors de la configuration de la page de l'utilisateur par l'id du theme
    //function_selectbackground_theme_userid($bdd, 1);
    function function_selectbackground_theme_userid($bdd, $id){
        selectbackground_theme_userid($bdd, $id);
    }

    //fonction qui permet de selectionner un theme lors de la configuration de la page de l'utilisateur par le label du theme
    //function_selectbackground_theme_userid($bdd, "toto");
    function function_selectbackground_theme_userlabel($bdd, $label){
        selectbackground_theme_userlabel($bdd, $label);
    }


    //fonction qui permet d'insérer une image en background lors de la configuration de sa page
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

//fonction qui permet de mettre à jour le nom d'utilisateur
//function_updatenameuser($bdd, 1, eddy);
function function_updatenameuser($bdd, $iduser, $name_user){
    updatenameuser($bdd, $iduser, $name_user);
}

//fonction qui permet de séléctionner les infos de l'utilisateur par le pseudo
function function_selectinfouserbypseudo($bdd, $name_user){
    return(selectinfouserbypseudo($bdd, $name_user));
}

// -----------------------------------------



//
// - Views of page -
//

//fonction qui rajoute 1 vue quand une personne vois la page de utilisateur
// function_views_count_insert($bdd, 1);
function function_views_count_insert($bdd, $user_id){
    return(views_count_insert($bdd, $user_id));
}


//fonction qui donne le nombre total de vue de l'utilisateur
// function_views_count_select_by_total($bdd);
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

//fonction qui permet de chercher un sticker avec Giphy
function function_trend_giphy_sticker_search($search, $offset){
    trend_giphy_sticker_search($search, $offset);
}

function function_trend_giphy_sticker(){
    trend_giphy_sticker();
}

function function_trend_giphy_giph(){
    trend_giphy_giph();
}

//fonction qui permet de chercher un Gif avec Giphy
function function_search_giphy_giph($search, $offset){
    search_giphy_giph($search, $offset);
}

// -----------------------------------------


//
// - scrap -
//
//cela permet de faciliter le changement de plateforme des utilisateurs afin qu'ils s'inscrivent chez nous

//fonction qui permet de récupérer les liens des utilisateurs qui on un compte sur Linktree ou snipfeed
//function function_scrap('https://snipfeed.co/cecerose');
function function_scrap($url){
    scrap($url);
}

// -----------------------------------------


function function_add_newsletter($bdd, $iduser, $mail){
    add_newsletter($bdd, $iduser, $mail);
}

function function_add_form_newsletter(){
    return(add_form_newsletter());
}

if(isset($_POST['submit']))
{
    function_add_newsletter($bdd,  7, $_POST['email']);
} 

// -----------------------------------------

//
// Les fonctions se trouve dans le fichier vcard.php
//

//elle permet de créer un vcard
// function_insert_vcard($bdd, "Emilie", "spina", "emilie@epitech.eu", "26 rue voltaire", "residence", "83000","Toulon",  "france", "0601370524", "0494256374", "http://lol.com", "etudiant", "epitech");
function function_insert_vcard($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise){
    return(insert_vcard($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise));
}

// elle permet de créer un lien en même temps que la Vcard
// function_insertlink_and_vcard($bdd, "Bagra", "lola", "julia@epitech.eu", "26 rue voltaire", "residence", "83000","Toulon",  "france", "0601370524", "0494256374", "http://lol.com", "etudiant", "Tesla", 1, "vcard", "test", "", "bleu", "lol", "text_color-green", "icon_vcard", 1, 1, NULL, NULL, 0, NULL, NULL, );
function function_insertlink_and_vcard($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise, $type, $url, $texte, $forme, $color_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass){
    function_insert_vcard($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise);
    function_insertlink($bdd, $type, $url, $texte, $forme, $color_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass);
}


//elle permet de mettre à jour la vcard
// function_update_vcard($bdd, 27, "Quentin", "Thomas", "julia@epitech.eu", "26 rue voltaire", "residence", "83000","Toulon",  "france", "0601370524", "0494256374", "http://lol.com", "etudiant", "epitech" );
function function_update_vcard($bdd, $id, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url, $role, $nom_entreprise){
    return(update_vcard($bdd, $id, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url, $role, $nom_entreprise));
}

//elle permet de télécharger la vcard
// function_downloadvcard($bdd, 29);
function function_downloadvcard($bdd, $id){
    return(downloadvcard($bdd, $id));
}

//elle permet de supprimer la vcard
// function_deletevcardlinks($bdd, 34);
function function_deletevcardlinks($bdd, $id_vcard){
    return(deletevcardlinks($bdd, $id_vcard));
}

//elle permet de supprimer la vcard et le lien en même temps
// function_deletevcard_and_link($bdd, 46, 'vcard', 34);
function function_deletevcard_and_link($bdd, $id_link, $type_link, $id_vcard){
    deletevcardlinks($bdd, $id_vcard);
    deletelink($bdd, $id_link, $type_link);
}

function function_add_button_vcard(){
    return(add_button_vcard());
}
?>
