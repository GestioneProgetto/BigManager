<?php

include "index.php";

if (isset($_GET['ID'])) {
    if ($_GET['ID'] != NULL && $_GET['USERNAME'] != NULL &&$_GET['QUANTITA'] != NULL) {
        aggiungialcarrello($GLOBALS['conn']);
    }
}

header('Location: index.php');

?>
