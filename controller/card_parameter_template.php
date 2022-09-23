<?php


 function select_parameter_and_card_by_current_user($bdd, $name){
	$pdoStats = "SELECT page_parameter.* , card.* FROM user INNER JOIN page_parameter ON user.id_user = page_parameter.id_user INNER JOIN card ON card.id_user = page_parameter.id_user WHERE name_user = '".$name."' ";
	$stmts = $bdd->prepare($pdoStats);
	$result = $stmts->execute(array(':name_user' => $name));
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	return($dataparam);
}



 ?>