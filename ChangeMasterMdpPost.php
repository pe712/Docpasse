<?php
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
extract($_POST);
include("includes/verifMdp.php");
include("includes/ConnectionDB.php");
include("includes/majSession.php");
?>

<!DOCTYPE html>
        <html lang="fr">
            <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
            </head>
        <body>
        <header>
            <?php
            include("includes/navbar.php");

if(!$corr){
        ?>
            <div class="titre sub_title">Erreur</div>
        </header>
        <?php echo $msg.'<a href="pageReinit.php">Réessayer</a>'; 
}
else{
    $options = ["cost"=>12,];
    $hash = password_hash($mdp1, PASSWORD_BCRYPT, $options);
    
    $update = $conn -> prepare("update login set hash=? where id=?");
    $update -> execute(array($hash, $id));
    if (isset($Mid)){
        $delete = $conn->prepare("delete from mailing where id=? and type=1");
        $delete->execute(array($id));
    }
    ?>
    <div class="titre sub_title">Félicitations</div>
        </header>
        <p>Votre mot de passe a été changé. <b><a href="index.php">Retourner à la page d'acceuil</a></b></p>
<?php
}
?>
<body>
</html>
<?php 
} 
?>