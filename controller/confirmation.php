<?php
//confirmation mail

if(isset($_GET['name_user'], $_GET['key']) && !empty($_GET['name_user']) && !empty($_GET['key'])) {
   $pseudo = urldecode(htmlspecialchars($_GET['name_user']));
   $key = htmlspecialchars($_GET['key']);
   $stmt = $bdd->prepare("SELECT * FROM user WHERE name_user = :pseudo AND confirmkey = :key");
   $stmt->execute([
       'pseudo' => $pseudo,
       'key' => $key,
   ]);
   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($user) {
       if ($user['confirme'] == 0) {
           $stmt = $bdd->prepare("UPDATE user SET confirme = 1 WHERE name_user = :pseudo AND confirmkey = :key");
           $stmt->execute([
               'pseudo' => $pseudo,
               'key' => $key,
           ]);
           echo "<p></p>";
           echo '<script>swal("Parfait!", "Votre compte a bien été confirmé ! Vous serez redirigé automatiquement dans 3 secondes", "success");</script>';
           header("refresh:3;url=index.php");
           exit;
       } else {
           echo "<p></p>";
           echo '<script>swal("Parfait!", "Votre compte a déjà été confirmé ! Vous serez redirigé automatiquement dans 3 secondes",  "success");</script>';
           header("refresh:3;url=index.php");
           exit;
       }
   }
}

echo "<p></p>";
echo '<script>swal("Oops!", "L\'utilisateur n\'existe pas ! Vous serez redirigé automatiquement dans 3 secondes !", "error");</script>';
header("refresh:3;url=index.php");
exit;

?>