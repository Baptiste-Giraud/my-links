<?php

function updateinfouser($bdd, $iduser, $name_user, $email_user, $nom_user, $prenom_user, $description){
	$iduser = $_SESSION['id_user'];
				$sql = "UPDATE user SET
					name_user=:name_user,
					email_user=:email_user,
					nom_user=:nom_user,
					prenom_user=:prenom_user,
					description=:description
					WHERE id_user = '".$iduser."'";

				$stmt= $bdd->prepare($sql);
				$stmt->bindParam(':name_user', $name_user, PDO::PARAM_STR);
				$stmt->bindParam(':email_user', $email_user, PDO::PARAM_STR);
				$stmt->bindParam(':nom_user', $nom_user, PDO::PARAM_STR);
				$stmt->bindParam(':prenom_user', $prenom_user, PDO::PARAM_STR);
				$stmt->bindParam(':description', $description, PDO::PARAM_STR);
				// $stmt->execute();
				$resultat = $stmt->execute();

				if($resultat == TRUE){
					echo 'ça fonctionne';
				}else{
					echo 'fonctione pas';
				}
}

function selectinfouserbypseudo($bdd, $name_user){
	$pdoStats = "SELECT id_user, name_user, email_user, nom_user, prenom_user, path_img, description  FROM user WHERE name_user='".$name_user."' ";
	$stmts = $bdd->prepare($pdoStats);
	$stmts->execute(array(':name_user' => $name_user));
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	return($dataparam);
}
?>
