<?php 
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
include("includes/ConnectionDB.php");
include("includes/getId.php");
$delete = $conn->prepare("delete from mailing where id=?");
$delete->execute(array($id));
$delete = $conn->prepare("delete from login where id=?");
$delete->execute(array($id));
$delete = $conn->prepare("delete from passwords where id=?");
$delete->execute(array($id));
$delete = $conn->prepare("delete from sessions where id=?");
$delete->execute(array($id));
include("includes/execUnconnect.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compte supprimé</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Compte supprimé</div>
    </header>

    <p>Votre compte et ses données ont été supprimées avec succès.</p>

</body>
</html>
<?php
}
?>