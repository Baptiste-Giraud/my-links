<?php


function select_parameter_and_link_by_current_user($bdd, $name){
    $pdoStat = "SELECT link.*, page_parameter.* FROM link JOIN user ON link.id_user = user.id_user JOIN page_parameter ON link.id_user = page_parameter.id_user WHERE user.name_user = :name ORDER BY position";
    $stmt = $bdd->prepare($pdoStat);
    $stmt->execute(array(':name' => $name));
    $data = $stmt->fetchAll(PDO::FETCH_BOTH);
    $stmt->closeCursor();
    return $data;
}




 ?>