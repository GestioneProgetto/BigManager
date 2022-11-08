<?php

$db_servername = "spesaduezero.michelesottocasa.tech";
$db_username = "spesa2.0";
$db_password = "Spesa2.0";
$db_table = "spesa2.0";

// Create connection
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_table);
// Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function richiestaElementi()
{
    $sql = "SELECT * FROM prodotti";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
?>


            <div class="card">
                <div class="img"><img class="img_card" src="<?php echo 'http://spesaduezero.michelesottocasa.tech/images/'.$row['IDProdotto'].'.jpg' ?>" alt=""></div>
                <div class="descrizione">
                    <span class="brand text"><?php echo $row["Marca"] ?></span> <br>
                    <span class="name text"><?php echo $row["Nome"] ?></span><br>
                    <span class="descr text"><?php echo $row["Peso"] . 'g' ?></span><br>

                </div>
                <div class="carello">
                    <input type="number" name="quantità" class="quantita" min="1" max="10" value="1">
                    <!-- <span class="prezzo text">
                        <?php
                        /*$sql2 = "SELECT * FROM `prezzi-per-supermercato` WHERE IDProdotto =" .  $row["IDProdotto"];
                        $result2 = $GLOBALS['conn']->query($sql2);
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
                        echo $prezzo.'€';*/
                    ?>

                    </span> -->
                     <img name="carrello" id="<?php echo $row['IDProdotto']?>" class="img_carrello img" src="foto_carrello.png">
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



function aggiungialcarrello(){
   
    $id= $_GET['ID'];
    $username=$_GET['USERNAME'];
    $quantita=$_GET['QUANTITA'];



    $sql = "INSERT INTO `carrello` (`IDCarrello`, `UserName`, `IDProdotto`, `quantita`) VALUES (NULL, '".$username."', '".$id."', '".$quantita."');";
    $GLOBALS['conn']->query($sql); 
}  
?>
