<?php include 'core/functions/login-logout.php' ?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style/login.css">
    <title>Login - Spesa 2.0</title>
</head>

<body>
<div id="container">
    <img src="/assets/images/system/sfondo.jpg" alt="sfondo" class="sfondo">
    <div id="logo">
        <img src="/assets/images/system/logo.png" alt="logo" style="height:100%; width:100%;object-fit: fill;">
    </div>


    <div class="container" id="container_registrati">
        <p id="titolo_registrati">
            Registrati
        </p>

        <form method="post" action="/register">
            <?php include "core/functions/errors.php"; ?>
            <div id="email_registrati">
                <label>Email:</label>
                <input type="text" name="email" class="textbox" id="registrati_email" value="<?php echo $email; ?>">
            </div>
            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="password_registrati" id="password1_registrati">
                <label>
                    Nuova password:
                </label>
                <input type="password" class="textbox" id="registrati_password1" name="password_1">
                <div class="mostrapass" id="mostrapassregistrati1">
                    <img src="/assets/images/system/occhio_nero.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_n_registrati1" hidden>
                    <img src="/assets/images/system/occhio_grigio.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_g_registrati1">
                </div>
            </div>
            <div class="password_registrati" id="password2_registrati">
                <label>
                    Ripeti la password:
                </label>
                <input type="password" class="textbox" id="registrati_password2" name="password_2">
                <div class="mostrapass" id="mostrapassregistrati2">
                    <img src="/assets/images/system/occhio_nero.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_n_registrati2" hidden>
                    <img src="/assets/images/system/occhio_grigio.png" alt="mostra password"
                         style="height:100%; width:100%;object-fit: fill;" id="occhio_g_registrati2">
                </div>
            </div>
            <div class="container_bottoni">
                <div class="bottone" id="bottone_registrati">
                    <a href="/login">Accedi</a>
                </div>
                <div class="bottone" id="bottone_avanti">
                    <button type="submit" class="btn" name="reg_user">Avanti</button>
                </div>
            </div>
        </form>
    </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/assets/js/login.js"></script>
</body>

</html>