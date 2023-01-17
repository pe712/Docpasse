<?php
error_reporting(E_ALL);
$select = $conn->prepare("select id from sessions where Sid=?");
$select->execute(array(session_id()));
if ($select->rowCount()==0){
    echo "Erreur côté serveur contacter l'admin";
}
else{
    $row = $select->fetch();
    $id = $row["id"];
}
