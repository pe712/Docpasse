<?php 
error_reporting(E_ALL);
session_start(); 
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nouveau compte</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
        <?php
        include("includes/navbar.php");
        ?>
        <div class="titre sub_title">S'inscrire</div>
    </header>
    <p>Il s'agit de votre identifiant et mot de passe maître. Il est conseillé de changer régulièrement ce mot de passe. 
        C'est lui qui garantit la sécurité du compte. Veuillez inclure dans le mot de passe:</p>
    <?php include("includes/choixMdp.html"); ?>
    
    <form method="post" action="NewMemberPost.php">
        <input type="text" name="mail" placeholder="mail" required>
        <input type="text" name="nom" placeholder="nom d'utilisateur" required>
        <input type="password" name="mdp1" placeholder="Mot de passe" required>
        <input type="password" name="mdp2" placeholder="Réécrivez votre mot de passe" required>
        <input type="submit" value="Valider">
    </form>
  
</body>
</html>