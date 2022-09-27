<?php 
date_default_timezone_set('Europe/Paris');

function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

function views_count_insert($bdd, $user_id){
        $viewsofday = views_count_select_security($bdd);
        if($viewsofday == 1){
           //compte a deja vu le profile aujourd'hui
        }else{
            $date =  date("Y-m-d");
            $ip = getIp();
            	$insert = $bdd->prepare("INSERT INTO views_count_insert VALUES (NULL, :ip ,:date, :id_user)");
				$insert->bindValue(':ip', $ip);
				$insert->bindValue(':date', $date);
                $insert->bindValue(':id_user', $user_id);
				$result = $insert->execute();

				if($result == TRUE){
					echo '400';
				}else{
					echo '500';
				}
        }
}


function views_count_select_security($bdd){
    $date =  date("Y-m-d");
    $ip = getIp();
    $pdoStat = "SELECT COUNT(*) FROM views_count_insert WHERE date='".$date."' AND ip ='".$ip."' AND id_user";
    $res = $bdd->query($pdoStat);
    $count = $res->fetchColumn();
    return($count);
}

function views_count_select_by_total($bdd){
    $id_user = $_SESSION['id_user'];
    $pdoStat = "SELECT COUNT(*) FROM views_count_insert WHERE id_user='".$id_user."'";
    $res = $bdd->query($pdoStat);
    $count = $res->fetchColumn();
    return($count);
}


?>