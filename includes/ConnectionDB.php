<?php
error_reporting(E_ALL);

include("includes/credentials.php");
try{
    $conn = new PDO("mysql:host=$host; dbname=$db", $us, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
}
catch(PDOException $except){
    die("Could not connect");
}