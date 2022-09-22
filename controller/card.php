<?php

function insertcard($bdd, $forme, $type, $effect, $url, $color_card, $texte, $iduser){
				$insert = $bdd->prepare("INSERT INTO card VALUES (NULL, :id_user ,:url, :type, :texte, :forme, :couleur_card, :effect)");
				$insert->bindValue(':id_user', $iduser);
				$insert->bindValue(':url', $url);
				$insert->bindValue(':type', $type);
				$insert->bindValue(':texte', $texte);
				$insert->bindValue(':forme', $forme);
				$insert->bindValue(':couleur_card', $color_card);
				$insert->bindValue(':effect', $effect);
				$insert->execute();
}

function selectcard($bdd, $iduser){
			$pdoStat = "SELECT * FROM card WHERE id_user='".$iduser."' ";
			$stmt = $bdd->prepare($pdoStat);
			$stmt->execute(array(':id_user' => $iduser));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
}

?>