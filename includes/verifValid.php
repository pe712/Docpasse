<?php
$select = $conn->prepare("select valid from login where id=?");
$select->execute(array($id));
$row = $select->fetch();
$valid = $row["valid"];
if (!$valid){
    header("location:Activation.php");
}