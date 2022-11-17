<?php

include_once 'core/index.php';

if (isset($_GET['ID'])) {
    if ($_GET['ID'] != NULL && $_GET['USERNAME'] != NULL && $_GET['QUANTITA'] != NULL) {
        
        $sql = "INSERT INTO `carrello` ( `UserName`, `IDProdotto`, `quantita`) VALUES ( '".$_GET['USERNAME']."', '".$_GET['ID']."', '".$_GET['QUANTITA']."');";
       $GLOBALS['db']->query($sql); 
        
    }
}
    
header("Location: http://spesaduezero.michelesottocasa.tech/dashboard");



?>
