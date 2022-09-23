<?php
session_start();

function insertcard($bdd, $forme, $type, $effect, $url, $color_card, $texte){
	$iduser = $_SESSION['id_user'];
				$insert = $bdd->prepare("INSERT INTO card VALUES (NULL, :id_user ,:url, :type, :texte, :forme, :couleur_card, :effect)");
				$insert->bindValue(':id_user', $iduser);
				$insert->bindValue(':url', $url);
				$insert->bindValue(':type', $type);
				$insert->bindValue(':texte', $texte);
				$insert->bindValue(':forme', $forme);
				$insert->bindValue(':couleur_card', $color_card);
				$insert->bindValue(':effect', $effect);
				$result = $insert->execute();

				if($result == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}

function selectcard($bdd){
	$iduser = $_SESSION['id_user'];
			$pdoStat = "SELECT * FROM card WHERE id_user='".$iduser."' ";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':id_user' => $iduser));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}

function selectcardbyuserid($bdd, $id){
	$iduser = $id;
			$pdoStat = "SELECT * FROM card WHERE id_user='".$iduser."' ";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':id_user' => $iduser));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}


function selectcardbyusername($bdd, $username){
	$name_user = $username;
			$pdoStat = "SELECT card.* FROM user LEFT JOIN card ON user.id_user = card.id_user WHERE name_user = '".$name_user."' ";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':name_user' => $name_user));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}

function deletecard($bdd, $id) {
	$id_user = $_SESSION['id_user'];
    $result = $bdd->query("DELETE FROM card WHERE id='".$id."' AND id_user = '".$id_user."'");
    if($result == TRUE ){
        echo '400';
    }else{
        echo '500';
    }
}
?>
