<?php 

function add_form_newsletter(){
    echo '<form method="post" action="function.php">
    <input type="email" name="email">
    <input type="submit" value="click" name="submit">
</form>';
}

function add_newsletter($bdd, $iduser, $mail){
    $insert = $bdd->prepare("INSERT INTO newsletter (id_user, mail) VALUES (:id_user, :mail)");
    $insert->bindParam(':id_user', $iduser, PDO::PARAM_INT);
    $insert->bindParam(':mail', $mail, PDO::PARAM_STR);
    $result = $insert->execute();

    if($result === true){
        echo '400';
    }else{
        echo '500';
    }
}

function delete_newsletter($bdd, $id){
    $id_user = $_SESSION['id_user'];
    $delete = $bdd->prepare("DELETE FROM newsletter WHERE id = :id AND id_user = :id_user");
    $delete->bindParam(':id', $id, PDO::PARAM_INT);
    $delete->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $result = $delete->execute();
    
    if($result === true ){
        echo '400';
    }else{
        echo '500';
    }
}
