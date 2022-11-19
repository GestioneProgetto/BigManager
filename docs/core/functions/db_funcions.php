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

    for ($i = 0; $i < count($prodotti); $i++) {
        $sql = 'SELECT * FROM `prodotti` WHERE IDProdotto ="' . $prodotti[$i] . '"';
        $result = $GLOBALS['db']->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

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

                    </div>
                    <div class="carello">
                        <span class="prezzo text">
                            <?php

                            echo $prezzo[$i] . '€';
                            ?>
                            <div class="modifica">

                                <button class="btn btn-primary" name="change">
                                    MODIFICA
                                </button>
                                <form action="/core/functions/productRemover.php" method="post">
                                    <input type="text" name="productID" id="productID"
                                           value="<?php echo $row["IDProdotto"] ?>" hidden>
                                    <button class="btn btn-primary" name="delate">
                                        ELIMINA
                                    </button>
                                </form>
                            </div>
                    </div>
                </div>

                <?php
                if ($i!=0 && $i % 4 == 0) {
                    echo "</div> <div class='prodotti'>";
                }
            }
        } else {
            echo "0 results";
        }

    }
}

?>