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
                        <input type="number" name="carrelloquantita" value="<?php echo $row["quantita"]?>" min="1" max="10">
                        
                        <button>elimina</button>
                    </div>
<?php
                }
            }
        }
    }
}

function calcolototali(){

}

?>

<div class="cardprezzi">
                        <div class="nomesupermercato"> carrefour</div>
                        <div class="prezzosupermercato"> 150.00€</div>
</div>