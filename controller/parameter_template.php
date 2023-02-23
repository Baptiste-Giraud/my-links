<?php

function update_parameter_template($bdd, $type_composition, $theme_id, $color_page, $texte_color, $police, $views_count){
    $iduser = $_SESSION['id_user'];
    $datas = [
        'type_composition' => htmlspecialchars($type_composition),
        'theme_id' => htmlspecialchars($theme_id),
        'color_page' => htmlspecialchars($color_page),
        'texte_color' => htmlspecialchars($texte_color),
        'police' => htmlspecialchars($police),
        'views_count' => htmlspecialchars($views_count)
    ];
    $sql = "UPDATE page_parameter SET type_composition=:type_composition, theme_id=:theme_id, color_page=:color_page, police=:police, views_count=:views_count , texte_color=:texte_color WHERE id_user=:id_user";
    $stmt= $bdd->prepare($sql);
    $stmt->bindParam(':type_composition', $datas['type_composition'], PDO::PARAM_STR);
    $stmt->bindParam(':theme_id', $datas['theme_id'], PDO::PARAM_INT);
    $stmt->bindParam(':color_page', $datas['color_page'], PDO::PARAM_STR);
    $stmt->bindParam(':police', $datas['police'], PDO::PARAM_STR);
    $stmt->bindParam(':views_count', $datas['views_count'], PDO::PARAM_INT);
    $stmt->bindParam(':texte_color', $datas['texte_color'], PDO::PARAM_STR);
    $stmt->bindParam(':id_user', $iduser, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    if($resultat){
        echo '400';
    }else{
        echo '500';
    }
}


function select_parameter_by_current_user($bdd){
    $iduser = $_SESSION['id_user'];
    $pdoStats = "SELECT * FROM page_parameter WHERE id_user=:id_user";
    $stmts = $bdd->prepare($pdoStats);
    $stmts->bindParam(':id_user', $iduser, PDO::PARAM_INT);
    $stmts->execute();
    $dataparam = $stmts->fetch(PDO::FETCH_ASSOC);
    $stmts->closeCursor();
    return $dataparam;
}

function select_parameter_current_user_by_id_user($bdd, $id){
    $iduser = $id;
    $pdoStats = "SELECT * FROM page_parameter WHERE id_user=:id_user";
    $stmts = $bdd->prepare($pdoStats);
    $stmts->bindParam(':id_user', $iduser, PDO::PARAM_INT);
    $stmts->execute();
    $dataparam = $stmts->fetch(PDO::FETCH_ASSOC);
    $stmts->closeCursor();
    return $dataparam;
}


function select_parameter_current_user_by_name($bdd, $name){
    $pdoStats = "SELECT page_parameter.* FROM user LEFT JOIN page_parameter ON user.id_user = page_parameter.id_user WHERE name_user=:name_user";
    $stmts = $bdd->prepare($pdoStats);
    $stmts->bindParam(':name_user', $name, PDO::PARAM_STR);
    $stmts->execute();
    $dataparam = $stmts->fetch(PDO::FETCH_ASSOC);
    $stmts->closeCursor();
    return $dataparam;
}


?>