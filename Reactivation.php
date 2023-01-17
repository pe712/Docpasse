<?php
error_reporting(E_ALL);
session_start();
include("includes/ConnectionDB.php");
include("includes/getId.php");
$select = $conn->prepare("select mail from login where id=?");
$select->execute(array($id));
$mail = $select->fetch()[0];
include("includes/mailActivation.php");
header("location:remerciements.php");