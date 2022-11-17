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

<?php include 'core/functions/richiestaCategorie.php' ?>
    <div class="categorie">
        <div class="rowcategoria">
            <?php
            echo richiestaCategorie();
            ?>
         </div>
    </div>


</body>
</html>