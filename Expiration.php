<?php 
error_reporting(E_ALL);
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Expiration de la session</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Expiration de la session</div>
    </header>

    <p>Votre session a expiré. Veuillez vous reconnecter.</p>
    <b><a href="Connection.php">Me connecter</a></b></p><br>
    <p>Pour information, afin de garantir votre sécurité les sessions expirent: 
        <ul>
            <li>Au bout de 5 minutes d'inactivité</li>
            <li>Au bout de 15 minutes dans tous les cas</li>
        </ul>
    </p>

</body>
</html>