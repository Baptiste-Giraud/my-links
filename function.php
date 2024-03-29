<?php 
session_start();
include __DIR__ . '/config/db_connect.php';

if (isset($_POST['registration'])){
    include __DIR__ . '/controller/navigation.php';
    exit();
}

include __DIR__ . '/controller/language_page.php';
// include __DIR__ . '/controller/confirmation.php';
include __DIR__ . '/controller/register.php';
include __DIR__ . '/controller/parameter_template.php';
include __DIR__ . '/controller/link.php';
include __DIR__ . '/controller/link_parameter_template.php';
include __DIR__ . '/controller/background_theme_user.php';
include __DIR__ . '/controller/user.php';
include __DIR__ . '/controller/views_count.php';
include __DIR__ . '/controller/dashboard_parameters.php';
include __DIR__ . '/controller/giphy.php';
include __DIR__ . '/controller/scrap.php';
include __DIR__ . '/controller/newsletter.php';
include __DIR__ . '/controller/vcard.php';
include __DIR__ . '/controller/etablissement.php';




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
    // insertlink($bdd, 1, "effect", "eee", "red", "texte", "red", "facebook", 1, 1, 1, NULL, NULL, 0, NULL);
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


//newsletter add gestion
function function_add_newsletter($bdd, $iduser, $mail){
    add_newsletter($bdd, $iduser, $mail);
}

//affichage newsletter
function function_add_form_newsletter(){
    return(add_form_newsletter());
}

if(isset($_POST['submit']))
{
    function_add_newsletter($bdd,  $iduser, $_POST['email']);
}

if(isset($_POST['vcardcreate'])){
    echo 'lol';
}


function function_veriftoken($bdd){
    return(veriftoken($bdd));
}


// -----------------------------------------

//
// Les fonctions se trouve dans le fichier vcard.php
//

//elle permet de créer un vcard
// function_insert_vcard($bdd, "Emilie", "spina", "emilie@epitech.eu", "26 rue voltaire", "residence", "83000","Toulon",  "france", "0601370524", "0494256374", "http://lol.com", "etudiant", "epitech");
function function_insert_vcard($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise){
    // return(insert_vcards($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise));
}

// elle permet de créer un lien en même temps que la Vcard
// function_insertlink_and_vcard($bdd, "Bagra", "lola", "julia@epitech.eu", "26 rue voltaire", "residence", "83000","Toulon",  "france", "0601370524", "0494256374", "http://lol.com", "etudiant", "Tesla", 1, "vcard", "test", "", "bleu", "lol", "text_color-green", "icon_vcard", 1, 1, NULL, NULL, 0, NULL, NULL, );
function function_insertlink_and_vcard($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise, $type, $url, $texte, $forme, $color_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass){
    // function_insert_vcard($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise);
    function_insertlink($bdd, $type, $url, $texte, $forme, $color_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass);
}


//elle permet de mettre à jour la vcard
// function_update_vcard($bdd, 27, "Quentin", "Thomas", "julia@epitech.eu", "26 rue voltaire", "residence", "83000","Toulon",  "france", "0601370524", "0494256374", "http://lol.com", "etudiant", "epitech" );
function function_update_vcard($bdd, $id, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url, $role, $nom_entreprise){
    // return(update_vcard($bdd, $id, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url, $role, $nom_entreprise));
}

//elle permet de télécharger la vcard
// function_downloadvcard($bdd, 29);
function function_downloadvcard($bdd, $id){
    // return(downloadvcard($bdd, $id));
}

//elle permet de supprimer la vcard
// function_deletevcardlinks($bdd, 34);
function function_deletevcardlinks($bdd, $id_vcard){
    // return(deletevcardlinks($bdd, $id_vcard));
}

//elle permet de supprimer la vcard et le lien en même temps
// function_deletevcard_and_link($bdd, 46, 'vcard', 34);
function function_deletevcard_and_link($bdd, $id_link, $type_link, $id_vcard){
    // deletevcardlinks($bdd, $id_vcard);
    deletelink($bdd, $id_link, $type_link);
}

function function_add_button_vcard(){
    // return(add_button_vcard());
}

if (isset($_POST['function']) && $_POST['function'] === 'insertlink') {
    $forme = $_POST['forme'];
    $type = $_POST['type'];
    $effect = $_POST['effect'];
    $url = $_POST['url'];
    $color_link = $_POST['couleur_link'];
    $texte = $_POST['texte'];
    $text_color_link = $_POST['text_color_link'];
    $icon = $_POST['icon'];
    $position = $_POST['position'];
    $link_show = $_POST['link_show'];
    $date_start_show = $_POST['date_start_show'];
    $date_finish_show = $_POST['date_finish_show'];
    $sensitive = isset($_POST['sensitive']) ? $_POST['sensitive'] : 0;
    $private_pass = isset($_POST['private_pass']) ? $_POST['private_pass'] : NULL;

    $result = insertlink($bdd, $forme, $type, $effect, $url, $color_link, $texte, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass);
    // Récupérer le nombre de lignes affectées
    if ($result == 200) {
        http_response_code(400);
        echo "Le lien a été inséré avec succès !";
    } else {
        http_response_code(500);
        echo "Une erreur s'est produite lors de l'insertion du lien.";
    }    
}

