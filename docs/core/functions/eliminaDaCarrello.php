<?php
include_once 'core/index.php';

$id = $_POST['productID'];

$quantita = 0;
$idcarrello = 0;
$sql = 'SELECT * FROM `carrello` where UserName="' . $_SESSION['username'] . '" and IDProdotto="' . $id . '";';
$result = $GLOBALS['db']->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $quantita = $row['quantita'];
        $idcarrello = $row['ID'];
    }
}
if ($quantita - 1 == 0) {
    $sql = 'DELETE FROM `carrello` WHERE `carrello`.`ID` = "' . $idcarrello . '";';
    $GLOBALS['db']->query($sql);
} else {
    echo "sono qui";
    $quantita--;
    $sql = 'UPDATE `carrello` SET `quantita` = "' . $quantita . '" WHERE `carrello`.`ID` = "' .  $idcarrello . '";';
    $GLOBALS['db']->query($sql);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
