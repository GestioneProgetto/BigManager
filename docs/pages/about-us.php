<?php
include_once 'core/index.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/style/user-products.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Spesa Intelligente</title>
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
                <a href="/dashboard">
                    <li>HOME</li>
                </a>
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
    Cinque ragazzi, due professori della scuola superiore Jean Monnet e tanta voglia di fare, questo è bastato per
    creare un idea
    innovativa. <br>
    Partito come progetto scolastico, ci siamo impegnati a realizzare un servizio per semplificare la spesa con idee mai
    viste prima
    d'ora. <br>
    Per informazioni o aiuto non esitate a contattarci!
</div>

<div id="colombo">
    <img id="imgFoto"
         src="https://pps.whatsapp.net/v/t61.24694-24/307109942_6563781550315241_5397332720352015625_n.jpg?ccb=11-4&oh=01_AdST5JBuAIOwVKv5_Wcr3g9W2AOCFtD6lOLfMBY3DLhfgg&oe=6389D6B8">
    <div id="Dati">
        <h4> COGNOME: </h4> Colombo
        <h4> NOME: </h4> Federico
        <h4> ETA': </h4> 18
    </div>
</div>

<div id="sottocasa">
    <img id="imgFoto"
         src="https://pps.whatsapp.net/v/t61.24694-24/287078817_133886905980959_7680256668359850257_n.jpg?ccb=11-4&oh=01_AdTSrFrHBTdBxEO68dFj22t2j1mE5iTgVg7LeFckhgm6UQ&oe=6389D46D">
    <div id="Dati">
        <h4> COGNOME: </h4> Sottocasa
        <h4> NOME: </h4> Michele
        <h4> ETA': </h4> 18
    </div>
</div>

<div id="pugliano">
    <img id="imgFoto"
         src="https://pps.whatsapp.net/v/t61.24694-24/212612073_167664465909073_5000911054219941764_n.jpg?ccb=11-4&oh=01_AdR8Gjnt76YBolVsqiuoiAUfels090TfVAsAXL2oyipPuQ&oe=6389E00B">
    <div id="Dati">
        <h4> COGNOME: </h4> Pugliano
        <h4> NOME: </h4> Denis
        <h4> ETA': </h4> 19
    </div>
</div>

<div id="occhiato">
    <img id="imgFoto"
         src="https://pps.whatsapp.net/v/t61.24694-24/56153885_2256224534706093_3528036671243157504_n.jpg?ccb=11-4&oh=01_AdS2KpgLdv4LR6T-1XAWltx_YD7NJhdPc6GxY2pUIp898A&oe=6389D750">
    <div id="Dati">
        <h4> COGNOME: </h4> Occhiato
        <h4> NOME: </h4> Andrea
        <h4> ETA': </h4> 18
    </div>
</div>

<div id="berto">
    <img id="imgFoto"
         src="https://pps.whatsapp.net/v/t61.24694-24/302639480_504043614502125_7412133882651712349_n.jpg?ccb=11-4&oh=01_AdQwf7vJtS7zv4I43gQ6NgzHfUqON8csB5eYf7PU26CxVA&oe=6389BBE9">
    <div id="Dati">
        <h4> COGNOME: </h4> Berto
        <h4> NOME: </h4> Lorenzo
        <h4> ETA': </h4> 18
    </div>
</div>


<style>
    #chiSiamo {
        position: relative;
        color: red;
        left: -10px;
        width: 100px;
        height: 30px;
        margin: 30px auto;
        font-size: large;
        font-weight: bold;
    }

    #scritta {
        position: relative;
        left: 0px;
        width: 600px;
        height: 30px;
        margin: 30px auto;
        font-size: large;
        font-weight: bold;
    }

    #imgFoto {
        border-radius: 50px;
        position: relative;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
    }

    /*card colombo*/
    #colombo {
        width: 250px;
        height: 250px;
        position: relative;
        left: 5px;
        top: 150px;
        border-radius: 50px;
        border-color: black;
        border-style: solid;
    }

    #Dati {
        position: relative;
        left: 270px;
        top: -190px;
    }

    /*card sottocasa*/
    #sottocasa {
        width: 250px;
        height: 250px;
        position: absolute;
        left: 390px;
        top: 426px;
        border-radius: 50px;
        border-color: black;
        border-style: solid;
    }

    /*card pugliano*/
    #pugliano {
        width: 250px;
        height: 250px;
        position: absolute;
        left: 775px;
        top: 426px;
        border-radius: 50px;
        border-color: black;
        border-style: solid;
    }

    /*card occhiato*/
    #occhiato {
        width: 250px;
        height: 250px;
        position: absolute;
        left: 1160px;
        top: 426px;
        border-radius: 50px;
        border-color: black;
        border-style: solid;
    }

    /*card berto*/
    #berto {
        width: 250px;
        height: 250px;
        position: absolute;
        left: 1545px;
        top: 426px;
        border-radius: 50px;
        border-color: black;
        border-style: solid;
    }
</style>