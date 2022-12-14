<?php include 'core/functions/login-logout.php' ?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style/login-register.css">
    <title>Login - Spesa 2.0</title>
</head>

<body>
<div id="container">
    <img src="/assets/images/system/sfondo.jpg" alt="sfondo" class="sfondo">
    <div id="logo">
        <img src="/assets/images/system/logo.png" alt="logo" style="height:100%; width:100%;object-fit: fill;">
    </div>


    <div class="container" id="registrati_container">
        <p id="titolo_registrati">
            Registrati
        </p>

        <form method="post" action="/register">
            <?php include "core/functions/errors.php"; ?>

            <div class="aaa">
                <label>Username:</label>
                <input type="text" class="textbox" id="registrati_username" name="username"
                       value="<?php echo $username; ?>" required>
            </div>
            <div class="aaa">
                <label>Nome:</label>
                <input type="text" class="textbox" id="registrati_nome" name="name" required>
            </div>
            <div class="aaa">
                <label>Cognome:</label>
                <input type="text" class="textbox" id="registrati_cognome" name="surname" required>
            </div>
            <div class="aaa">
                <label>Data di nascita:</label>
                <input type="date" class="textbox" id="registrati_nascita" name="birthday">
            </div>
            <div class="aaa">
                <label>Città:</label>
                <input type="text" class="textbox" id="registrati_citta" name="city">
            </div>
            <div class="aaa">
                <label>Indirizzo:</label>
                <input type="text" class="textbox" id="registrati_indirizzo" name="address">
            </div>
            <div class="aaa">
                <label>Provincia:</label>
                <select class="textbox" id="registrati_provincie" name="province" required>
                    <option value=""></option>
                    <option value="AG">Agrigento</option>
                    <option value="AL">Alessandria</option>
                    <option value="AO">Aosta</option>
                    <option value="AR">Arezzo</option>
                    <option value="AP">Ascoli Piceno</option>
                    <option value="AT">Asti</option>
                    <option value="AV">Avellino</option>
                    <option value="BA">Bari</option>
                    <option value="BT">Barletta-Andria-Trani</option>
                    <option value="BL">Belluno</option>
                    <option value="BN">Benevento</option>
                    <option value="BG">Bergamo</option>
                    <option value="BI">Biella</option>
                    <option value="BO">Bologna</option>
                    <option value="BZ">Bolzano</option>
                    <option value="BS">Brescia</option>
                    <option value="BR">Brindisi</option>
                    <option value="CA">Cagliari</option>
                    <option value="CL">Caltanissetta</option>
                    <option value="CB">Campobasso</option>
                    <option value="CE">Caserta</option>
                    <option value="CT">Catania</option>
                    <option value="CZ">Catanzaro</option>
                    <option value="CH">Chieti</option>
                    <option value="CO">Como</option>
                    <option value="CS">Cosenza</option>
                    <option value="CR">Cremona</option>
                    <option value="AN">Ancona</option>
                    <option value="KR">Crotone</option>
                    <option value="CN">Cuneo</option>
                    <option value="EN">Enna</option>
                    <option value="FM">Fermo</option>
                    <option value="FE">Ferrara</option>
                    <option value="FI">Firenze</option>
                    <option value="FG">Foggia</option>
                    <option value="FC">Forl&igrave;-Cesena</option>
                    <option value="FR">Frosinone</option>
                    <option value="GE">Genova</option>
                    <option value="GO">Gorizia</option>
                    <option value="GR">Grosseto</option>
                    <option value="IM">Imperia</option>
                    <option value="IS">Isernia</option>
                    <option value="AQ">L'aquila</option>
                    <option value="SP">La spezia</option>
                    <option value="LT">Latina</option>
                    <option value="LE">Lecce</option>
                    <option value="LC">Lecco</option>
                    <option value="LI">Livorno</option>
                    <option value="LO">Lodi</option>
                    <option value="LU">Lucca</option>
                    <option value="MC">Macerata</option>
                    <option value="MN">Mantova</option>
                    <option value="MS">Massa-Carrara</option>
                    <option value="MT">Matera</option>
                    <option value="ME">Messina</option>
                    <option value="MI">Milano</option>
                    <option value="MO">Modena</option>
                    <option value="MB">Monza e Brianza</option>
                    <option value="NA">Napoli</option>
                    <option value="NO">Novara</option>
                    <option value="NU">Nuoro</option>
                    <option value="OR">Oristano</option>
                    <option value="PD">Padova</option>
                    <option value="PA">Palermo</option>
                    <option value="PR">Parma</option>
                    <option value="PV">Pavia</option>
                    <option value="PG">Perugia</option>
                    <option value="PU">Pesaro e Urbino</option>
                    <option value="PE">Pescara</option>
                    <option value="PC">Piacenza</option>
                    <option value="PI">Pisa</option>
                    <option value="PT">Pistoia</option>
                    <option value="PN">Pordenone</option>
                    <option value="PZ">Potenza</option>
                    <option value="PO">Prato</option>
                    <option value="RG">Ragusa</option>
                    <option value="RA">Ravenna</option>
                    <option value="RC">Reggio Calabria</option>
                    <option value="RE">Reggio Emilia</option>
                    <option value="RI">Rieti</option>
                    <option value="RN">Rimini</option>
                    <option value="RM">Roma</option>
                    <option value="RO">Rovigo</option>
                    <option value="SA">Salerno</option>
                    <option value="SS">Sassari</option>
                    <option value="SV">Savona</option>
                    <option value="SI">Siena</option>
                    <option value="SR">Siracusa</option>
                    <option value="SO">Sondrio</option>
                    <option value="SU">Sud Sardegna</option>
                    <option value="TA">Taranto</option>
                    <option value="TE">Teramo</option>
                    <option value="TR">Terni</option>
                    <option value="TO">Torino</option>
                    <option value="TP">Trapani</option>
                    <option value="TN">Trento</option>
                    <option value="TV">Treviso</option>
                    <option value="TS">Trieste</option>
                    <option value="UD">Udine</option>
                    <option value="VA">Varese</option>
                    <option value="VE">Venezia</option>
                    <option value="VB">Verbano-Cusio-Ossola</option>
                    <option value="VC">Vercelli</option>
                    <option value="VR">Verona</option>
                    <option value="VV">Vibo valentia</option>
                    <option value="VI">Vicenza</option>
                    <option value="VT">Viterbo</option>
                </select>
            </div>
            <div class="aaa">
                <label>Email: </label>
                <input type="text" class="textbox" id="registrati_email" name="email" value="<?php echo $email; ?>"
                       required>
            </div>
            <div class="aaa" id="password1_registrati">
                <label>Nuova password:</label>
                <input type="password" class="textbox" id="registrati_password1" name="password_1" required>
                <div class="mostrapass" id="mostrapassregistrati1">
                    <img src="/assets/images/system/occhio_nero.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_n_registrati1" hidden>
                    <img src="/assets/images/system/occhio_grigio.png" alt="mostra password"
                    <img src="img/occhio_grigio.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_g_registrati1">
                </div>
            </div>
            <div class="aaa" id="password2_registrati">
                <label>Ripeti la password:</label>
                <input type="password" class="textbox" id="registrati_password2" name="password_2" required>
                <div class="mostrapass" id="mostrapassregistrati2">
                    <img src="/assets/images/system/occhio_nero.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_n_registrati2" hidden>
                    <img src="/assets/images/system/occhio_grigio.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_g_registrati2">
                </div>
            </div>
            <div class="container_bottoni">
                <a href="/login" style="text-decoration-line: none;">
                    <div class="bottone" id="registrati_bottone">
                        Accedi
                    </div>

                </a>
                <div class="bottone" id="accedi_bottone">
                    Avanti
                    <button type="submit" class="submit" name="reg_user">
                    </button>
                </div>
            </div>
        </form>
    </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/assets/js/login.js"></script>
</body>

</html>