<?php

function richiestaElementi($conn)
{
    $sql = "SELECT * FROM prodotti";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
?>


            <div class="card">
                <div class="img"><img class="img" src="https://www.carrefour.it/on/demandware.static/-/Sites-carrefour-master-catalog-IT/default/dwb19da38e/large/GOCCIOLEALCIOCCOLATOPAVESI-8013355999143-5.png" alt=""></div>
                <div class="descrizione">
                    <span class="brand text"><?php echo $row["Marca"] ?></span> <br>
                    <span class="name text"><?php echo $row["Nome"] ?></span><br>
                    <span class="descr text"><?php echo $row["Peso"] . 'g' ?></span><br>

                </div>
                <div class="carello">
                    <input type="number" name="quantità" class="quantita" min="1" max="10" value="1">
                    <span class="prezzo text">
                        <?php
                        $sql2 = "SELECT * FROM `prezzi-per-supermercato` WHERE IDProdotto =" .  $row["IDProdotto"];
                        $result2 = $conn->query($sql2);
                        $i=0;
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                $array[$i]=$row2['Prezzo'];
                                $i+1;
                            }
                        }
                        $prezzo=0;
                        for($i=0;$i<count($array);$i++){
                            if($i==0){
                                $prezzo= $array[$i];
                            }else if($prezzo<$array[$i]){
                                $prezzo= $array[$i];
                            }
                        }
                        echo $prezzo.'€';
                        ?>

                    </span> <img name="carrello" id="<?php echo $row['IDProdotto']?>" class="img_carrello img" src="foto_carrello.png">
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



function aggiungialcarrello($conn){
   
    $id= $_GET['ID'];
    $username=$_GET['USERNAME'];
    $quantita=$_GET['QUANTITA'];

    $sql = "INSERT INTO `carrello` (`UserName`, `IDProdotto`, `quantita`) VALUES ($username, $id, $quantita)";
    $conn->query($sql); 
}
?>
