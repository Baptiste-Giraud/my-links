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
				$sql = "UPDATE page_parameter SET type_composition=:type_composition, theme_id=:theme_id, color_page=:color_page, police=:police, views_count=:views_count , texte_color=:texte_color WHERE id_user='".$iduser."'";
				$stmt= $bdd->prepare($sql);
				$resultat = $stmt->execute($datas);

				if($resultat == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}


function select_parameter_by_current_user($bdd){
	$iduser = $_SESSION['id_user'];
	$pdoStats = "SELECT * FROM page_parameter WHERE id_user='".$iduser."' ";
	$stmts = $bdd->prepare($pdoStats);
	$stmts->execute(array(':id_user' => $iduser));
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	return($dataparam);
}

function select_parameter_current_user_by_id_user($bdd, $id){
	$iduser = $id;
	$pdoStats = "SELECT * FROM page_parameter WHERE id_user='".$iduser."' ";
	$stmts = $bdd->prepare($pdoStats);
	$stmts->execute(array(':id_user' => $iduser));
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	return($dataparam);
}


function select_parameter_current_user_by_name($bdd, $name){
	$pdoStats = "SELECT page_parameter.* FROM user LEFT JOIN page_parameter ON user.id_user = page_parameter.id_user WHERE name_user = '".$name."' ";
	$stmts = $bdd->prepare($pdoStats);
	$result = $stmts->execute(array(':name_user' => $name));
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	return($dataparam);
}

?>