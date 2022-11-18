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
    <div class="container" id="container_login">
        <p id="titolo_accedi">
            Accedi
        </p>
        <form method="post" action="/login">
            <?php include "core/functions/errors.php"; ?>
            <div class="aaa">
                <label>Username/Email:</label>
                <input type="text" class="textbox" id="accedi_email" name="username" required>
            </div>
            <div class="aaa">
                <label>Password:</label>
                <input type="password" class="textbox" id="accedi_password" name="password" required>
                <div class="mostrapass" id="mostrapassaccedi">
                    <img src="/assets/images/system/occhio_nero.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_n_accedi" hidden>
                    <img src="/assets/images/system/occhio_grigio.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_g_accedi">
                </div>
            </div>
            <div class="container_bottoni">
                <a href="/register" style="text-decoration-line: none;">
                    <div class="bottone" id="registrati_bottone">
                        Registrati
                    </div>
                </a>
                <div class="bottone" id="accedi_bottone">
                    Accedi
                    <button type="submit" class="submit" name="login_user">
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