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
    <title>Changement mot de passe maître</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Changement mot de passe maître</div>
    </header>

    <p>Veuillez indiquer votre nouveau mot de passe maître. Il doit contenir: </p>
    <?php include("includes/choixMdp.html"); ?>
    <form method="post" action="ChangeMasterMdpPost.php">
        <?php echo "
        <input type=text name=id value=$id hidden>;"?>
        <input type="password" name="mdp1" placeholder="Mot de passe" required>
        <input type="password" name="mdp2" placeholder="Réécrivez votre mot de passe" required>
        <input type="submit" value="Valider">
    </form>

    </body>
</html>
<?php
}