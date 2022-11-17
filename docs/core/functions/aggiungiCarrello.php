<?php

include_once "visualizzazioneProdotti.php";

if (isset($_GET['ID'])) {
    if ($_GET['ID'] != NULL && $_GET['USERNAME'] != NULL && $_GET['QUANTITA'] != NULL) {
       echo $_GET['ID'] ." ".$_GET['USERNAME'] ." ".$_GET['QUANTITA'];
       aggiungialcarrello();
    }
}


?>
