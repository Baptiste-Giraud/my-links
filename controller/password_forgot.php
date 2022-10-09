<?php
        if(isset($_GET['code'],$_GET['mail'])){
            $Code=htmlentities($_GET['code'],ENT_QUOTES,"UTF-8");
            $Mail=htmlentities($_GET['mail'],ENT_QUOTES,"UTF-8");
            if(!$bdd) {
                echo "Erreur connexion BDD";
            } else {
                $requser = $bdd->prepare('SELECT * FROM recup_mdp WHERE code = ? AND mail = ?');
                $requser->execute(array($Code, $Mail));
                $userexist = $requser->rowCount();
                if($userexist==1){
                    //on génère un nouveau pass (de 5 caractères) et on lui envoi:
                    $NouveauPass=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"),0,5);
                    //on modifie son mot de passe pour son compte
                    $data = [
                        'mdp_user' => sha1($NouveauPass),
                    ];
                    $Mail = strtolower($Mail);
                    $sql = "UPDATE user SET mdp_user=:mdp_user WHERE email_user='".$Mail."'";
                    $stmt= $bdd->prepare($sql);
                    $stmt->execute($data);
                    //on ui envoi un mail avec son pass temporaire:
                    mail($Mail,"Votre nouveau mot de passe","Le nouveau mot de passe pour votre compte est: $NouveauPass (Il est vivement conseille de le modifier depuis votre espace membre)");
                    //on supprime la demande mot de passe qui est dans la table "recup_mdp":
                    $req = $bdd->prepare("DELETE FROM recup_mdp WHERE code = :code AND mail =:mail'");
                    $req->bindParam(':code', $Code);
                    $req->bindParam(':mail', $Mail);
                    $req->execute();
                    echo '<script>swal("Parfait!", "Votre nouveau mot de passe temporaire vient d\'être envoyé par mail.", "success");</script>';
                } else {
                    echo '<script>swal("Oops!", "Lien incorrect. !", "error");</script>';
                }
            }
        } else {
            //si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
            if(isset($_POST['valider'])){
                //vérifie si le champ mail est bien rempli:
                if(empty($_POST['mail'])){
                    echo '<script>swal("Oops!", "Le champs mail n\'est pas renseigné.!", "error");</script>';

                } else {
                    //tous les champs sont précisés, on regarde si le membre est inscrit dans la bdd:
                    //d'abord il faut créer une connexion à la base de données dans laquelle on souhaite regarder:
                    if(!$bdd) {
                        echo '<script>swal("Oops!", "Erreur #2 !", "error");</script>';
                        //Dans ce script, je pars du principe que les erreurs ne sont pas affichées sur le site, vous pouvez donc voir qu'elle erreur est survenue avec mysqli_error(), pour cela décommentez la ligne suivante:
                        
                        //echo "<br>Erreur retournée: ".mysqli_error($mysqli);
                        
                    } else {
                        //on défini nos variables:
                        $Mail=htmlentities($_POST['mail'],ENT_QUOTES,"UTF-8");//htmlentities avec ENT_QUOTES permet de sécuriser la requête pour éviter les injections SQL, UTF-8 pour dire de convertir en ce format
                        $requser = $bdd->prepare('SELECT * FROM user WHERE email_user = ?');
                        $requser->execute(array($Mail));
                        $userexist = $requser->rowCount();
                        //on regarde si le membre est inscrit dans la bdd:
                        //même si le membre n'existe pas, on affiche qu'un mail à été envoyé, ceci permet d'empécher les robots de voir si un mail existe ou pas dans votre base de données et de vous le dérober
                        if($userexist==0){
                            //mail inconnu
                        } else {
                            //mail connu, on lance la procédure d'envoi du mail pour recevoir un nouveau mdp_user
                            $Code=md5(rand(1,99999999));
                            $insert = $bdd->prepare("INSERT INTO recup_mdp VALUES (NULL, :code ,:mail)");
                            $insert->bindValue(':code', $Code);
                            $insert->bindValue(':mail', $Mail);
                            $insert->execute();
                            $my_from='support@my-links.fans';
                            $header="MIME-Version: 1.0\r\n";
                            $header .= 'From: '.$my_from.'' . "\r\n" .
                            $header.='Content-Type:text/html; charset="uft-8"'."\n";
                            $header.='Content-Transfer-Encoding: 8bit';
                            $Lien=$_SERVER['HTTP_HOST']."/passwforgot.php?code=$Code&mail=$Mail";
                            mail($Mail,"Recuperation du mot de passe","Pour recevoir un nouveau mot de passe cliquez sur le lien suivant:
                            <a href='$Lien' role=\"button\">Recuperation du mot de passe :)</a>", $header);
                            echo '<script>swal("Parfait!", "Votre nouveau mot de passe temporaire vient d\'être envoyé par mail.", "success");</script>';
                        }
                    }
                }
            }
            if(!isset($TraitementFini)){//quand le membre sera connecté, on définira cette variable afin de cacher le formulaire
                ?>
                <div role="main" class="main">
                    <div class="container py-5">
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-6 col-lg-5 mt-5 mb-lg-0">
                                <h2 class="font-weight-bold text-5 mb-0">Mot de passe oubliè ?</h2>
				<p>
					Saisissez l'adresse mail associée à votre compte My-Links.<br>
					Nous allons envoyer à cette adresse un lien vous permettant de réinitialiser facilement votre mot de passe.
				</p>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="text-color-dark text-3">E-mail <span class="text-color-danger">*</span></label>
                                            <form method="post" action="passwforgot.php">
                                                <input type="text" name="mail" placeholder="Veuillez saisir votre adresse mail" class="form-control form-control-lg text-4" required="required"><br>
                                                <input type="submit" name="valider" value="Valider" class="btn btn-dark btn-modern btn-block text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading..." required="required">
                                            </form>
                                        </div>
                                    </div>
                                        <div class="form-group col">
                                            <p class="text-3 mb-2" style="text-align: center;"> 
						<a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="login.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Retour à la connexion</a>
					    </p>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>