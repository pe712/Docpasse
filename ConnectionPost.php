<?php
error_reporting(E_ALL);
session_start();

require_once('lib/defuse-crypto.phar');
use Defuse\Crypto\KeyProtectedByPassword;

extract($_POST);
include("includes/ConnectionDB.php");
$select = $conn->prepare("select * from login where mail=?");
$select->execute(array($mail));
$n = $select->rowCount();

if ($n==0){
    //Il n'y a pas de mail comme celui-ci dans la BDD
    header("location:erreurConn.php");
}
elseif ($n>1){
    echo "Erreur côté serveur contacter l'admin";
}
else{
    $user = $select->fetch();
    if (password_verify($mdp, $user["hash"])){

        $protected_key_encoded = // ... load it from the user's account record
        $protected_key = KeyProtectedByPassword::loadFromAsciiSafeString($user["protected_key_encoded"]);
        $user_key = $protected_key->unlockKey($mdp);
        $user_key_encoded = $user_key->saveToAsciiSafeString();

        session_regenerate_id(true);
        $_SESSION["nom"]=$user["nom"];
        $_SESSION["user_key_encoded"]=$user_key_encoded;

        $select = $conn->prepare("select * from sessions where Sid=?");
        $select->execute(array(session_id()));
        if ($select->rowCount()==0){
            //nouvelle session pour la database
            $insert = $conn->prepare("insert into sessions (Sid, id) values (?,?)");
            $insert->execute(array(session_id(), $user["id"]));
        }
        else{
            $update = $conn->prepare("update sessions set lastConn=CURRENT_TIMESTAMP where Sid=?");
            $update->execute(array(session_id()));
        }
        header("location:index.php");
    }
    else{
        header("location:erreurConn.php");
    }

}
?>
