<?php
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
include("includes/ConnectionDB.php");
include("includes/getId.php");
include("includes/majSession.php");
$select = $conn->prepare("select mail, nom, valid, UNIX_TIMESTAMP(creationTime) from login where id=?");
$select->execute(array($id));
$row = $select->fetch();
$creationTime = array_pop($row);
date_default_timezone_set('Europe/Paris');
$creationTime = date ('d/m/Y H:i:s', $creationTime);
extract($row);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon compte</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Mon compte</div>
    </header>
    <p><b>Mes informations</b></p>
    <?php echo "
    <p>Nom d'utilisateur: ".$nom."</p>
    <p>Votre email: ".$mail."</p>
    <p>Compte crée le : ".$creationTime."</p>";
    if ($valid){
        echo "<p>Mon compte est activé</p>";
    }
    else{
        ?>
        <p>Mon compte n'est pas activé. 
        <b><a href="Activation.php">Activer mon compte</a></b></p>
        <?php
    }
    ?>
    <b><a href="settingsGeneMdp.php">Paramètres de génération de mot de passe</a></b><br>
    <b><a href="ChangeMasterMdp.php">Modifier mon mot de passe</a></b><br>
    <b><a href="DeleteAccountCheck.php">Supprimer mon compte et toutes les données associées</a></b>

</body>
</html>
<?php
}