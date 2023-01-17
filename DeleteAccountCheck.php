<?php 
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression du compte</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Etes-vous sûrs?</div>
    </header>

    <p>Cette opération entrainera la suppression de votre compte et de toutes les données associées (identifiants et mots de passes enregistrés, mail...). Elle est irréversible. Pour pouvoir utiliser à nouveau nos services, il faudra recréer un compte. </p>
    <b><a href="DeleteAccount.php">Supprimer mon compte</a></b>
</body>
</html>
<?php
}
?>