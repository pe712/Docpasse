<?php
error_reporting(E_ALL);
session_start();

$html1 = '
<!DOCTYPE html>
        <html lang="fr">
            <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
            </head>
        <body>
        <header>';
$html2 = '
            <div class="titre sub_title">Erreur</div>
        </header>';

require_once('lib/defuse-crypto.phar');
use Defuse\Crypto\KeyProtectedByPassword;

extract($_POST);
include("includes/verifMdp.php");
if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    echo $html1;
    include("includes/navbar.php");
    echo $html2;
    echo "Le mail n'est pas valide ".'<a href="NewMember.php">Réessayer</a>';
}
elseif(!$corr){
    echo $html1;
    include("includes/navbar.php");
    echo $html2;
    echo $msg.'<b><a href="NewMember.php">Réessayer</a></b>';
}
else {
    include("includes/ConnectionDB.php");
    $select = $conn->prepare('select * from login where mail=?');
    $select->execute(array($mail));
    if ($select->rowCount()>0){
        echo $html1;
        include("includes/navbar.php");
        echo $html2;
        echo 'Il y a déjà un compte associé à ce mail. <a href="index.php">'."Retourner à la page d'acceuil</a>";
    }
    else{
        $options = ["cost"=>14,];
        $hash = password_hash($mdp1, PASSWORD_BCRYPT, $options);

        $protected_key = KeyProtectedByPassword::createRandomPasswordProtectedKey($mdp1);
        $protected_key_encoded = $protected_key->saveToAsciiSafeString();

        $insert = $conn->prepare("insert into login (nom, hash, mail, protected_key_encoded) values (?,?,?,?)");
        $insert->execute(array($nom, $hash, $mail, $protected_key_encoded));

        $select = $conn->prepare('select id from login where nom=? and hash=? and mail=?');
        $select->execute(array($nom, $hash, $mail));
        $id = $select->fetch()[0];
        
        $insert = $conn->prepare("insert into settingsGeneMdp (id) values (?)");
        $insert->execute(array($id));

        include("includes/mailActivation.php");

        header("location:remerciements.php");
    }
}
?>




