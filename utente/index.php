<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<link rel="stylesheet" href="css/style.css">
</head>

<body>
    <p id="username">cliente1</p>
    <?php
    include_once "db_funcion.php";
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
                $id = event.composedPath()[0].id;
                $quantita=event.composedPath()[1].firstElementChild.value;
                $username = document.getElementById('username').innerHTML;
                window.location.href = "aggiungi.php?ID=" + $id + "&USERNAME=" + $username+"&QUANTITA="+$quantita;
            });
        });
    </script>

</body>

</html>