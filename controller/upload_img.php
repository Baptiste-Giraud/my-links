<?php 
if(isset($_POST['upd'])){
   	$carte_form = 1;
    $errors= array();
 	$file_name = $_FILES['image']['name'];
	$file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    $value = time() + rand(18, 288);
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
		$iduser = $_SESSION['id_user'];
		$pdoStat = "SELECT * FROM user WHERE id_user='".$_SESSION['id_user']."' ";
			$stmt = $bdd->prepare($pdoStat);
			$stmt->execute(array(':id_user' => $iduser));
			$row = $stmt->fetch(PDO::FETCH_BOTH);
			$stmt->closeCursor();
			if($row['path_img'] != NULL){
				unlink($row['path_img']);
			}
		$type = "logo";
       move_uploaded_file($file_tmp,"image_galery/".$file_name);
       $path_g = "image_galery/".$file_name."";
       $fin = pathinfo($file_name, PATHINFO_EXTENSION);
       $path_galery = "image_galery/".$value.".".$fin;
       rename($path_g, $path_galery);
	   $data = [
		'path_img' => htmlspecialchars($path_galery),
	];
	$sql = "UPDATE user SET path_img=:path_img  WHERE id_user='".$_SESSION['id_user']."'";
	$stmt= $bdd->prepare($sql);
	$stmt->execute($data);
	echo '<script>window.location="https://my-links.fans/parametre.php";</script>';
    }else{
       print_r($errors);
    }
  }