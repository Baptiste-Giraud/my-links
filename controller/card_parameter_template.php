<?php


 function select_parameter_and_card_by_current_user($bdd, $name){
	$pdoStats = "SELECT card.*,page_parameter.* FROM card JOIN user ON card.id_user = user.id_user JOIN page_parameter ON card.id_user = page_parameter.id_user WHERE user.name_user = '".$name."'";
	$stmts = $bdd->prepare($pdoStats);
	$result = $stmts->execute(array(':name_user' => $name));
	$dataparam = $stmts->fetchAll();
	$stmts->closeCursor();
	return($dataparam);
}



 ?>