<?php
include_once("core/functions/connectToDB.php");
include_once("core/functions/supermarketManager.php");
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /login');
}

