<?php
session_start();

function update_parameter_template($bdd, $type_composition, $template_url, $color_page, $description, $texte_color, $police, $views_count){		
	$iduser = $_SESSION['id_user'];
				$datas = [
					'type_composition' => htmlspecialchars($type_composition),
					'template_url' => htmlspecialchars($template_url),
					'color_page' => htmlspecialchars($color_page),
					'description' => htmlspecialchars($description),
                    'texte_color' => htmlspecialchars($texte_color),
                    'police' => htmlspecialchars($police),
					'views_count' => htmlspecialchars($views_count)
				];
				$sql = "UPDATE page_parameter SET type_composition=:type_composition, template_url=:template_url, color_page=:color_page, police=:police, views_count=:views_count ,description=:description, texte_color=:texte_color WHERE id_user='".$iduser."'";
				$stmt= $bdd->prepare($sql);
				$resultat = $stmt->execute($datas);

				if($resultat == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}

?>