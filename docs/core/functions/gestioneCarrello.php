<?php
include_once 'core/index.php';

function richiestacarrello()
{
    $sql = 'SELECT * FROM `carrello` WHERE UserName ="' . $_SESSION['username'] . '";';
    $result = $GLOBALS['db']->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sql1 = 'SELECT * FROM `prodotti` WHERE IDProdotto ="' . $row["IDProdotto"] . '";';
            $result1 = $GLOBALS['db']->query($sql1);

            if ($result1->num_rows > 0) {
                while ($row1 = $result1->fetch_assoc()) {
?>
                    <div class="cardcarrello">
                        <div class="imgcarrello"><img class="carrelloimg" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['product_image']); ?>">
                        </div>

                        <div class="info">
                            <div class="carrellomarca"><?php echo $row1["Marca"] ?></div>
                            <div class="carrelloprodotto"><?php echo $row1["Nome"] ?></div>
                            <div class="carrellopeso"><?php echo $row1["Peso"] . 'g' ?></div>
                        </div>
                        <input type="text" readonly name="carrelloquantita" value="<?php echo "N° " . $row["quantita"] ?>" style=" width: 50px; border: transparent;">

                        <form action="/core/functions/eliminaDaCarrello.php" method="post">
                            <input type="text" name="productID" value="<?php echo $row["IDProdotto"] ?>" hidden>
                            <button class="button">
                                -
                            </button>
                        </form>
                        <form action="/core/functions/aggiungiDaCarrello.php" method="post">
                            <input type="text" name="productPlus" value="<?php echo $row["IDProdotto"] ?>" hidden>
                            <button class="button">
                                +
                            </button>
                        </form>
                    </div>
        <?php
                }
            }
        }
    }
}

function calcolototali()
{
    $supermercati[0] = 0;
    $totali[] = 0;
    $sql = 'SELECT * FROM `supermercati`';
    $result = $GLOBALS['db']->query($sql);
    $i = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $supermercati[$i] = $row['IDSupermercato'];
            $totali[$i] = 0;
            $i++;
        }
    }

    $prodotti[0] = 0;
    $quantita[0] = 0;
    $i = 0;
    $sql = 'SELECT * FROM `carrello` WHERE UserName ="' . $_SESSION['username'] . '";';
    $result = $GLOBALS['db']->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $prodotti[$i] = $row['IDProdotto'];
            $quantita[$i] = $row['quantita'];
            $i++;
        }
    }

    for ($j = 0; $j < count($prodotti); $j++) {
        for ($i = 0; $i < count($supermercati); $i++) {
            $sql = 'SELECT * FROM `prezzi-per-supermercato` WHERE IDProdotto ="' . $prodotti[$j]  . '"AND IDSupermercato="' . $supermercati[$i] . '" ;';
            $result = $GLOBALS['db']->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $totali[$i] = $totali[$i] + $row['Prezzo'] * $quantita[$j];
                }
            }
        }
    }

    do
    {
            $scambiato = false;
            for( $i = 0, $c = count( $totali ) - 1; $i < $c; $i++ )
            {
                if( $totali[$i] > $totali[$i + 1] )
        {
                    $temp = $totali[$i + 1];
                    $totali[$i + 1] = $totali[$i];
                    $totali[$i] = $temp;

                    $temp1 = $supermercati[$i + 1];
                    $supermercati[$i + 1] = $supermercati[$i];
                    $supermercati[$i] = $temp1;
                    $scambiato = true;
        }
            }
    }
    while($scambiato);

    $nome = "";
    for ($i = 0; $i < count($supermercati); $i++) {
        $sql = 'SELECT * FROM `supermercati` WHERE IDSupermercato="' . $supermercati[$i] . '" ;';
        $result = $GLOBALS['db']->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nome = $row['Nome'];
            }
        }
        ?>
        <div class="cardprezzi">
            <div class="nomesupermercato"> <?php echo $nome ?></div>
            <div class="prezzosupermercato"> <?php echo $totali[$i] . "€" ?></div>
        </div>
<?php
    }
}

?>