<?php
error_reporting(E_ALL);
session_start();

require_once('lib/defuse-crypto.phar');
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
    include("includes/ConnectionDB.php");
    include("includes/getId.php");
    include("includes/verifValid.php");
    include("includes/majSession.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace personnel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Espace personnel</div>
    </header>
    <p>Voici les mots de passe actuels:</p>

    <?php
    $select = $conn->prepare("select * from passwords where id=?");
    $select->execute(array($id));
    $users = $select->fetchAll();
    echo "<table><thead><th>site</th><th>identifiant</th><th>mot de passe</th></thead>";
    $n = 0;
    $specialCharacter = "~";
    foreach($users as $user){
        $user_key = Key::loadFromAsciiSafeString($_SESSION["user_key_encoded"]);
        $clearPwd = Crypto::decrypt($user["password"], $user_key);
        $clearPwd.= $specialCharacter; //pour pouvoir satisfaire les mots de passe de 50 carcactères
        $clearPwdCut = substr($clearPwd, 0, strpos($clearPwd, $specialCharacter));
        $n++;
        echo "
        <tr>
        <td id=site$n>".$user["site"]."</td>
        <td id=id$n>".$user["identifiant"]."</td>
        <td id=pwd$n style='-webkit-text-security: disc'>$clearPwdCut</td>
        <td><button onclick=N_Aff($n) id=aff$n>Afficher</button></td>
        <td><button onclick=copier($n)>Copier</button></td>
        <td><button onclick=modify($n)>Modifier</button></td>
        <form method=post action=ChangeMdpPost.php>
        <td><input type=text name=identifiant hidden id=newId$n></td>
        <td><input type=text name=site hidden id=newSite$n></td>
        <td><input type=password name=password placeholder='Nouveau mot de passe' required hidden id=newPwd$n></td>
        <td><input type=submit value=Valider hidden id=submit$n></td>
        </form>
        <td><button id=gene$n onclick=GeneMdp($n) hidden>générer un mot de passe fort</button></td>
        </tr>";
    }
    ?> 
    </table><br>
    <b>
        <a href=NewMdp.php>Ajouter des mots de passe</a><br>
        <a href=settingsGeneMdp.php id=params hidden>Paramètres de génération de mot de passe</a>
    </b>
    <p id=remerciement hidden>Texte copié !</p>
    </body>
    </html>
    <?php
}
?>

<script src="scripts/gestionMdp.js"></script>
<script src="scripts/affMdp.js"></script>

