<?php 
error_reporting(E_ALL);
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
        <?php
        include("includes/navbar.php");


extract($_POST);
include("includes/ConnectionDB.php");
$select = $conn->prepare("select Mid, id, UNIX_TIMESTAMP(creationTime) from mailing where code=? and type=?");
$select->execute(array($code, $type));
if ($select->rowCount()==0){
    ?>
        <div class="titre sub_title">Erreur</div>
    </header>
    <p>Ce code n'est pas valide. <b><a href="pageReinit.php">Réessayer</a></b></p>
    <?php
    /*_________________________________
    prévoir une gestion contre la force brute*/
}

else{
    $row = $select->fetch();
    $creationTime = array_pop($row);
    extract($row);
    $diffH = abs(time()-$creationTime)/3600;
    if ($type==1 && $diffH>24){
        ?>
        <div class="titre sub_title">Erreur</div>
        </header>
        <p>Le lien de réinitialisation n'est plus valide. Il a expiré. Veuillez redemander une réinitialisation</p>
        <?php
    }
    else{
        ?>
        <div class="titre sub_title">Félicitations</div>
        </header>
        <?php
        if ($type==0){
            $update = $conn->prepare("update login set valid=1 where id=?");
            $update->execute(array($id));
            $delete = $conn->prepare("delete from mailing where id=? and type=0");
            $delete->execute(array($id));
            ?>
            <p>Votre compte est désormais activé et vous pouvez profiter de votre espace personnel pour stocker les mots de passes.
            <b><a href="index.php">Retourner à la page d'acceuil</a></b></p>
            <?php
        }
        else{
            ?>
            <p>La réinitialisation a réussi. Veuillez indiquer votre nouveau mot de passe maître. Il doit contenir: </p>
            <?php include("includes/choixMdp.html"); ?>
            <form method="post" action="ChangeMasterMdpPost.php">
                <?php
                echo '
                <input type="text" name="id" value='.$id.' hidden>
                <input type="text" name="Mid" value='.$Mid.' hidden>';?>
                <input type="password" name="mdp1" placeholder="Mot de passe" required>
                <input type="password" name="mdp2" placeholder="Réécrivez votre mot de passe" required>
                <input type="submit" value="Valider">
            </form>
            <?php
        }
        
    }
}
?>
</body>
</html>

