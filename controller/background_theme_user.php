<?php 

function selectbackground_theme_userid(PDO $bdd, $id){
    $stmt = $bdd->prepare("SELECT * FROM background_theme_user WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function selectbackground_theme_userlabel(PDO $bdd, $label){
    $stmt = $bdd->prepare("SELECT * FROM background_theme_user WHERE label = :label");
    $stmt->execute(['label' => $label]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertbackground_theme_userid(PDO $bdd, $label, $slug, $file_path, $type, $status, $couleur){
    $stmt = $bdd->prepare("INSERT INTO background_theme_user (label, slug, file_path, type, status, couleur) VALUES (:label, :slug, :file_path, :type, :status, :couleur)");
    $result = $stmt->execute([
        'label' => $label,
        'slug' => $slug,
        'file_path' => $file_path,
        'type' => $type,
        'status' => $status,
        'couleur' => $couleur,
    ]);

    if (!$result) {
        throw new Exception('Erreur lors de l\'insertion des données.');
    }
}

function background_theme_user_by_page_parameter(PDO $bdd , $theme_id){
    $stmt = $bdd->prepare("SELECT background_theme_user.* FROM background_theme_user LEFT JOIN page_parameter ON background_theme_user.id = page_parameter.theme_id WHERE theme_id = :theme_id");
    $stmt->execute(['theme_id' => $theme_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        return null;
    }
    return $result;
}


?>