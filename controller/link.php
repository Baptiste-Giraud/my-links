<?php
date_default_timezone_set('Europe/Paris');


function verifSensiteLink($bdd, $url){
	$urlParse = parse_url($url, PHP_URL_HOST);
	
	$requser = $bdd->prepare('SELECT * FROM link_sensitive WHERE domaine_name = ?');
    $requser->execute(array($urlParse));
    $urlexiste = $requser->rowCount();

    return($urlexiste);

}

function insertlink($bdd, $forme, $type, $effect, $url, $color_link, $texte, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive){
	if($sensitive == 1){
		$final_sensitive = 1;
	}else{
		if(strstr($url, 'porn')){
			$final_sensitive = 1;
		}else if(strstr($url, 'porno')){
			$final_sensitive = 1;
		}else if(strstr($url, 'xxx')){
			$final_sensitive = 1;
		}
		else if(verifSensiteLink($bdd, $url) == 1){
			$final_sensitive = 1;
		}else{
			$final_sensitive = 0;
		}
	}
	
	$iduser = $_SESSION['id_user'];
				$insert = $bdd->prepare("INSERT INTO link VALUES (NULL, :id_user ,:url, :type, :texte, :forme, :couleur_card, :effect, :text_color_link, :icon, :position, :link_show,:date_start_show, :date_finish_show, :sensitive)");
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
				$insert->bindValue(':date_start_show',($date_start_show == NULL ? NULL : $date_start_show));
				$insert->bindValue(':date_finish_show',($date_finish_show == NULL ? NULL : $date_finish_show));
				$insert->bindValue(':sensitive',$final_sensitive);
				$result = $insert->execute();

				if($result == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}

function selectalllinkuser($bdd){
	$iduser = $_SESSION['id_user'];
			$pdoStat = "SELECT * FROM link WHERE id_user='".$iduser."' ORDER BY position";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':id_user' => $iduser));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}

function selectlinkbyuserid($bdd, $id){
	$iduser = $id;
	$date_start_show = date("Y-m-d H:i:s");
	$date_finish_show = date("Y-m-d H:i:s");
			$pdoStat = "SELECT * FROM link WHERE id_user='".$iduser."' AND link_show = 1 AND date_start_show <='".$date_start_show."' AND date_finish_show >='".$date_finish_show."' OR id_user='".$iduser."' AND link_show = 1 AND  date_start_show IS NULL AND date_finish_show IS NULL ORDER BY position";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':id_user' => $iduser));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}


function selectlinkbyusername($bdd, $username){
	$name_user = $username;
	$date_start_show = date("Y-m-d H:i:s");
	$date_finish_show = date("Y-m-d H:i:s");
			$pdoStat = "SELECT link.* FROM user LEFT JOIN link ON user.id_user = link.id_user WHERE name_user = '".$name_user."' AND link_show = 1 AND date_start_show <='".$date_start_show."' AND date_finish_show >='".$date_finish_show."' OR name_user='".$name_user."' AND link_show = 1 AND  date_start_show IS NULL AND date_finish_show IS NULL  ORDER BY position";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':name_user' => $name_user));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}

function deletelink($bdd, $id) {
	$id_user = $_SESSION['id_user'];
    $result = $bdd->query("DELETE FROM link WHERE id='".$id."' AND id_user = '".$id_user."'");
    if($result == TRUE ){
        echo '400';
    }else{
        echo '500';
    }
}

function updatelink($bdd, $id, $url, $type, $texte, $forme, $couleur_link, $effect, $text_color_link, $icon, $position, $link_show, $date_start_show, $date_finish_show, $sensitive){
	$iduser = $_SESSION['id_user'];
	if($sensitive == 1){
		$final_sensitive = 1;
	}else{
		if(strstr($url, 'porn')){
			$final_sensitive = 1;
		}else if(strstr($url, 'porno')){
			$final_sensitive = 1;
		}else if(strstr($url, 'xxx')){
			$final_sensitive = 1;
		}else if(verifSensiteLink($bdd, $url) == 1){
			$final_sensitive = 1;
		}else{
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
					sensitive= :sensitive
					WHERE id='".$id."' AND id_user = '".$iduser."'";
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
				$stmt->bindParam(':date_finish_show', $final_sensitive);
				$resultat = $stmt->execute();
	
				if($resultat == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}

?>
