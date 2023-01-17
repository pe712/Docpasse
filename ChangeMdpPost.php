<?php
error_reporting(E_ALL);
session_start();
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

if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
    include("includes/ConnectionDB.php");
    include("includes/getId.php");
    extract($_POST);
    if(strlen($password)>50){
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

        $update = $conn->prepare("update passwords set password=? where identifiant=? and site=? and id=?");
        $update->execute(array($encrypted_pwd, $identifiant, $site, $id));
        header("location:EspacePerso.php");
    }
}