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
<div id="nav">
    <nav role="navigation">
        <div id="menuToggle">

            <input type="checkbox"/>


            <span></span>
            <span></span>
            <span></span>


            <ul id="menu">
                <a id="chiSiamo.html">
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
        <div id="utente">Welcome <?php echo $_SESSION['username']; ?></div>

        <img id="logoImg" src="/assets/images/system/logo.png">
    </nav>
</div>

<div class="categorie">
    <div class="rowcategoria">
        <div id="carne" class="categoria">
            <A href="Carne.html">
                <img id="carneImg"
                     src="https://wips.plug.it/cips/paginegialle.it/magazine/cms/2022/03/carne-pregiata.jpg?w=744&h=418&a=c">
            </A>
            CARNE
        </div>

        <div id="pesce" class="categoria">
            <A href="Pesce.html">
                <img id="carneImg"
                     src="https://anticapescheriasassetti.it/wp-content/uploads/2019/07/trota-pesce-cucinare-Fotolia_87729709_Subscription_Monthly_M.jpg">
            </A>
            PESCE
        </div>

        <div id="frutta" class="categoria">
            <A href="Frutta.html">
                <img id="carneImg"
                     src="https://wips.plug.it/cips/buonissimo.org/cms/2013/04/frutta.jpg?w=713&a=c&h=407">
            </A>
            FRUTTA
        </div>
    </div>

    <div class="rowcategoria">

        <div id="verdura" class="categoria">
            <A href="Verdura.html">
                <img id="carneImg"
                     src="https://media-assets.lacucinaitaliana.it/photos/61fb16daf9bff304ce3ec60f/16:9/w_2560%2Cc_limit/2021-anno-fao-frutta-e-verdura.jpg">
            </A>
            VERDURA
        </div>

        <div id="bibite" class="categoria">
            <A href="Bibite.html">
                <img id="carneImg" src="https://www.cucinare.it/uploads/rubriche/2018/08/caloriebibite.jpg">
            </A>
            BIBITE
        </div>

        <div id="formaggi" class="categoria">
            <A href="Formaggi.html">
                <img id="carneImg" src="https://www.larioin.it/wp-content/uploads/2021/05/italia-formaggi-dop.jpg">
            </A>
            FORMAGGI
        </div>
    </div>
    <div class="rowcategoria">

        <div id="snack" class="categoria">
            <A href="Snack.html">
                <img id="carneImg" src="https://www.innaturale.com/wp-content/uploads/2018/12/definizione-snack.jpg">
            </A>
            SNACK
        </div>

        <div id="bio" class="categoria">
            <A href="Bio.html">
                <img id="carneImg" src="https://www.pampanorama.it/3d87cbe9c0715cddede2f22a49800161.jpg">
            </A>
            BIO
        </div>

        <div id="animali" class="categoria">
            <A href="Animali.html">
                <img id="carneImg"
                     src="https://ilfattoalimentare.it/wp-content/uploads/2019/03/alimenti-cani-gatti-mangime-croccantini-AdobeStock_188101331.jpeg">
            </A>
            ANIMALI
        </div>
    </div>
    <div class="rowcategoria">

        <div id="casa" class="categoria">
            <A href="Casa.html">
                <img id="carneImg"
                     src="https://www.igenial.it/wp-content/uploads/2019/09/i-detersivi-e-la-loro-scelta-per-non-inquinare.x29068.jpg">
            </A>
            CASA
        </div>

        <div id="salute" class="categoria">
            <A href="Salute.html">
                <img id="carneImg" src="http://www.gangcity.it/wp-content/uploads/2019/10/gangcity_800x381.jpg">
            </A>
            BENESSERE
        </div>

        <div id="pane" class="categoria">
            <A href="Pane.html">
                <img id="carneImg"
                     src="https://media-assets.lacucinaitaliana.it/photos/61fb09013783badc7380b11a/16:9/w_2560%2Cc_limit/pane.jpg">
            </A>
            PANE
        </div>
    </div>
    <div class="rowcategoria">

        <div id="surgelati" class="categoria">
            <A href="Surgelati.html">
                <img id="carneImg"
                     src="https://www.cecionifoodservice.it/wp-content/uploads/2019/09/alimenti-surgelati-800x480.jpg">
            </A>
            SURGELATI
        </div>

        <div id="infanzia" class="categoria">
            <A href="Infanzia.html">
                <img id="carneImg"
                     src="https://simpleglobal.com/wp-content/uploads/2021/03/baby-products-fulfillment-services-ecommerce-order-simpmle-global-1024x576.jpg">
            </A>
            INFANZIA
        </div>

        <div id="caffè" class="categoria">
            <A href="Caffè.html">
                <img id="carneImg" src="https://www.caffeaiello.it/wp-content/uploads/2021/04/chicchi-caffe.jpg">
            </A>
            CAFFE'
        </div>
    </div>
</div>


</body>
</html>