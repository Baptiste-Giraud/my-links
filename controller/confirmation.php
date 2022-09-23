<?php
//confirmation mail

if(isset($_GET['name_user'], $_GET['key']) AND !empty($_GET['name_user']) AND !empty($_GET['key'])) {
   $pseudo = htmlspecialchars(urldecode($_GET['name_user']));
   $key = htmlspecialchars($_GET['key']);
   $requser = $bdd->prepare("SELECT * FROM user WHERE name_user = ? AND confirmkey = ?");
   $requser->execute(array($pseudo, $key));
   $userexist = $requser->rowCount();
   if($userexist == 1) {
      $user = $requser->fetch();
      if($user['confirme'] == 0) {
         $updateuser = $bdd->prepare("UPDATE user SET confirme = 1 WHERE name_user = ? AND confirmkey = ?");
         $updateuser->execute(array($pseudo,$key));
         echo "<p></p>";
         echo '<script>swal("Parfait!", "Votre compte a bien été confirmé ! Vous serez redirigé automatiquement dans 3 secondes", "success");</script>';
         header("refresh:3;url=index.php");
      } else {
         echo "<p></p>";
         echo '<script>swal("Parfait!", "Votre compte a déjà été confirmé ! Vous serez redirigé automatiquement dans 3 secondes",  "success");</script>';
         header("refresh:3;url=index.php");
      }
   } else {
      echo "<p></p>";
      echo '<script>swal("Oops!", "L\'utilisateur n\'existe pas ! Vous serez redirigé automatiquement dans 3 secondes !", "error");</script>';
      header("refresh:3;url=index.php");
   }
}
?>