// -----------------------------------------

//
// Les fonctions se trouve dans le fichier etablissement.php
//
// if (isset($_POST['function']) && $_POST['function'] === 'insert_etablissement') {
//     $nom = $_POST['nom'];
//     $adresse = $_POST['adresse'];
//     $complement_adresse = $_POST['complement_adresse'];
//     $code_postal = $_POST['code_postal'];
//     $ville = $_POST['ville'];
//     $num_tel = $_POST['num_tel'];
//     $num_fixe = $_POST['num_fixe'];

//     $result = insert_etablissement($bdd, $nom, $adresse, $complement_adresse, $code_postal, $ville, $num_tel, $num_fixe);

//     // Récupérer le nombre de lignes affectées
//     if ($result == 200) {
//         http_response_code(201);
//         echo "Le lien a été inséré avec succès !";
//     } else {
//         http_response_code(500);
//         echo "Une erreur s'est produite lors de l'insertion du lien.";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = connexion($bdd, $email, $password);
    if ($result == 200) {
        http_response_code(200);
        echo json_encode(array('message' => 'Connexion réussie !'));
    } else {
        http_response_code(401);
        echo json_encode(array('message' => 'Erreur de connexion : '));
    }
}

if (isset($_POST['getClick'])) {
    $userId = $_POST['getClick'];

    // Vérifier si la date de début est définie et la lier à une valeur par défaut si elle ne l'est pas
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] . ' 00:00:00' : '1970-01-01 00:00:00';
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] . ' 23:59:59' : date('Y-m-d H:i:s');

    $stmt = $bdd->prepare("
    SELECT link.url, 
    COUNT(statClick.id) AS clicks, 
    MIN(statClick.click_time) AS start_date, 
    MAX(statClick.click_time) AS end_date 
FROM link 
LEFT JOIN statClick 
    ON link.id = statClick.id_link 
    AND statClick.click_time >= :start_date 
    AND statClick.click_time <= :end_date 
WHERE link.id_user = :userId
AND (statClick.id_user = :userId OR statClick.id_user IS NULL)
GROUP BY link.id 
ORDER BY clicks DESC

    ");

    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
    $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
    $stmt->execute();

    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $start_date = isset($row['start_date']) ? $row['start_date'] : 'Aucun click';
        $end_date = isset($row['end_date']) ? $row['end_date'] : 'Aucun click';

        $data[] = array(
            "url" => $row["url"],
            "clicks" => $row["clicks"],
            "start_date" => $start_date,
            "end_date" => $end_date
        );
    }

    echo json_encode($data);
}


if(isset($_POST['getChart'])) {
    
    // Récupération des paramètres de la requête
    $id_user = $_POST['getChart'];
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] . ' 00:00:00' : '1970-01-01 00:00:00';
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] . ' 23:59:59' : date('Y-m-d H:i:s');
    
    // Requête pour récupérer les données
    $stmt = $bdd->prepare("
      SELECT
        DATE_FORMAT(date, '%Y-%m-%d') AS date,
        device,
        COUNT(*) AS daily_visits
      FROM views_count_insert
      WHERE id_user = :id_user AND date >= :start_date AND date <= :end_date
      GROUP BY date, device
      ORDER BY date, device
    ");
    
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
    $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
    $stmt->execute();
    
    // Traitement des résultats
    $dates = array();
    $daily_visits = array();
    $devices = array();
    $device_visits = array();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Récupération des données pour le graphique des visites quotidiennes
      $date = $row['date'];
      if(!in_array($date, $dates)) {
        $dates[] = $date;
      }
      if(!isset($daily_visits[$row['device']])) {
        $daily_visits[$row['device']] = array_fill(0, count($dates), 0);
      }
      $index = array_search($date, $dates);
      $daily_visits[$row['device']][$index] = $row['daily_visits'];
    
      // Récupération des données pour le graphique des visites par type de dispositif
      $device = $row['device'];
      if(!in_array($device, $devices)) {
        $devices[] = $device;
      }
      if(isset($device_visits[$device])) {
        $device_visits[$device] += $row['daily_visits'];
      } else {
        $device_visits[$device] = $row['daily_visits'];
      }
    }
    
    // Préparation des données pour le renvoi au format JSON
    $data = array(
      "dates" => $dates,
      "daily_visits" => $daily_visits,
      "devices" => $devices,
      "device_visits" => $device_visits
    );
    
    echo json_encode($data);
    
}








?>