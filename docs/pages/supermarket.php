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
        <img class="img_popup"
             src="https://www.carrefour.it/on/demandware.static/-/Sites-carrefour-master-catalog-IT/default/dwb19da38e/large/GOCCIOLEALCIOCCOLATOPAVESI-8013355999143-5.png">
        <div id="prodotto">
            <form>
                <label>marca:</label>
                <input type="text" id="marca"> <br>
                <label>prodotto:</label>
                <input type="text" id="prodotto"> <br>
                <label>peso:</label> <input type="text" id="peso"> <br>
                <label>prezzo:</label> <input type="text" id="prezzo"> <br>
            </form>
            <BR>
            <DIV class="button">
                <button id="close1"> CLOSE</button>
                <button id="add"> AGGIUNGI</button>
            </DIV>
        </div>
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

<script>
    const boxes = document.getElementsByName('change');
    boxes.forEach(box => {
        box.addEventListener('click', function handleClick(event) {

            console.log(event);
            let foto = event.path[3].children[0].lastChild.currentSrc;
            let marca = event.path[4].children[1].childNodes[1].innerText;
            let prodotto = event.path[4].children[1].children[2].innerText;
            let grammi = event.path[4].children[1].children[4].innerText;
            let prezzo = event.path[2].childNodes[0].textContent.trim();

            document.getElementById('marca').value = marca;
            document.getElementById('prodotto1').value = prodotto;
            document.getElementById('peso').value = grammi;
            document.getElementById('prezzo').value = prezzo;

            document.getElementById('sfondo').style.display = "inline";
        });
    });

    const boxes1 = document.getElementsByName('delate');
    boxes1.forEach(box1 => {
        box1.addEventListener('click', function handleClick(event) {
            alert('ciao');
        });
    });

    document.getElementById('aggiungi').addEventListener('click', function handleClick(event) {
        document.getElementById('sfondo1').style.display = "inline";
    });
</script>

<script>
    document.getElementById('close').addEventListener('click', function handleClick(event) {
        document.getElementById('sfondo').style.display = "none";
    });
    document.getElementById('close1').addEventListener('click', function handleClick(event) {
        document.getElementById('sfondo1').style.display = "none";
    });
</script>
</body>

</html>
