<?php
include_once 'core/index.php';

$productID = $_POST['productID'];
$supermarketID = $_POST['supermarketID'];

$result = $db->query("DELETE FROM `prezzi-per-supermercato` WHERE `IDProdotto` = '$productID' AND `IDSupermercato` = '$supermarketID'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
