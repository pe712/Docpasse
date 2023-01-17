<?php
error_reporting(E_ALL);
include("geneCode.php");

$insert = $conn->prepare("insert into mailing(type, code, id) values(?,?,?)");
$insert->execute(array(0, $code, $id));

ini_set( 'display_errors', 1 );
$from = "noreply@docpasse.fr";
$subject = "Activation de votre compte Docpasse";
$message = "
<html>
<head>
    <title>Activation de votre compte Docpasse</title>
</head>
<body>
    <p>Voici votre code d'activation : <br><b>"
    .$code.'</b><br>
    Veuillez suivre ce lien et entrer le code. <br>
    <b><a href="https://docpasse.000webhostapp.com/pageActivation.php">Activer mon compte</a></b></p>
</body>
</html>';
$headers = 'From: '.$from."\r\n".
            'Content-Type: text/html; charset="utf-8"';
mail($mail,$subject,$message, $headers);
