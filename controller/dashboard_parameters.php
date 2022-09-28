<?php

function select_dashboard_parameters_id($bdd, $id){
	$pdoStats = "SELECT * FROM dashboard_parameters WHERE id='".$id."' ";
	$stmts = $bdd->prepare($pdoStats);
	$stmts->execute(array(':id' => $id));
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	return($dataparam);
}

function select_dashboard_parameters_by_type($bdd, $type){
	$pdoStats = "SELECT * FROM dashboard_parameters WHERE type='".$type."' ";
	$stmts = $bdd->prepare($pdoStats);
	$stmts->execute(array(':type' => $type));
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	return($dataparam);
}


function insert_dashboard_parameters($bdd, $type, $parameter){
				$insert = $bdd->prepare("INSERT INTO dashboard_parameters VALUES (NULL, type, parameter)");
				$insert->bindValue(':type', $type);
				$insert->bindValue(':parameter', $parameter);
				$result = $insert->execute();

				if($result == TRUE){
					echo '400';
				}else{
					echo '500';
				}
}

?>