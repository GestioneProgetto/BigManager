<?php

include_once 'core/index.php';

$marca = $_POST['marca'];
$prodotto = $_POST['prodotto'];
$peso = $_POST['peso'];
$prezzo = $_POST['prezzo'];
$IDSupermarket = $_POST['supermarketID'];
$category = $_POST['categoria'];
echo $marca . ' ' . $prodotto . ' ' . $peso . ' ' . $prezzo . ' ' . $category . '<br><br>';


