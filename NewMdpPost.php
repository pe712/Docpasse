<?php
error_reporting(E_ALL);
session_start();
extract($_POST);
include("includes/ConnectionDB.php");
include("includes/getId.php");
include("includes/majSession.php");

require_once('lib/defuse-crypto.phar');
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

$html1 = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau mot de passe</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>';
$html2  = '
    <div class="titre sub_title">Erreur</div>
    </header>';
$html3 = '
</body>
</html>';

$specialCharacter = "~";

$select = $conn->prepare("select Pid from passwords where id=? and identifiant=? and site=?");
$select->execute(array($id, $identifiant, $site));
if ($select->rowCount()>0){
    echo $html1;
    include("includes/navbar.php");
    echo $html2;
    echo '<p>Il y a déjà un mot de passe enregistré pour cet identifiant sur ce site. <b><a href=EspacePerso.php>Retourner aux mots de passe</a></b></p>';
    echo $html3;
}
else if(strlen($password)>50){
    echo $html1;
    include("includes/navbar.php");
    echo $html2;
    echo 'Vous ne pouvez pas mettre de mot de passe de plus de 50 caractères. <b><a href=EspacePerso.php>Retourner aux mots de passe</a></b></p>';
    echo $html3;
}
else if (str_contains($password, $specialCharacter)){
    echo $html1;
    include("includes/navbar.php");
    echo $html2;
    echo '<p>Vous ne pouvez pas mettre le caractère ~ dans votre mot de passe. <b><a href=EspacePerso.php>Retourner aux mots de passe</a></b></p>';
    echo $html3;
}
else{
    $nb = 50 - strlen($password);
    for ($k=0; $k<$nb; $k++){
        $password.= $specialCharacter;
    }
    $user_key = Key::loadFromAsciiSafeString($_SESSION["user_key_encoded"]);
    $encrypted_pwd = Crypto::encrypt($password, $user_key);
    $insert = $conn->prepare("insert into passwords (id, identifiant, password, site) values (?,?,?,?)");
    $insert->execute(array($id, $identifiant, $encrypted_pwd, $site));
    header("location:EspacePerso.php");
}
?>