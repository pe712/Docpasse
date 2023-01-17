<?php
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compte à activer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Félicitations</div>
    </header>

    <p>Un mail vous a été envoyé avec un lien pour activer votre compte. C'est la dernière étape avant de pouvoir profiter du service !</p>
    <b><a href="pageActivation.php">Entrer mon code d'activation</a><br>
    <a href="index.php">Retourner sur la page d'acceuil</a></b>

</body>
</html>