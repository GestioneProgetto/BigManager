<?php
include_once 'core/index.php';
// Check connection 
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
function richiesta($supermarketID)
{
    $sql = 'SELECT * FROM `prezzi-per-supermercato` WHERE IDSupermercato ="' . $supermarketID . '"';
    $result = $GLOBALS['db']->query($sql);

    $j = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $prodotti[$j] = $row["IDProdotto"];
            $prezzo[$j] = $row["Prezzo"];
            $j = $j + 1;
        }
    }
$j=0;
    for ($i = 0; $i < count($prodotti); $i++) {
        $sql = 'SELECT * FROM `prodotti` WHERE IDProdotto ="' . $prodotti[$i] . '"';
        $result = $GLOBALS['db']->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $j++;
                $GLOBALS['IDPrdotto'] = $row['IDProdotto'];

                ?>

                <div class="card">
                    <div class="img">
                        <img class="img_card"
                             src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['product_image']); ?>"/>
                    </div>
                    <div class="descrizione">
                        <span class="brand text"><?php echo $row["Marca"] ?></span> <br>
                        <span class="name text"><?php echo $row["Nome"] ?></span><br>
                        <span class="descr text"><?php echo $row["Peso"] . 'g' ?></span><br>
                        <span hidden><?php echo $row['IDProdotto'] ?></span>

                    </div>
                    <div class="carello">
                        <span class="prezzo text">
                            <?php

                            echo $prezzo[$i] . '€';
                            ?>
                            <div class="modifica">
                                <form action="" method="get">
                                    <input type="text" name="id" id="id"
                                           value="<?php echo $supermarketID ?>" hidden>
                                    <input type="text" name="productID" id="productID"
                                           value="<?php echo $row["IDProdotto"] ?>" hidden>
                                    <button class="btn btn-primary">
                                        MODIFICA
                                    </button>
                                </form>
                                <form action="/core/functions/productRemover.php" method="post">
                                    <input type="text" name="productID" id="productID"
                                           value="<?php echo $row["IDProdotto"] ?>" hidden>
                                    <input type="text" name="supermarketID" id="supermarketID"
                                           value="<?php echo $_GET['id'] ?>" hidden>
                                    <button class="btn btn-primary" name="delate">
                                        ELIMINA
                                    </button>
                                </form>
                            </div>
                    </div>
                </div>

                <?php
                if ( $j % 5 == 0) {
                    echo "</div> <div class='prodotti'>";
                }
            }
        } else {
            echo "NESSUN PRODOTTO TROVATO";
        }

    }
}

?>