<?php

include_once 'core/index.php';

if (isset($_GET['ID'])) {
    if ($_GET['ID'] != NULL && $_GET['USERNAME'] != NULL && $_GET['QUANTITA'] != NULL) {
        $conta=0;
        $sql1 = 'SELECT * FROM `carrello` WHERE UserName ="'.$_SESSION['username'].'"&&IDProdotto ="'.$_GET['ID'].'";';
        $result1 = $GLOBALS['db']->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $conta+=$row['quantita'];
            }
        }
        if($conta!=0){
            $conta+=$_GET['QUANTITA'];
            $sql='UPDATE `carrello` SET `quantita` = "'.$conta.'" WHERE `carrello`.`UserName` = "'.$_SESSION['username'].'" AND IDProdotto="'.$_GET['ID'].'";';
            $GLOBALS['db']->query($sql);
        }else{
            $sql = "INSERT INTO `carrello` ( `UserName`, `IDProdotto`, `quantita`) VALUES ( '" . $_GET['USERNAME'] . "', '" . $_GET['ID'] . "', '" . $_GET['QUANTITA'] . "');";
            $GLOBALS['db']->query($sql);
        }
    }
}

header("Location: http://spesaduezero.michelesottocasa.tech/dashboard");
