<?php 
error_reporting(E_ALL);
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Erreur</div>
    </header>
    <p>Informations de connection incorrectes.</p>
    <p><b>
    <a href="reinitMdp.php">Réinitialiser le mot de passe</a><br>
    <a href="Connection.php">Réessayer</a>
    </b></p>
</body>
</html>
