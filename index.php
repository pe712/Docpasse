<?php 
error_reporting(E_ALL);
session_start(); 
if (isset($_SESSION["nom"])){
    include("includes/ConnectionDB.php");
    include("includes/majSession.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Docpasse</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
    <meta charset="UTF-8">
</head>
<body>
    <header>
        <?php
        include("includes/navbar.php");
        ?>

        <div class="titre">
            <div class="main_title">Bienvenue sur Docpasse</div>
            <div class="sub_title">Tous vos mots de passe à portée de main</div>
            <div class="trait"></div>
        </div>
    </header>

    <div style="text-align: center; font-size: 2em; padding-top: 20px" class="sub_title">
        <p>Un gestionnaire de mots de passe en trois mots</p>
    </div>

    <ul class="presentation">
        <li>
            <div class="petite_div"><img src="img/login.jfif" alt="aperçu du login"></div>
            <div class="grande_div">EFFICACE</div>
        </li>
        <li>
            <div class="petite_div">SÉCURISÉ</div>
            <div class="grande_div"><img src="img/cadenas.jfif" alt="cadenas"></div>
        </li>
        <li>
            <div class="petite_div"><img src="img/gratuit.jpg" alt="aperçu du login"></div>
            <div class="grande_div">GRATUIT</div>
        </li>
    </ul>

    <div class="bdp">
        <img src="img/mail.jfif" alt="logo mail">
        <p>Nous contacter:</p>
        <p>pe.baviere@gmail.com</p>
    </div>
</body>

</html>

