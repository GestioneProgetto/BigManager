<?php
include_once 'core/index.php';
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/style/user-products.css">
    <link rel="stylesheet" href="/assets/style/about-us.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Spesa Intelligente</title>
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
                $utente = $_SESSION['username'];
                echo 'Welcome ' . $utente;
                ?>
            </div>

            <img class="img_logo" id="logoImg" src="/assets/images/system/logo.png">
        </nav>
    </div>

    <div id="chiSiamo">
        CHI SIAMO
    </div>

    <div id="scritta">
        Cinque ragazzi, due professori della scuola superiore Jean Monnet
        e tanta voglia di fare, questo è bastato per creare un idea innovativa.
        Partito come progetto scolastico, ci siamo impegnati a realizzare un servizio
        per semplificare la spesa con idee mai viste prima d'ora. <br>
        Per informazioni o aiuto non esitate a contattarci!
    </div>
    <div class="grid">
        <div id="colombo" class="colori">
            <img class="imgFoto" src="https://pps.whatsapp.net/v/t61.24694-24/307109942_6563781550315241_5397332720352015625_n.jpg?ccb=11-4&oh=01_AdST5JBuAIOwVKv5_Wcr3g9W2AOCFtD6lOLfMBY3DLhfgg&oe=6389D6B8">
            <div class="Dati">
            <p> <h4> COGNOME: </h4> Colombo </p>
            <p>   <h4> NOME: </h4> Federico</p>
            <p>  <h4> ETA': </h4> 18<p>
            </div>
        </div>

        <div id="sottocasa" class="colori">
            <img class="imgFoto" src="https://pps.whatsapp.net/v/t61.24694-24/287078817_133886905980959_7680256668359850257_n.jpg?ccb=11-4&oh=01_AdTSrFrHBTdBxEO68dFj22t2j1mE5iTgVg7LeFckhgm6UQ&oe=6389D46D">
            <div class="Dati">
            <p> <h4> COGNOME: </h4> Sottocasa</p>
            <p> <h4> NOME: </h4> Michele</p>
            <p><h4> ETA': </h4> 18</p>
            </div>
        </div>

        <div id="pugliano" class="colori">
            <img class="imgFoto" src="https://pps.whatsapp.net/v/t61.24694-24/212612073_167664465909073_5000911054219941764_n.jpg?ccb=11-4&oh=01_AdR8Gjnt76YBolVsqiuoiAUfels090TfVAsAXL2oyipPuQ&oe=6389E00B">
            <div class="Dati">
                <p><h4> COGNOME: </h4> Pugliano</p>
                <p><h4> NOME: </h4> Denis</p>
                <p><h4> ETA': </h4> 19<p>
            </div>
        </div>
</div>
<div class="grid">
        <div id="occhiato" class="colori">
            <img class="imgFoto" src="https://pps.whatsapp.net/v/t61.24694-24/56153885_2256224534706093_3528036671243157504_n.jpg?ccb=11-4&oh=01_AdS2KpgLdv4LR6T-1XAWltx_YD7NJhdPc6GxY2pUIp898A&oe=6389D750">
            <div class="Dati">
            <p> <h4> COGNOME: </h4> Occhiato</p>
            <p> <h4> NOME: </h4> Andrea</p>
            <p> <h4> ETA': </h4> 18</p>
            </div>
        </div>

        <div id="berto" class="colori">
            <img class="imgFoto" src="https://pps.whatsapp.net/v/t61.24694-24/302639480_504043614502125_7412133882651712349_n.jpg?ccb=11-4&oh=01_AdQwf7vJtS7zv4I43gQ6NgzHfUqON8csB5eYf7PU26CxVA&oe=6389BBE9">
            <div class="Dati">
            <p>  <h4> COGNOME: </h4> Berto</p>
            <p>   <h4> NOME: </h4> Lorenzo</p>
            <p>   <h4> ETA': </h4> 18</p>
            </div>
        </div>

    </div>