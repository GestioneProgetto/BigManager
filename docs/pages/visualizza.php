<?php
#include 'core/functions/supermarket.php';
include_once 'core/index.php';
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /login');
}

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
    <Style>
        #logoImg {
            width: 100px;
            position: absolute;
            right: 30px;
            top: 10px;
            z-index: -50;
        }


        .utente {
            width: 100px;
            height: 30px;
            margin: 30px auto;
            z-index: 500;
            font-size: large;
            font-weight: bold;
        }

        #carneImg {
            position: relative;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
        }

        #menuToggle {
            display: block;
            position: relative;
            top: 50px;
            left: 50px;

            z-index: 1;

            -webkit-user-select: none;
            user-select: none;
        }

        #menuToggle a {
            text-decoration: none;
            color: #232323;

            transition: color 0.3s ease;
        }

        #menuToggle a:hover {
            color: gray;
        }


        #menuToggle input {
            display: block;
            width: 40px;
            height: 32px;
            position: absolute;
            top: -7px;
            left: -5px;

            cursor: pointer;

            opacity: 0;
            /* hide this */
            z-index: 2;
            /* and place it over the hamburger */

            -webkit-touch-callout: none;
        }

        #menuToggle span {
            display: block;
            width: 33px;
            height: 4px;
            margin-bottom: 5px;
            position: relative;

            background: #000000;
            border-radius: 3px;

            z-index: 1;

            transform-origin: 4px 0px;

            transition: transform 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0),
                background 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0),
                opacity 0.55s ease;
        }

        #menuToggle span:first-child {
            transform-origin: 0% 0%;
        }

        #menuToggle span:nth-last-child(2) {
            transform-origin: 0% 100%;
        }

        #menuToggle input:checked~span {
            opacity: 1;
            transform: rotate(45deg) translate(-2px, -1px);
            background: #232323;
        }

        #menuToggle input:checked~span:nth-last-child(3) {
            opacity: 0;
            transform: rotate(0deg) scale(0.2, 0.2);
        }


        #menuToggle input:checked~span:nth-last-child(2) {
            transform: rotate(-45deg) translate(0, -1px);
        }

        #menu {
            position: absolute;
            width: 300px;
            margin: -100px 0 0 -50px;
            padding: 50px;
            padding-top: 125px;

            background: rgba(241, 120, 33, 0.792);
            list-style-type: none;
            -webkit-font-smoothing: antialiased;
            /* to stop flickering of text in safari */

            transform-origin: 0% 0%;
            transform: translate(-100%, 0);

            transition: transform 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0);
        }

        #menu li {
            padding: 10px 0;
            font-size: 22px;
        }

        #menuToggle input:checked~ul {
            transform: none;
        }

        nav {
            height: 125px;
            border-bottom: solid rgb(241, 120, 33) 3px;
        }



        .categoria {
            background-color: white;
            text-align: center;
            height: 100px;
            width: 150px;
            border: 3px solid black;
            margin: 15px;
        }

        .categorie {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .rowcategoria {
            display: flex;
            width: 60%;
            justify-content: space-around;
        }

        .prodotti {
            position: relative;
            top: 10px;
            display: flex;
            justify-content: center;
            margin: 0 auto;
            width: 100%;
        }

        .card {
            width: 250px;
            border-radius: 10%;
            border: 1px solid #aaaaaa;
            margin: 20px;
        }

        .card:hover {
            opacity: 0.8;
        }

        .name {
            font-size: 16px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1;
        }

        .brand {
            margin-top: 10px;
            font-size: 12px;
            text-transform: uppercase;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .img {
            width: 100%;
            text-align: center;
            margin-top: 5px;
            border-radius: 10%;
        }

        .name {
            font-weight: bold;
        }

        .descr {
            font-size: 12px;
            max-height: 35px;
            overflow: hidden;
        }


        span {
            margin-left: 15px;
        }

        .carello {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .img_carrello {
            width: 50px;
            height: 50px;
        }

        .img_carrello2 {
            width: 70px;
            height: 70px;
            margin: 10px;
        }

        .undernav {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cerca {
            height: 30px;
        }

        .prezzo {
            font-size: 15pt
        }

        .quantità {
            width: 30px;
            height: 20px;
            display: flex;
        }

        .text {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }


        .img_logo {
            width: 100px;
            position: absolute;
            right: 30px;
            top: 10px;
            z-index: -50;
        }

        #utente {
            width: 100px;
            height: 30px;
            margin: 30px auto;
            z-index: 500;
            font-size: large;
            font-weight: bold;
        }

        * {
            padding: 0;
            margin: 0;
        }

        .sfondo {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(128, 128, 128, 0.475);
            z-index: 800;
            display: none;
            overflow-y: hidden;
        }

        #popup {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            height: 80%;
            width: 30%;
            background-color: white;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .text {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .title {
            font-size: large;
        }

        .img_popup {
            height: 60%;
            margin: 20px;
        }

        .button {
            display: flex;
            justify-content: space-around;
        }


        .img_card {
            width: 150px;
            height: 200px;
            object-fit: contain;
        }
    </Style>
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
                <input type="button" class="cerca" value="cerca">
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