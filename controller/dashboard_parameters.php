<?php

function select_dashboard_parameters_id($bdd, $id){
    $stmt = $bdd->prepare("SELECT * FROM dashboard_parameters WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $dataparam = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $dataparam;
}

function select_dashboard_parameters_by_type($bdd, $type){
    $stmt = $bdd->prepare("SELECT * FROM dashboard_parameters WHERE type = :type");
    $stmt->execute(['type' => $type]);
    $dataparam = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $dataparam;
}

function insert_dashboard_parameters($bdd, $type, $parameter){
    $stmt = $bdd->prepare("INSERT INTO dashboard_parameters (type, parameter) VALUES (:type, :parameter)");
    $result = $stmt->execute([
	'type' => $type,
	'parameter' => $parameter
]);

if($result){
	return 400;
} else {
	throw new Exception("Erreur lors de l'insertion des paramètres de tableau de bord");
}
}



?>