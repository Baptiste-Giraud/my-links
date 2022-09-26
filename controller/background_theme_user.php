<?php 

function selectbackground_theme_userid($bdd, $id){
			$pdoStat = "SELECT * FROM background_theme_user WHERE id='".$id."' ";
			$stmt = $bdd->prepare($pdoStat);
			$result = $stmt->execute(array(':id' => $id));
			$data = $stmt->fetchAll(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			return($data);
}

function selectbackground_theme_userlabel($bdd, $label){
    $pdoStat = "SELECT * FROM background_theme_user WHERE label='".$label."' ";
    $stmt = $bdd->prepare($pdoStat);
    $result = $stmt->execute(array(':label' => $label));
    $data = $stmt->fetchAll(PDO::FETCH_BOTH);
    $stmt->closeCursor();
    return($data);
}


function insertbackground_theme_userid($bdd, $label, $file_path, $type, $status, $couleur){
				$insert = $bdd->prepare("INSERT INTO background_theme_user VALUES (NULL, :label ,:file_path, :type, :status, :couleur)");
				$insert->bindValue(':label', $label);
				$insert->bindValue(':file_path', $file_path);
				$insert->bindValue(':type', $type);
				$insert->bindValue(':status', $status);
				$insert->bindValue(':couleur', $couleur);
				$result = $insert->execute();

				if($result == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}

?>