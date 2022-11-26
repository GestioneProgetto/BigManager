<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style/carrello.css">
</head>

<body>
    <?php include "core/functions/gestioneCarrello.php" ?>

    <div id="sfondo" class="sfondo">
        <div id="popup">
            <i class="gg-close"></i>
            <a id="aref" href="/dashboard"></a>
            <div class="text title">CARRELLO</div>
            <div class="carrello" id="carrello">
                <div class="prodotti">
                    <table>
                    <?php richiestacarrello() ?>
                    </table>
                   
                </div>
                <div class="supermercati">
                    <?php calcolototali() ?>
                </div>
            </div>
        </div>
</body>

</html>