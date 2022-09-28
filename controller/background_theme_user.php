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


function insertbackground_theme_userid($bdd, $label, $slug, $file_path, $type, $status, $couleur){
				$insert = $bdd->prepare("INSERT INTO background_theme_user VALUES (NULL, :label, :slug ,:file_path, :type, :status, :couleur)");
				$insert->bindValue(':label', $label);
				$insert->bindValue(':slug', $slug);
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


function background_theme_user_by_page_parameter($bdd , $theme_id){
	$pdoStats = "SELECT background_theme_user.* FROM background_theme_user LEFT JOIN page_parameter ON background_theme_user.id = page_parameter.theme_id WHERE theme_id = '".$theme_id."' ";
	$stmts = $bdd->prepare($pdoStats);
	$result = $stmts->execute(array(':theme_id' => $theme_id));
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	return($dataparam);
}

?>