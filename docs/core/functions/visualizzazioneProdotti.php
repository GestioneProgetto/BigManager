<?php

include_once 'core/index.php';



function ricerca(){
    if(isset($_POST['ricerca'])){
        $sql = 'SELECT * FROM `prodotti` where Nome like "%'.$_POST['ricerca'].'%";';
        visualizzazione($sql);
    }
}

function richiestaElementi(){
    if(isset( $_GET['categoria'])){
        $sql = "SELECT * FROM `prodotti` where ID_Categoria ='" . $_GET['categoria'] . "'";
        visualizzazione($sql);
    }
}

function visualizzazione($sql)
{
    $result = $GLOBALS['db']->query($sql);
    $i = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $i++;
?>


            <div class="card">
                <div class="img">
                    <img class="img_card" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['product_image']); ?>" />
                </div>
                <div class="descrizione">
                    <span class="brand text"><?php echo $row["Marca"] ?></span> <br>
                    <span class="name text"><?php echo $row["Nome"] ?></span><br>
                    <span class="descr text"><?php echo $row["Peso"] . 'g' ?></span><br>

                </div>
                <div class="carello">
                    <input type="number" name="quantità" class="quantita" min="1" max="10" value="1">
                    </span>
                    <img name="carrello" id="<?php echo $row['IDProdotto'] ?>" class="img_carrello img" src="http://spesaduezero.michelesottocasa.tech/assets/images/system/foto_carrello.png">
                </div>
            </div>

<?php
            if ($i % 5 == 0) {
                echo "</div> <div class='prodotti'>";
            }
        }
    } else {
        echo "NESSUN PRODOTTO TROVATO";
    }
}

?>