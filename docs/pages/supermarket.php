<?php
#include 'core/functions/supermarket.php';
include_once 'core/index.php';
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /login');
}

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
            echo $utente;
            ?>
        </div>

        <img class="img_logo" src="/assets/images/system/logo.png">
    </nav>

</div>

<div id="sfondo" class="sfondo">
    <div id="popup">
        <div class="text title">Modifica Prodotto</div>
        <img class="img_popup"
             src="https://www.carrefour.it/on/demandware.static/-/Sites-carrefour-master-catalog-IT/default/dwb19da38e/large/GOCCIOLEALCIOCCOLATOPAVESI-8013355999143-5.png">
        <div id="prodotto">
            <form>
                <label>marca:</label>
                <input type="text" id="marca" value="ciao"> <br>
                <label>prodotto:</label>
                <input type="text" id="prodotto1"> <br>
                <label>peso:</label>
                <input type="text" id="peso"> <br>
                <label>prezzo:</label>
                <input type="text" id="prezzo"> <br>
            </form>
            <BR>
            <DIV class="button">
                <button id="close"> CLOSE</button>
                <button id="save"> SAVE</button>
            </DIV>
        </div>
        <div id="salva"></div>
    </div>
</div>

<div id="sfondo1" class="sfondo">
    <div id="popup">
        <div class="text title">AGGIUNGI</div>
        <form action="/core/functions/productAdder.php" method="post" enctype="multipart/form-data">
            <label for="productImage">Immagine: </label>
            <input type="file" name="image" id="productImage" accept="image/*">
            <div id="prodotto">
                <label>marca:</label>
                <input type="text" id="marca" name="marca"> <br>
                <label>prodotto:</label>
                <input type="text" id="prodotto" name="prodotto"> <br>
                <label>peso:</label> <input type="text" id="peso" name="peso"> <br>
                <label>prezzo:</label> <input type="text" id="prezzo" name="prezzo"> <br>
                <input type="text" hidden name="supermarketID" value="<?php $_GET['id']; ?>">
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

<!-- <div class="card">
    <div class="img"><img class="img" src="https://www.carrefour.it/on/demandware.static/-/Sites-carrefour-master-catalog-IT/default/dwb19da38e/large/GOCCIOLEALCIOCCOLATOPAVESI-8013355999143-5.png" alt=""></div>
    <div class="descrizione">
      <span class="brand text" id="marca">Pavesi</span> <br>
      <span class="name text" id="prodotto">GOCCIOLE</span><br>
      <span class="descr text" id="peso">500gr</span><br>
    </div>
    <div class="carello">
      <span class="prezzo text" id="prezzo">2.50€</span> <br>
      <div class="modifica">

        <button class="btn btn-primary" name="change">
          MODIFICA
        </button>
        <button class="btn btn-primary" name="delate">
          ELIMINA
        </button>
      </div>
    </div>
  </div> -->

<script src="/assets/js/supermarket-product.js"></script>
</body>

</html>
