<?php
$type_card = $_POST['type_card']; 
				$typecolor= $_POST['toggle'];
				if($typecolor == "block"){
					$color2 = $_POST['2head'];
				}else{
					$color2 = NULL;
				}
				$datas = [
					'type_card' => htmlspecialchars($_POST['type_card']),
					'template_url' => htmlspecialchars(NULL),
					'color_page' => htmlspecialchars($_POST['head']),
					'description' => htmlspecialchars($_POST['description']),
					'color_page2' => $color2,
				];
				$sql = "UPDATE page_parameter SET type_card=:type_card, template_url=:template_url, color_page=:color_page, description=:description, color_page2=:color_page2 WHERE id_user='".$iduser."'";
				$stmt= $bdd->prepare($sql);
				$stmt->execute($datas);
				echo '<script>window.location="https://my-links.fans/user-link.php";</script>';

?>