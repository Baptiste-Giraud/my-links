<?php 


function add_form_newsletter(){
    echo '<form method="post" action="function.php">
    <input type="email" name="email">
    <input type="submit" value="click" name="submit">
</form>';
}


function add_newsletter($bdd, $iduser, $mail){
    $insert = $bdd->prepare("INSERT INTO newsletter VALUES (NULL, :id_user ,:mail)");
    $insert->bindValue(':id_user', $iduser);
    $insert->bindValue(':mail', $mail);
    $result = $insert->execute();

    if($result == TRUE){
        echo '400';
    }else{
        echo "500";
    }
        
}

function delete_newsletter($bdd, $id){
    $id_user = $_SESSION['id_user'];
    $result = $bdd->query("DELETE FROM newsletter WHERE id='".$id."' AND id_user = '".$id_user."'");
    if($result == TRUE ){
        echo '400';
    }else{
        echo '500';
    }
}