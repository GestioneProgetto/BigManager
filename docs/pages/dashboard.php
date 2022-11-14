<?php
#include 'core/functions/supermarket.php';
include_once 'core/index.php';
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /login');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/style/user-products.css">
    <title>Dashboard | Spesa2.0</title>
</head>
<body>
<div class="session-actions" style="position: absolute">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php if (isset($_SESSION['username'])) : ?>
        <!--h1>Welcome on Dashboard!</h1>
        <h3>Logged as <?php echo $_SESSION['username']; ?></h3>
        <ul>
            <li><a href="/logged?logout=1">LogOut</a></li>
        </ul -->
    <?php endif ?>
</div>

<img id="logoImg" src="/assets/images/system/logo.png">

<!-- menù a tendina -->
<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox"/>
    <label class="menu__btn" for="menu__toggle">
        <span></span>
    </label>

    <ul class="menu__box">
        <li><p class="menu__item">Welcome <?php echo $_SESSION['username']; ?></p></li>
        <?php
        $supermarketIDs = getSupermarketIDs($_SESSION['username']);
        if (count($supermarketIDs) > 0) {
            foreach ($supermarketIDs as $currentID): ?>
                <li><a class="menu__item"
                       href="/supermarket?id=<?php echo $currentID; ?>" style="color: rgba(255,164,88,255)">
                        <?php echo getSupermarketNameFromID($currentID); ?>
                        di <?php echo getSupermarketCityFromID($currentID) ?>
                    </a></li>
            <?php endforeach;
        }

        ?>
        <li><a class="menu__item" href="/logged?logout=1">LogOut</a></li>
    </ul>
</div>

<div id="search">
    cerca prodotto
</div>

<div id="carne">
    <A href="Carne.html">
        <img id="carneImg"
             src="https://wips.plug.it/cips/paginegialle.it/magazine/cms/2022/03/carne-pregiata.jpg?w=744&h=418&a=c">
    </A>
    CARNE
</div>

<div id="pesce">
    <A href="Pesce.html">
        <img id="carneImg"
             src="https://anticapescheriasassetti.it/wp-content/uploads/2019/07/trota-pesce-cucinare-Fotolia_87729709_Subscription_Monthly_M.jpg">
    </A>
    PESCE
</div>

<div id="frutta">
    <A href="Frutta.html">
        <img id="carneImg" src="https://wips.plug.it/cips/buonissimo.org/cms/2013/04/frutta.jpg?w=713&a=c&h=407">
    </A>
    FRUTTA
</div>


<div id="verdura">
    <A href="Verdura.html">
        <img id="carneImg"
             src="https://media-assets.lacucinaitaliana.it/photos/61fb16daf9bff304ce3ec60f/16:9/w_2560%2Cc_limit/2021-anno-fao-frutta-e-verdura.jpg">
    </A>
    VERDURA
</div>

<div id="bibite">
    <A href="Bibite.html">
        <img id="carneImg" src="https://www.cucinare.it/uploads/rubriche/2018/08/caloriebibite.jpg">
    </A>
    BIBITE
</div>

<div id="formaggi">
    <A href="Formaggi.html">
        <img id="carneImg" src="https://www.larioin.it/wp-content/uploads/2021/05/italia-formaggi-dop.jpg">
    </A>
    FORMAGGI
</div>

<div id="snack">
    <A href="Snack.html">
        <img id="carneImg" src="https://www.innaturale.com/wp-content/uploads/2018/12/definizione-snack.jpg">
    </A>
    SNACK
</div>

<div id="bio">
    <A href="Bio.html">
        <img id="carneImg" src="https://www.pampanorama.it/3d87cbe9c0715cddede2f22a49800161.jpg">
    </A>
    BIO
</div>

<div id="animali">
    <A href="Animali.html">
        <img id="carneImg"
             src="https://ilfattoalimentare.it/wp-content/uploads/2019/03/alimenti-cani-gatti-mangime-croccantini-AdobeStock_188101331.jpeg">
    </A>
    ANIMALI
</div>

<div id="casa">
    <A href="Casa.html">
        <img id="carneImg"
             src="https://www.igenial.it/wp-content/uploads/2019/09/i-detersivi-e-la-loro-scelta-per-non-inquinare.x29068.jpg">
    </A>
    CASA
</div>

<div id="salute">
    <A href="Salute.html">
        <img id="carneImg" src="http://www.gangcity.it/wp-content/uploads/2019/10/gangcity_800x381.jpg">
    </A>
    BENESSERE
</div>

<div id="pane">
    <A href="Pane.html">
        <img id="carneImg"
             src="https://media-assets.lacucinaitaliana.it/photos/61fb09013783badc7380b11a/16:9/w_2560%2Cc_limit/pane.jpg">
    </A>
    PANE
</div>

<div id="surgelati">
    <A href="Surgelati.html">
        <img id="carneImg"
             src="https://www.cecionifoodservice.it/wp-content/uploads/2019/09/alimenti-surgelati-800x480.jpg">
    </A>
    SURGELATI
</div>

<div id="infanzia">
    <A href="Infanzia.html">
        <img id="carneImg"
             src="https://simpleglobal.com/wp-content/uploads/2021/03/baby-products-fulfillment-services-ecommerce-order-simpmle-global-1024x576.jpg">
    </A>
    INFANZIA
</div>

<div id="caffè">
    <A href="Caffè.html">
        <img id="carneImg" src="https://www.caffeaiello.it/wp-content/uploads/2021/04/chicchi-caffe.jpg">
    </A>
    CAFFE'
</div>
</body>
</html>