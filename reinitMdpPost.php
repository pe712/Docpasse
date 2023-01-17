<?php
error_reporting(E_ALL);
session_start();
extract($_POST);

include("includes/ConnectionDB.php");
$select = $conn->prepare("select id from login where mail=?");
$select->execute(array($mail));
$n = $select->rowCount();
if ($n==1){
    $id = $select->fetch()[0];

    // code de réinitialisation:
    include("includes/geneCode.php");

    $insert = $conn->prepare("insert into mailing(type, code, id) values(?,?,?)");
    $insert->execute(array(1, $code, $id));
    
    $subject = "Réinitialisation du mot de passe maître Docpasse";
    $message = "
    <html>
    <head>
        <title>Réinitialisation du mot de passe maître Docpasse</title>
    </head>
    <body>
        <p>Voici votre code de réinitialisation : <br>
        <b>$code</b><br>
        Veuillez suivre ce lien et entrer le code. <br>
        
        <b><a href=https://docpasse.000webhostapp.com/pageReinit.php>Entrer mon code pour changer mon mot de passe</a></b><br>
        Le code est valable 24h.</p>
    </body>
    </html>";
}
else{
    $subject = "Demande Docpasse";
    $message="
    <html>
    <head>
        <title>Demande de réinitialisation du mot de passe maître Docpasse</title>
    </head>
    <body>
        <p>
        Bonjour,<br>
        Vous avez demandé de réinitialiser votre mot de passe maître Docpasse. Malheureusement, vous n'avez pas encore de compte chez Docpasse.<br>
        Vous pouvez dès maintenant <b><a href=https://docpasse.000webhostapp.com/NewMember.php>créer un compte</a></b>. C'est facile et gratuit.
        </p>
    </body>
    </html>";
}

ini_set( 'display_errors', 1 );
$from = "noreply@docpasse.fr";
$headers = 'From: '.$from."\r\n".
            'Content-Type: text/html; charset="utf-8"';
mail($mail,$subject,$message, $headers);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
        <?php
        include("includes/navbar.php");
        ?>
        <div class="titre sub_title">Réinitialisation</div>
    </header>
    <p>Un mail vient de vous être envoyé. 
    <b><a href="pageReinit.php">Se rendre sur le page pour entrer mon code</a></b></p>
</body>
</html>
