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

if (isset($_SESSION["nom"])){
        ?>
        <div class="titre sub_title">Erreur</div>
        </header>
        <p>Vous êtes déjà connecté</p>
        <?php
}
else{
    ?>
    <div class="titre sub_title">Formulaire de connexion</div>
    </header>
    <form method="post" action="ConnectionPost.php">
        <input type="text" name="mail" placeholder="mail" required>
        <input type="password" name="mdp" placeholder="Mot de passe" required>
        <input type="submit" value="Valider">
    </form><br>
    <b><a href="reinitMdp.php">Mot de passe oublié?</a></b>
    <?php
}
?>
</body>
</html>