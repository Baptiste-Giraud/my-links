<?php

require 'vendor/autoload.php';

use JeroenDesloovere\VCard\VCard;


// function insert_vcards($bdd, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url_vcard, $role, $nom_entreprise){
//     $iduser = $_SESSION['id_user'];
// 				$insert = $bdd->prepare("INSERT INTO vcard VALUES (NULL, :id_user ,:nom, :prenom, :email, :adresse, :complement_adresse, :code_postal, :ville, :pays, :tel_portable, :tel_fixe,:url_vcard, :role, :nom_entreprise)");
// 				$insert->bindValue(':id_user', $iduser);
// 				$insert->bindValue(':nom', $nom);
// 				$insert->bindValue(':prenom', $prenom);
// 				$insert->bindValue(':email', $email);
// 				$insert->bindValue(':adresse', $adresse);
// 				$insert->bindValue(':complement_adresse', $complement_adresse);
// 				$insert->bindValue(':code_postal', $code_postal);
// 				$insert->bindValue(':ville', $ville);
// 				$insert->bindValue(':pays', $pays);
// 				$insert->bindValue(':tel_portable', $tel_portable);
// 				$insert->bindValue(':tel_fixe', $tel_fixe);
// 				$insert->bindValue(':url_vcard',$url_vcard);
// 				$insert->bindValue(':role',$role);
// 				$insert->bindValue(':nom_entreprise',$nom_entreprise);
// 				$result = $insert->execute();

// 				if($result == TRUE){
// 					echo '400';
// 				}else{
// 					echo '500';
// 				}
// }

// function update_vcard($bdd, $id, $nom, $prenom, $email, $adresse, $complement_adresse, $code_postal, $ville, $pays, $tel_portable, $tel_fixe, $url, $role, $nom_entreprise){
// 	$iduser = $_SESSION['id_user'];
// 				$sql = "UPDATE vcard SET
// 					nom=:nom,
// 					prenom=:prenom,
// 					email=:email,
// 					adresse=:adresse,
// 					complement_adresse=:complement_adresse,
// 					code_postal=:code_postal,
// 					ville=:ville,
// 					pays=:pays,
// 					tel_portable=:tel_portable,
// 					tel_fixe=:tel_fixe,
// 					url=:url,
// 					role=:role,
// 					nom_entreprise=:nom_entreprise
// 					WHERE id='".$id."' AND id_user = '".$iduser."'";
// 				$stmt= $bdd->prepare($sql);
// 				$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
// 				$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
// 				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
// 				$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
// 				$stmt->bindParam(':complement_adresse', $complement_adresse, PDO::PARAM_STR);
// 				$stmt->bindParam(':code_postal', $code_postal, PDO::PARAM_STR);
// 				$stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
// 				$stmt->bindParam(':pays', $pays, PDO::PARAM_STR);
// 				$stmt->bindParam(':tel_portable', $tel_portable, PDO::PARAM_STR);
// 				$stmt->bindParam(':tel_fixe', $tel_fixe, PDO::PARAM_STR);
// 				$stmt->bindParam(':url', $url, PDO::PARAM_STR);
// 				$stmt->bindParam(':role', $role, PDO::PARAM_STR);
// 				$stmt->bindParam(':nom_entreprise', $nom_entreprise, PDO::PARAM_STR);
// 				$resultat = $stmt->execute();
// 				if($resultat == TRUE){
// 					echo 'ça marche';
// 				}else{
// 					echo 'ça marche pas';
// 				}
// 				return($resultat);
// 				var_dump($resultat);
// }

// function deletevcardlinks($bdd, $id){
//     $id_user = $_SESSION['id_user'];
//     $result = $bdd->query("DELETE FROM vcard WHERE id='".$id."'AND id_user = '".$id_user."'");
//     if($result == TRUE ){
//         echo '400';
//     }else{
//         echo '500';
//     }
// }

// select vcard

// function downloadvcard($bdd, $id){

//     $vcard = new VCard();

// 	$iduser = $id;
// 	$pdoStat = ('SELECT * FROM vcard WHERE id = '.$iduser.'');
// 	$stmt = $bdd->prepare($pdoStat);
// 	$result = $stmt->execute();
// 	$data = $stmt->fetchAll(PDO::FETCH_BOTH);

// 	$stmt->closeCursor();

//     // add work data
//     $vcard->addName($data[0]['nom'], $data[0]['prenom']);
//     $vcard->addEmail($data[0]['email']);
//     $vcard->addAddress($data[0]['adresse']);
//     $vcard->addAddress($data[0]['complement_adresse']);
//     $vcard->addAddress($data[0]['code_postal']);
//     $vcard->addAddress($data[0]['ville']);
//     $vcard->addAddress($data[0]['pays']);
//     $vcard->addPhoneNumberTel($data[0]['tel_portable']);
//     $vcard->addPhoneNumberFixe($data[0]['tel_fixe']);
//     $vcard->addURL($data[0]['url']);
//     $vcard->addJobtitle($data[0]['role']);
//     $vcard->addCompany($data[0]['nom_entreprise']);

//     // $vcard->addPhoto(__DIR__ . '/landscape.jpeg');

//     // return vcard as a string
//     //return $vcard->getOutput();

//     // return vcard as a download
//     return $vcard->download();

//     // save vcard on disk
//     //$vcard->setSavePath('/path/to/directory');
//     //$vcard->save();
// }

// function add_button_vcard(){
// 	echo '<button href="post" type="button">Télécharger la vcard</button>';
// }

?>