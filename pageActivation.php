<?php 
error_reporting(E_ALL);
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Code d'activation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
        <?php
        include("includes/navbar.php");
        ?>
        <div class="titre sub_title">Code d'activation</div>
        <form method="post" action="gestionMailing.php">
            <input type="text" name="code" placeholder="code" required>
            <input type="text" name="type" value=0 hidden>
            <input type="submit" value="Valider">
        </form>
    </header>
</body>
</html>

