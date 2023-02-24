<?php
date_default_timezone_set('Europe/Paris');

function verifSensiteLink($bdd, $url) {
    $urlParse = parse_url($url, PHP_URL_HOST);
    $requser = $bdd->prepare('SELECT COUNT(*) FROM link_sensitive WHERE domaine_name = ?');
    $requser->execute([$urlParse]);
    return $requser->fetchColumn() > 0;
}

function insertlink($bdd, $forme, $type, $effect, $url, $color_link, $texte, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass) {
    try {
        $final_sensitive = 0;
        if ($sensitive == 1) {
            $final_sensitive = 1;
        } else {
            if (strpos($url, 'porn') !== false || strpos($url, 'porno') !== false || strpos($url, 'xxx') !== false || verifSensiteLink($bdd, $url)) {
                $final_sensitive = 1;
            }
        }
        $iduser = $_SESSION['id_user'];
        $insert = $bdd->prepare("INSERT INTO link (id_user, url, type, texte, forme, couleur_card, effect, text_color_link, icon, position, link_show, date_start_show, date_finish_show, `sensitive`, private_pass) VALUES (:id_user, :url, :type, :texte, :forme, :couleur_card, :effect, :text_color_link, :icon, :position, :link_show, :date_start_show, :date_finish_show, :sensitive, :private_pass)");
        $insert->bindValue(':id_user', $iduser);
        $insert->bindValue(':url', $url);
        $insert->bindValue(':type', $type);
        $insert->bindValue(':texte', $texte);
        $insert->bindValue(':forme', $forme);
        $insert->bindValue(':couleur_card', $color_link);
        $insert->bindValue(':effect', $effect);
        $insert->bindValue(':text_color_link', $text_color_link);
        $insert->bindValue(':icon', $icon);
        $insert->bindValue(':position', $position);
        $insert->bindValue(':link_show', $link_show);
        $insert->bindValue(':date_start_show', ($date_start_show === NULL ? NULL : $date_start_show));
        $insert->bindValue(':date_finish_show', ($date_finish_show === NULL ? NULL : $date_finish_show));
        $insert->bindValue(':sensitive', $final_sensitive);
        $insert->bindValue(':private_pass', $private_pass);
        if ($insert->execute()) {
            http_response_code(200);
            return(200);
        } else {
            http_response_code(500);
            return(500);
        }
    } catch (PDOException $e) {
        // log error
        error_log($e->getMessage());
        http_response_code(500);
    }
}




function selectalllinkuser($bdd) {
    $iduser = $_SESSION['id_user'];
    try {
        $stmt = $bdd->prepare("SELECT * FROM link WHERE id_user=:id_user ORDER BY position");
        $stmt->bindParam(':id_user', $iduser, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $data;
    } catch (PDOException $e) {
        // log error
        error_log($e->getMessage());
        return [];
    }
}

function selectlinkbyuserid($bdd, $id){
    $iduser = intval($id); // convertir l'id en entier pour éviter les injections SQL
    $date_start_show = date("Y-m-d H:i:s");
    $date_finish_show = date("Y-m-d H:i:s");
    $stmt = $bdd->prepare("SELECT * FROM link WHERE id_user=:id_user AND link_show=1 AND (date_start_show <= :date_start_show AND date_finish_show >= :date_finish_show) OR (id_user=:id_user AND link_show=1 AND date_start_show IS NULL AND date_finish_show IS NULL) ORDER BY position");
    $stmt->bindParam(':id_user', $iduser, PDO::PARAM_INT);
    $stmt->bindParam(':date_start_show', $date_start_show, PDO::PARAM_STR);
    $stmt->bindParam(':date_finish_show', $date_finish_show, PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}



function selectlinkbyusername($bdd, $username){
    $name_user = htmlspecialchars($username); // échapper les caractères spéciaux pour éviter les injections SQL
    $date_start_show = date("Y-m-d H:i:s");
    $date_finish_show = date("Y-m-d H:i:s");
    $stmt = $bdd->prepare("SELECT link.* FROM user LEFT JOIN link ON user.id_user=link.id_user WHERE name_user=:name_user AND link_show=1 AND (date_start_show <= :date_start_show AND date_finish_show >= :date_finish_show) OR (name_user=:name_user AND link_show=1 AND date_start_show IS NULL AND date_finish_show IS NULL) ORDER BY position");
    $stmt->bindParam(':name_user', $name_user, PDO::PARAM_STR);
    $stmt->bindParam(':date_start_show', $date_start_show, PDO::PARAM_STR);
    $stmt->bindParam(':date_finish_show', $date_finish_show, PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}


function deletelink($bdd, $id, $type) {
    $id_user = intval($_SESSION['id_user']); // convertir l'id en entier pour éviter les injections SQL
    $stmt = $bdd->prepare("DELETE FROM link WHERE id=:id AND type=:type AND id_user=:id_user");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':type', $type, PDO::PARAM_STR);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $result = $stmt->execute();
    if($result == TRUE){
        echo '400';
    }else{
        echo '500';
    }
}


function updatelink($bdd, $id, $url, $type, $texte, $forme, $couleur_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive, $private_pass) {
	try {
		$iduser = $_SESSION['id_user'];
		if($sensitive == 1) {
			$final_sensitive = 1;
		} else {
			if(strstr($url, 'porn') || strstr($url, 'porno') || strstr($url, 'xxx') || verifSensiteLink($bdd, $url) == 1) {
				$final_sensitive = 1;
			} else {
				$final_sensitive = 0;
			}
		}

		$sql = "UPDATE link SET
				url=:url,
				type=:type,
				texte=:texte,
				forme=:forme,
				couleur_card=:couleur_card,
				effect=:effect,
				text_color_link=:text_color_link,
				icon=:icon,
				position=:position,
				link_show=:link_show,
				date_start_show=:date_start_show,
				date_finish_show=:date_finish_show,
				sensitive=:sensitive,
				private_pass=:private_pass
				WHERE id=:id AND id_user=:id_user";
		$stmt= $bdd->prepare($sql);
		$stmt->bindParam(':url', $url, PDO::PARAM_STR);
		$stmt->bindParam(':type', $type, PDO::PARAM_STR);
		$stmt->bindParam(':texte', $texte, PDO::PARAM_STR);
		$stmt->bindParam(':forme', $forme, PDO::PARAM_STR);
		$stmt->bindParam(':couleur_card', $couleur_link, PDO::PARAM_STR);
		$stmt->bindParam(':effect', $effect, PDO::PARAM_STR);
		$stmt->bindParam(':text_color_link', $text_color_link, PDO::PARAM_STR);
		$stmt->bindParam(':icon', $icon, PDO::PARAM_STR);
		$stmt->bindParam(':position', $position, PDO::PARAM_INT);
		$stmt->bindParam(':link_show', $link_show);
		$stmt->bindParam(':date_start_show', $date_start_show);
		$stmt->bindParam(':date_finish_show', $date_finish_show);
		$stmt->bindParam(':sensitive', $final_sensitive);
		$stmt->bindParam(':private_pass', $private_pass);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':id_user', $iduser, PDO::PARAM_INT);
		$resultat = $stmt->execute();

		if($resultat == TRUE) {
			echo '400';
		} else {
			echo '500';
		}
	} catch (PDOException $e) {
		error_log("PDOException: " . $e->getMessage());
		http_response_code(500);
	}
}


?>
