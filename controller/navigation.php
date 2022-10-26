<?php
if($_POST['id'] == 0){
    $offset = 0;
}else{
    $offset = $_POST['id'];
}
	$pdoStats = "SELECT id_user, COUNT(*) 
    FROM views_count_insert
    GROUP BY id_user
    ORDER BY 2 DESC
    LIMIT 1 OFFSET ".$offset." ";
	$stmts = $bdd->prepare($pdoStats);
	$result = $stmts->execute();
	$data = $stmts->fetchAll();
	$stmts->closeCursor();
    header("Content-Type: application/json");
    $parse = $data[0];
    echo json_encode($parse);
    exit()
?>