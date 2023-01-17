<?php
error_reporting(E_ALL);
$Sid = session_id();

$select = $conn->prepare("select UNIX_TIMESTAMP(lastConn), UNIX_TIMESTAMP(creationTime) from sessions where Sid=?");
$select->execute(array($Sid));
if ($select->rowCount()!=0){
    //Cette session est connue, il y a eu au moins une connexion et l'utiliseur est connecté (ce point est vérifié sur la page principale)
    $row = $select->fetch();
    $timeStampConn = $row[0];
    $timeStampCreation = $row[1];

    $diffMinConn = abs(time()-$timeStampConn)/60;
    $diffMinCreation = abs(time()-$timeStampCreation)/60;
    if ($diffMinConn>5 || $diffMinCreation>15){
        //si plus de 5 minutes
        include("execUnconnect.php");
        header("location:Expiration.php");
    }
    else{
        $update = $conn->prepare("update sessions set lastConn=CURRENT_TIMESTAMP where Sid=?");
        $update->execute(array($Sid));
    }
}
