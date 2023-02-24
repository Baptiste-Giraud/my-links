<?php
session_start();

function name_exist($bdd, $name_user){
        $requname = $bdd->prepare('SELECT * FROM user WHERE name_user = ?');
        $requname->execute(array($name_user));
        $requnameexist = $requname->rowCount();

        return($requnameexist);
}


function email_exist($bdd,$mail){
    $requser = $bdd->prepare('SELECT * FROM user WHERE email_user = ?');
    $requser->execute(array($mail));
    $userexist = $requser->rowCount();

    return($userexist);
}

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


//inscription
function register($bdd, $emailuser, $nomuser, $prenomuser, $mdpuser, $usernameuser, $mdpsuruser){
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';

        $mail = htmlspecialchars($emailuser);
        $saltpassword = "7(gj??Uo1hQj^tn{~A^H8*#h";
        $nom = htmlspecialchars($nomuser);
        $prenom = htmlspecialchars($prenomuser);
        $mdp = password_hash($mdpuser.$saltpassword, PASSWORD_DEFAULT);
        $name_user = htmlspecialchars($usernameuser);
        $date = date("Y-m-d");

        $requnameexist = name_exist($bdd, $name_user);

        $userexist = email_exist($bdd, $mail);
        if($mdpuser != $mdpsuruser){
            echo '<script>swal("Oops!", "Vos mot de passes sont différents", "error");</script>';
            exit();
        }else if(strlen($mdpuser) <= 7){
            echo '<script>swal("Oops!", "Mot de passe inferieur a 7 caracteres", "error");</script>';
            exit();
        }else if ($name_user == trim($name_user) && strpos($name_user, ' ') !== false) {
            echo '<script>swal("Oops!", "Identifiant impossible avec espace", "error");</script>';
            exit();
        }else if($userexist >= 1 || $requnameexist >=1){
            echo '<script>swal("Oops!", "Ce compte existe déja!", "error");</script>';
            exit();
        }else {
            $longueurKey = 15;
            $key = "";
            for($i=1;$i<$longueurKey;$i++) {
                $key .= mt_rand(0,9);
            }

            $cookieid = uniqid();

            $insert = $bdd->prepare("INSERT INTO user VALUES (NULL, :name_user ,:email_user, :mdp_user, :nom_user ,:prenom_user , :confirmkey, :uniqid, :token,:path_img, :description ,:confirme, :date_creation,:star_account, :type_account)");
            $insert->bindValue(':name_user', $name_user);
            $insert->bindValue(':email_user', $mail);
            $insert->bindValue(':mdp_user', $mdp);
            $insert->bindValue(':nom_user', $nom);
            $insert->bindValue(':prenom_user', $prenom);
            $insert->bindValue(':confirmkey', $key);
            $insert->bindValue(':uniqid', uniqid());
            $insert->bindValue(':token', NULL);
            $insert->bindValue(':path_img', "");
            $insert->bindValue(':description', "");
            $insert->bindValue(':confirme', "");
            $insert->bindValue(':date_creation', $date);
            $insert->bindValue(':star_account',0);
            $insert->bindValue(':type_account','normal');
        


            $resultats = $insert->execute();
            if($resultats == TRUE){
                setcookie("69mkMJiQdJ", $cookieid);

                $last_id = $bdd->lastInsertId();

                $insert = $bdd->prepare("INSERT INTO browser_id VALUES (NULL, :id_user, :cookie)");
                $insert->bindValue(':id_user', $last_id);
                $insert->bindValue(':cookie', $cookieid);
                $cookieresult = $insert->execute();
                if($cookieresult == TRUE){


                $insert = $bdd->prepare("INSERT INTO page_parameter VALUES (NULL, :id_user, :type_composition, :theme_id ,:color_page, :police, :views_count, :texte_color)");
                $insert->bindValue(':id_user', $last_id);
                $insert->bindValue(':type_composition', "Couleur");
                $insert->bindValue(':theme_id', 1);
                $insert->bindValue(':color_page', "#ffff");
                $insert->bindValue(':police', "");
                $insert->bindValue(':views_count', "");
                $insert->bindValue(':texte_color', "rgb(255, 255, 255);");
                $insert->execute();
                $my_from='support@my-links.fans';
                $header="MIME-Version: 1.0\r\n";
                $header .= 'From: '.$my_from.'' . "\r\n" .
                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';
                        $message='<html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        </head>
        <body>
            <h2>Bonjour '.$name_user.'</h2>
            <p>Félicitations pour ton inscription sur notre plateforme. Nous sommes ravis de te compter parmis nos utilisateurs !</p>
            <p>Pour commencez à utiliser nos services, cliquez sur le lien ci-dessous ou copier l\'adresse dans votre navigateur :</p>
            <a class="btn btn-primary" style="justify-content: center;" href="https://my-links.fans/controller/confirmation.php?name_user='.urlencode($name_user).'&key='.$key.'" role="button">Vérifier mon adresse-email :)</a>
            <p>A tous de suite,<br>La team <b>My-Links</b>.</p>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        </html>';
                //         mail($mail, "Confirmation de compte", $message, $header);
                echo '<script>swal("Parfait!", "Votre compte a était crée, veuillez confirmer votre adresse email", "success");</script>';
            }else{
                echo '500';
            }
        }else{
            echo '500';
        }
        }
}


