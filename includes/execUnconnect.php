<?php
error_reporting(E_ALL);
if (!isset($_SESSION)){
    session_start();
}
session_unset();
session_destroy();
?>