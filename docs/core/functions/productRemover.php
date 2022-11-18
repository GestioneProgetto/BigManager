<?php
include_once 'core/index.php';

$productID = $_POST['productID'];

$result = $db->query("DELETE FROM prodotti WHERE `prodotti`.`IDProdotto` = '$productID';");

header('Location: ' . $_SERVER['HTTP_REFERER']);
