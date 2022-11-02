<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <p id="username">cliente1</p>
    <?php
    include_once "db_funcion.php";



    $db_servername = "spesaduezero.michelesottocasa.tech";
    $db_username = "spesa2.0";
    $db_password = "Spesa2.0";
    $db_table = "spesa2.0";

    // Create connection
    $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_table);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

    <div class="prodotti">
        <?php
        $result = richiestaElementi($conn);
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