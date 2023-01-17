<?php
error_reporting(E_ALL);
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Activation du compte</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Activation du compte</div>
    </header>

    <p>Il est nécessaire d'activer votre compte pour pouvoir utiliser ce service. C'est un gage de sécurité pour nous permettre de réinitialiser votre mot de passe maître</p>
    <p><b>
        <a href="pageActivation.php">Entrer mon code d'activation</a><br>
        <a href="Reactivation.php">Renvoyer un code d'activation</a>
    </b></p>

</body>
</html>