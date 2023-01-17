<?php 
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
    include("includes/ConnectionDB.php");
    include("includes/getId.php");
    include("includes/verifValid.php");
    include("includes/majSession.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace personnel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
        <?php
        include("includes/navbar.php");
        ?>
        <div class="titre sub_title">Enregistrer un nouveau mot de passe</div>
    </header>
    <p>Veuillez renseigner les champs ci-dessous afin d'enregistrer un nouveau mot de passe.</p>
    <form method="post" action="NewMdpPost.php">
        <input type="text" name="identifiant" placeholder="identifiant" required>
        <input type="password" name="password" placeholder="mot de passe" id="newPwd" required>
        <input type="text" name="site" placeholder="site" required>
        <input type="submit" value="Valider">
    </form><br>
    <button onclick="GeneMdp(0)">Générer un mot de passe fort</button><br><br>
    <b><a href="settingsGeneMdp.php">Paramètres de génération de mot de passe</a></b>
    <p id=remerciement hidden>Texte copié !</p>
</body>
</html>
<script src="scripts/affMdp.js"></script>
<?php
}