<?php

//route parametre de la pagede lruser
function update_parameter_template($bdd, $type_card, $template_url, $color_page, $description, $texte_color, $police, $iduser){		
				$datas = [
					'type_card' => htmlspecialchars($type_card),
					'template_url' => htmlspecialchars($template_url),
					'color_page' => htmlspecialchars($color_page),
					'description' => htmlspecialchars($description),
                    'texte_color' => htmlspecialchars($texte_color),
                    'police' => htmlspecialchars($police)
				];
				$sql = "UPDATE page_parameter SET type_card=:type_card, template_url=:template_url, color_page=:color_page, police=:police ,description=:description, texte_color=:texte_color WHERE id_user='".$iduser."'";
				$stmt= $bdd->prepare($sql);
				$stmt->execute($datas);
				echo '<script>window.location="https://my-links.fans/user-link.php";</script>';
}

?>