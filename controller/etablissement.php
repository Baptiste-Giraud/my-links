<?php

function insert_etablissement($bdd, $nom, $adresse, $complement_adresse, $code_postal, $ville, $num_tel, $num_fixe) {
    try {
        $id_user = 7;
        $insert = $bdd->prepare("INSERT INTO link (id_user, nom, adresse, complement_adresse, code_postal, ville, num_tel, num_fixe) VALUES (:id_user, :nom, :adresse, :complement_adresse, :code_postal, :ville, :num_tel, :num_fixe)");
        $insert->bindValue(':id_user', $id_user);
        $insert->bindValue(':nom', $nom);
        $insert->bindValue(':adresse', $adresse);
        $insert->bindValue(':complement_adresse', $complement_adresse);
        $insert->bindValue(':code_postal', $code_postal);
        $insert->bindValue(':ville', $ville);
        $insert->bindValue(':num_tel', $num_tel);
        $insert->bindValue(':num_fixe', $num_fixe);
        if ($insert->execute()) {
            http_response_code(200);
            return(200);
        } else {
            http_response_code(500);
            return("marche pas");
        }
    } catch (PDOException $e) {
        // log error
        error_log($e->getMessage());
        http_response_code(500);
        return(500);
    }
}

?>