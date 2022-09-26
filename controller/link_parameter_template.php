<?php


 function select_parameter_and_link_by_current_user($bdd, $name){
	$pdoStats = "SELECT link.*,page_parameter.* FROM link JOIN user ON link.id_user = user.id_user JOIN page_parameter ON link.id_user = page_parameter.id_user WHERE user.name_user = '".$name."'";
	$stmts = $bdd->prepare($pdoStats);
	$result = $stmts->execute(array(':name_user' => $name));
	$dataparam = $stmts->fetchAll();
	$stmts->closeCursor();
	return($dataparam);
}



 ?>