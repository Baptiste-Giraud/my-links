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


  function check_device(){
    $value_return = NULL;
    //mobile
    $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
    $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet"));
    $isDesktop = !$isMob && !$isTab;

    if($isMob != null){
      $value_return =  "mobile";
    }else if ($isTab != null){
      $value_return =  "tablet";
    }
    else if($isDesktop){
      $value_return =  "desktop";
    }
 
    //  TABLET CHECK
 
    // (C) DESKTOP?
    return($value_return);
  }

function views_count_insert($bdd, $user_id){
        $viewsofday = views_count_select_security($bdd);
        if($viewsofday == 1){
           //compte a deja vu le profile aujourd'hui
        }else{
            $date =  date("Y-m-d");
            $ip = getIp();
            $device = check_device();
            var_dump($device);
            	$insert = $bdd->prepare("INSERT INTO views_count_insert VALUES (NULL, :ip ,:date, :id_user, :device)");
				$insert->bindValue(':ip', $ip);
				$insert->bindValue(':date', $date);
        $insert->bindValue(':id_user', $user_id);
        $insert->bindValue(':device', $device);
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