<?php
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation mot de passe</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Page de réinitialisation</div>
    </header>

    <p>Entrez votre mail. Un mail vous sera envoyé pour réinitialiser le mot de passe.</p>
    <form method="post" action="reinitMdpPost.php">
        <input type="text" name="mail" placeholder="mail" required>
        <input type="submit" value="Valider">
    </form>
</body>
</html>