function cookieid($bdd,$cookieid){
    $requser = $bdd->prepare('SELECT * FROM browser_id WHERE cookie = ?');
		$requser->execute(array($cookieid));
		$userexist = $requser->rowCount();
		if($userexist == 1){
           return('400');
        }else{
            return('500');
        }
}


//login
function connexion($bdd, $email, $mdpenter){
    // if(isset($_COOKIE['69mkMJiQdJ'])){
    //     if(cookieid($bdd, $_COOKIE['69mkMJiQdJ']) == "400"){
    //         http_response_code(403);
    //         exit('votre navigateur est connu');
    //     }else{
    //         http_response_code(403);
    //         exit('navigateur inconnu');
    //     } 
    // }else{
    //     http_response_code(403);
    //     exit('cookie non definis');
    // }
    
    $mailconnect = htmlspecialchars($email);
    $saltpassword = "7(gj??Uo1hQj^tn{~A^H8*#h";
    $requser = $bdd->prepare('SELECT * FROM user WHERE email_user = ? OR name_user = ?');
    $requser->execute(array($mailconnect, $mailconnect));
    $userexist = $requser->rowCount();
    if($userexist == 1){
        $userinfo = $requser->fetch();
        if (password_verify($mdpenter.$saltpassword, $userinfo['mdp_user'])) {
            $saltipadresse = "bB#6UfRxW7)Qm0d0.Dda";
            session_regenerate_id(true);
            $_SESSION['id_user'] = $userinfo['id_user'];
            $_SESSION['email_user'] = $userinfo['email_user'];
            $_SESSION['name_user'] = $userinfo['name_user'];
            $_SESSION['nom_user'] = $userinfo['nom_user'];
            $_SESSION['prenom_user'] = $userinfo['prenom_user'];
            $_SESSION['confirme'] = $userinfo['confirme'];
            $_SESSION['star_account'] = $userinfo['star_account'];
            $_SESSION['path_img'] = $userinfo['path_img'];
            $_SESSION['description'] = $userinfo['description'];
            $_SESSION['time'] = time();
            $_SESSION['ipaddress'] = getIp().$saltipadresse;
            if($userinfo['email_user'] == "admin@my-links.fans"){
                $_SESSION['token'] = uniqid()."".rand(10000,99999)."".date("dmYHis")."t"."1";
            }else{
                $_SESSION['token'] = uniqid()."".rand(10000,99999)."".date("dmYHis")."t"."0";
            }
            updatetoken($bdd, $userinfo['id_user'], $_SESSION['token']);
            http_response_code(200);
            return(200);
        } else {
            http_response_code(403);

            return(403);
        }
    } else {
        http_response_code(403);
        return(403);
    }
}

    //token
function updatetoken($bdd, $iduser, $token){
    $sql = "UPDATE user SET
        token=:token
        WHERE id_user = '".$iduser."'";
    $stmt= $bdd->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $resultat = $stmt->execute();
    var_dump($resultat);
    if($resultat == TRUE){
        echo '400';
    }else{
        echo '500';
    }
}
?>
