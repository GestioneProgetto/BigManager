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

                    <tr>
                        <td class="a">
                            <div class="imgcarrello"><img class="carrelloimg" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['product_image']); ?>">
                            </div>
                        </td>
                        <td class="b">
                            <div class="info">
                                <div class="carrellomarca"><?php echo $row1["Marca"] ?></div>
                                <div class="carrelloprodotto"><?php echo $row1["Nome"] ?></div>
                                <div class="carrellopeso"><?php echo $row1["Peso"] . 'g' ?></div>
                            </div>
                        </td>
                        <td class="c">
                            <input type="text" class="quantita" readonly name="carrelloquantita" value="<?php echo "N° " . $row["quantita"] ?>">
                        </td>
                        <td class="d">
                            <div class="piuemeno">
                                <form class="piu" action="/core/functions/eliminaDaCarrello.php" method="post">
                                    <input type="text" name="productID" value="<?php echo $row["IDProdotto"] ?>" hidden>
                                    <button class="button">
                                        -
                                    </button>
                                </form>
                                <form class="meno" action="/core/functions/aggiungiDaCarrello.php" method="post">
                                    <input type="text" name="productPlus" value="<?php echo $row["IDProdotto"] ?>" hidden>
                                    <button class="button">
                                        +
                                    </button>
                                </form>
                            </div>
                            <?php
                            $sql3 = 'SELECT * FROM `supermercati`';
                            $result3 = $GLOBALS['db']->query($sql3);
                            if ($result3->num_rows > 0) {
                                while ($row3 = $result3->fetch_assoc()) {
                                    $sql2 = 'SELECT * FROM `prezzi-per-supermercato` WHERE IDProdotto ="' . $row["IDProdotto"] . '" AND IDSupermercato="' . $row3['IDSupermercato'] . '";';
                                    $result2 = $GLOBALS['db']->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            if ($row2['Prezzo'] != 0) {
                            ?>
                                                <div class="<?php echo $row2['IDSupermercato']; ?> siprod" hidden><?php echo $row2['Prezzo'] . "€"; ?></div>
                                        <?php
                                            }
                                        }
                                    } else { ?>
                                        <div class="<?php echo $row3['IDSupermercato']; ?> noprod" hidden>prodotto non disponibile</div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>






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

    do {
        $scambiato = false;
        for ($i = 0, $c = count($totali) - 1; $i < $c; $i++) {
            if ($totali[$i] > $totali[$i + 1]) {
                $temp = $totali[$i + 1];
                $totali[$i + 1] = $totali[$i];
                $totali[$i] = $temp;

                $temp1 = $supermercati[$i + 1];
                $supermercati[$i + 1] = $supermercati[$i];
                $supermercati[$i] = $temp1;
                $scambiato = true;
            }
        }
    } while ($scambiato);

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
        <form class="formprezzi" method="post">
            <div class="cardprezzi" onmouseover="inPop(<?php echo $supermercati[$i] ?>)" onmouseout="outPop(<?php echo $supermercati[$i] ?>)">
                <div class="nomesupermercato" name="nomesupermercato"> <?php echo $nome ?></div>
                <div class="prezzosupermercato"><?php echo $totali[$i] . "€" ?></div>
                <div name="idsupermercato" hidden><?php echo $supermercati[$i] ?></div>
            </div>
        </form>
<?php
    }
}

?>

<script>
    function inPop(x) {
        prezzi = document.getElementsByClassName(x);
        for (let i = 0; i < prezzi.length; i++) {
            document.getElementsByClassName(x)[i].style.display = "block";
            document.getElementsByClassName("meno")[i].style.display = "none";
            document.getElementsByClassName("piu")[i].style.display = "none";
        }
    }

    function outPop(x) {
        prezzi = document.getElementsByClassName(x);
        for (let i = 0; i < prezzi.length; i++) {
            document.getElementsByClassName(x)[i].style.display = "none";
            document.getElementsByClassName("meno")[i].style.display = "block";
            document.getElementsByClassName("piu")[i].style.display = "block";
        }
    }
</script>