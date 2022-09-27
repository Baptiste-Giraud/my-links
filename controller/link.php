<?php

function insertlink($bdd, $forme, $type, $effect, $url, $color_link, $texte){
	$iduser = $_SESSION['id_user'];
				$insert = $bdd->prepare("INSERT INTO link VALUES (NULL, :id_user ,:url, :type, :texte, :forme, :couleur_card, :effect)");
				$insert->bindValue(':id_user', $iduser);
				$insert->bindValue(':url', $url);
				$insert->bindValue(':type', $type);
				$insert->bindValue(':texte', $texte);
				$insert->bindValue(':forme', $forme);
				$insert->bindValue(':couleur_card', $color_link);
				$insert->bindValue(':effect', $effect);
				$result = $insert->execute();

				if($result == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}

function selectlink($bdd){
	$iduser = $_SESSION['id_user'];
			$pdoStat = "SELECT * FROM link WHERE id_user='".$iduser."' ";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':id_user' => $iduser));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}

function selectlinkbyuserid($bdd, $id){
	$iduser = $id;
			$pdoStat = "SELECT * FROM link WHERE id_user='".$iduser."' ";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':id_user' => $iduser));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}


function selectlinkbyusername($bdd, $username){
	$name_user = $username;
			$pdoStat = "SELECT link.* FROM user LEFT JOIN link ON user.id_user = link.id_user WHERE name_user = '".$name_user."' ";
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

function updatelink($bdd, $id, $url, $type, $texte, $forme, $couleur_link, $effect){
	$iduser = $_SESSION['id_user'];
				$sql = "UPDATE link SET
					url=:url,
					type=:type,
					texte=:texte,
					forme=:forme,
					couleur_card=:couleur_card,
					effect=:effect
					WHERE id='".$id."' AND id_user = '".$iduser."'";
				$stmt= $bdd->prepare($sql);
				$stmt->bindParam(':url', $url, PDO::PARAM_STR);
				$stmt->bindParam(':type', $type, PDO::PARAM_STR);
				$stmt->bindParam(':texte', $texte, PDO::PARAM_STR);
				$stmt->bindParam(':forme', $forme, PDO::PARAM_STR);
				$stmt->bindParam(':couleur_card', $couleur_link, PDO::PARAM_STR);
				$stmt->bindParam(':effect', $effect, PDO::PARAM_STR);
				$resultat = $stmt->execute();
	
				if($resultat == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}

?>
