<?php
include("../includes/ConnectionDB.php");
$conn -> query("delete from mailing where (abs(UNIX_TIMESTAMP(creationTime)-UNIX_TIMESTAMP(CURRENT_TIMESTAMP))>24*3600) and type=1");
$conn -> query("delete from sessions where (abs(UNIX_TIMESTAMP(lastConn)-UNIX_TIMESTAMP(CURRENT_TIMESTAMP))>24*3600*30)");

