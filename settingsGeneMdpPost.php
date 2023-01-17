<?php
error_reporting(E_ALL);
session_start(); 
if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
include("includes/ConnectionDB.php");
include("includes/getId.php");
include("includes/majSession.php");
$delete = $conn->prepare("delete from settingsGeneMdp where id=?");
$delete->execute(array($id));

function conv($strName){
    return intval(isset($_POST[$strName]));
}

$insert = $conn->prepare("insert into settingsGeneMdp (id, nb, chiff, min, maj, a, b, c, d, e, f, g, h, AM) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$params = array($id, $_POST["nb"], conv("chiff"), conv("min"), conv("maj"));
for ($k = 0; $k <= 7; $k++){
    array_push($params, conv(strval($k)));
}
array_push($params, conv("AM"));
$insert->execute($params);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paramètres de génération de mot de passe</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Félicitations</div>
    </header>

    <p>Vos paramètres ont été enregistrés. <b><a href="EspacePerso.php">Aller à mon espace personnel</a></b></p>
   
</body>
</html>
<?php
}
?>


