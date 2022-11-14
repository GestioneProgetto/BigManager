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

    $i = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $prodotti[$i] = $row["IDProdotto"];
            $prezzo[$i] = $row["Prezzo"];
            $i = $i + 1;
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
                             src="<?php echo '/assets/images/user-upload/' . $row['IDProdotto'] . '.jpg' ?>"
                             alt="">
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
                                <button class="btn btn-primary" name="delate">
                                    ELIMINA
                                </button>
                            </div>
                    </div>
                </div>

                <?php
                if ($row["IDProdotto"] % 5 == 0) {
                    echo "</div> <div class='prodotti'>";
                }
            }
        } else {
            echo "0 results";
        }

    }
}

?>