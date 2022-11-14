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

function richiesta()
{
    $sql = 'SELECT * FROM `prezzi-per-supermercato` WHERE IDSupermercato ="' . $GLOBALS['utente'] . '"';
    $result = $GLOBALS['conn']->query($sql);

    $i = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $prodotti[$i] = $row["IDProdotto"];
            $prezzo[$i] = $row["Prezzo"];
            $i=$i+1;
        }
    }

    for ($i = 0; $i < count($prodotti); $i++) {
        $sql = 'SELECT * FROM `prodotti` WHERE IDProdotto ="' . $prodotti[$i] . '"';
        $result = $GLOBALS['conn']->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

?>

                <div class="card">
                    <div class="img">
                        <img class="img_card" src="<?php echo 'http://spesaduezero.michelesottocasa.tech/images/'.$row['IDProdotto'].'.jpg' ?>" alt="">
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