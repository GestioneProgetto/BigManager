<?php
include_once 'core/index.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/assets/style/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<?php include "core/functions/db_funcions.php";
$utente = $_SESSION['username'];
?>
<div id="nav">
    <nav role="navigation">
        <div id="menuToggle">

            <input type="checkbox"/>


            <span></span>
            <span></span>
            <span></span>


            <ul id="menu">
                <a href="/dashboard">
                    <li>HOME</li>
                </a>
                <a id="aggiungi">
                    <li>AGGIUNGI</li>
                </a>
                <?php
                $supermarketIDs = getSupermarketIDs($_SESSION['username']);
                if (count($supermarketIDs) > 0) {
                    foreach ($supermarketIDs as $currentID): ?>
                        <li><b><a class="menu__item"
                                  href="/supermarket?id=<?php echo $currentID; ?>">
                                    <?php echo getSupermarketNameFromID($currentID); ?>
                                    di <?php echo getSupermarketCityFromID($currentID) ?>
                                </a></b></li>
                    <?php endforeach;
                }
                ?>
                <a href="/logged?logout=1">
                    <li>LOGOUT</li>
                </a>
            </ul>
        </div>

        <div id="utente">
            <?php
            echo 'Welcome ' . $utente;
            ?>
        </div>

        <img class="img_logo" src="/assets/images/system/logo.png">
    </nav>

</div>
<?php if (isset($_GET['productID'])): ?>
    <div id="sfondo" class="sfondo">
        <?php
        $IDSupermercato = $_GET['id'];
        $IDProdotto = $_GET['productID'];
        $product_data = mysqli_fetch_all($db->query("SELECT * FROM `prodotti` where IDProdotto = '$IDProdotto'"))[0];
        $price = mysqli_fetch_all($db->query("SELECT Prezzo FROM `prezzi-per-supermercato` where IDProdotto = '$IDProdotto' AND IDSupermercato = '$IDSupermercato'"))[0][0];
        ?>
        <div id="popup">
            <div class="text title">Modifica Prodotto</div>
            <img class="img_popup"
                 src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product_data[5]); ?>">
            <div id="prodotto">
                <form>
                    <label>marca:</label>
                    <input type="text" id="marca" value="<?php echo $product_data[2] ?>"> <br>
                    <label>prodotto:</label>
                    <input type="text" id="prodotto1" value="<?php echo $product_data[1] ?>"> <br>
                    <label>categoria:</label>
                    <select name="categoria" id="categoria" required>
                        <option value=""></option>
                        <?php
                        $categories = $db->query("SELECT * FROM categorie");
                        foreach (mysqli_fetch_all($categories) as $current_category) {
                            if ($current_category[0] == $product_data[4])
                                echo '<option selected value="' . $current_category[0] . '">' . $current_category[0] . '</option>';
                            else
                                echo '<option value="' . $current_category[0] . '">' . $current_category[0] . '</option>';
                        }
                        ?>
                    </select> <br>
                    <label>peso:</label>
                    <input type="number" id="peso" value="<?php echo $product_data[3] ?>"> <br>
                    <label>prezzo:</label>
                    <input type="number" step="0.01" id="prezzo" value="<?php echo $price ?>"> <br>
                </form>
                <BR>
                <DIV class="button">
                    <form action="" method="get">
                        <input type="text" name="id" value="<?php echo $IDSupermercato ?>" hidden>
                        <button id="close1"> CLOSE</button>
                    </form>
                    <form action="/core/functions/productEditor.php" method="get">
                        <input type="text" name="productID" value="<?php $IDProdotto ?>" hidden>
                        <input type="text" name="productID" value="<?php $IDProdotto ?>" hidden>
                        <button id="save"> SAVE</button>
                    </form>
                </DIV>
            </div>
            <div id="salva"></div>
        </div>
    </div>
<?php endif; ?>

<div id="sfondo1" class="sfondo">
    <div id="popup">
        <div class="text title">AGGIUNGI</div>
        <form action="/core/functions/productAdder.php" method="post" enctype="multipart/form-data">
            <label for="productImage">Immagine: </label>
            <input type="file" name="image" id="productImage" accept="image/*">
            <div id="prodotto">
                <label>marca:</label>
                <input type="text" id="marca" name="marca" required> <br>
                <label>prodotto:</label>
                <input type="text" id="prodotto" name="prodotto" required> <br>
                <label>categoria:</label>
                <select name="categoria" id="categoria" required>
                    <option value=""></option>
                    <?php
                    $categories = $db->query("SELECT * FROM categorie");
                    foreach (mysqli_fetch_all($categories) as $current_category) {
                        echo '<option value="' . $current_category[0] . '">' . $current_category[0] . '</option>';
                    }
                    ?>
                </select> <br>
                <label>peso:</label> <input type="number" id="peso" name="peso" required> <br>
                <label>prezzo:</label> <input type="number" step="0.01" id="prezzo" name="prezzo" required> <br>
                <input type="text" hidden name="supermarketID" value="<?php echo $_GET['id']; ?>">
                <br>
                <div class="button">
                    <button id="close1"> CLOSE</button>
                    <button id="add" type="submit" name="submit"> AGGIUNGI</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="prodotti" class="prodotti">
    <?php
    $result = richiesta($_GET['id']);
    ?>

</div>

<script src="/assets/js/supermarket-product.js"></script>
</body>

</html>
