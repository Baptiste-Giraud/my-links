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


function updatenameuser($bdd, $iduser, $name_user){
	$iduser = $_SESSION['id_user'];
				$sql = "UPDATE user SET
					name_user=:name_user,
					description=:description
					WHERE id_user = '".$iduser."'";

				$stmt= $bdd->prepare($sql);
				$stmt->bindParam(':name_user', $name_user, PDO::PARAM_STR);
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



function veriftoken($bdd){
	$pdoStats = "SELECT token FROM user WHERE id_user='".$_SESSION['id_user']."' ";
	$stmts = $bdd->prepare($pdoStats);
	$stmts->execute();
	$dataparam = $stmts->fetch(PDO::FETCH_BOTH);
	$stmts->closeCursor();
	if($dataparam['token'] == $_SESSION['token']){
		$return = 'true';
	}else{
		$return = 'false';
	}
	return($return);
}


// if (isset($_SESSION['id_user']) && $_SESSION['time'] < time() - 300) {
//     session_regenerate_id(true);
//     $_SESSION['time'] = time();
// }

// if(!isset($_SESSION['initialised'])){
// 	session_regenerate_id(true);
// 	$_SESSION['initialised'] = true;
// }



$saltuseragent = "f9700bf7-0b83-4fae-99d5-2c90700f6e74";
$saltipadresse = "bB#6UfRxW7)Qm0d0.Dda";

if(isset($_SESSION['HTTP_USER_AGENT'])){
	if($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'].$saltuseragent)){
		$_SESSION = array();
		session_destroy();
		//page login;
		exit();
	}
}else{
	$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT'].$saltuseragent);
}

if (isset($_SESSION['id_user']) && (getIp().$saltipadresse != $_SESSION['ipaddress']))
{
	//pagelogin
	session_destroy();
}
?>
