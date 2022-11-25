<?php
include_once 'core/index.php';
if(!isset($_GET['categoria'])){
    header("Location: http://spesaduezero.michelesottocasa.tech/dashboard");
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Spesa Intelligente</title>
    <link rel="stylesheet" href="/assets/style/visualizza.css">
</head>

<body>
    <div id="nav">
        <nav role="navigation">
            <div id="menuToggle">

                <input type="checkbox" />


                <span></span>
                <span></span>
                <span></span>


                <ul id="menu">
                <a href="/dashboard">
                    <li>HOME</li>
                </a>
                <a href="/about-us">
                    <li>CHI SIAMO</li>
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
            <div id="<?php echo $_SESSION['username']; ?>" class="utente">Welcome <?php echo $_SESSION['username']; ?></div>


            <img id="logoImg" src="/assets/images/system/logo.png">
        </nav>

    </div>

    <br>
    <div class="undernav">
        <A href="/carrello"> <img class="img_carrello2" src="http://spesaduezero.michelesottocasa.tech/assets/images/system/foto_carrello.png"> </A>
        <form>
            <p>
                <input type="text" class="cerca">
                <input type="button" class="cerca" value="Cerca">
            </p>
        </form>
    </div>

    <?php
    include_once "core/functions/visualizzazioneProdotti.php";
    ?>

<div class="prodotti">
    <?php
    $result = richiestaElementi();
    ?>
</div>


<script>
    const boxes = document.getElementsByName('carrello');
    boxes.forEach(box => {
        box.addEventListener('click', function handleClick(event) {
            $id = event.path[0].id;
            $quantita = event.path[1].children[0].value;
            $username = event.path[4].children[0].childNodes[1].childNodes[3].id;

            window.location.href = "/aggiungi?ID=" + $id + "&USERNAME=" + $username + "&QUANTITA=" + $quantita;
        });
    });
</script>



</body>

</html>