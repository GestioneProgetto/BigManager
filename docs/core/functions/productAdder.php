<?php
set_include_path("/spesa2.0/");
include_once 'core/index.php';

#$db = mysqli_connect(getenv('HOST'), getenv('USERNAME'), getenv('PASSWORD'), getenv('DB'));

//TODO implement add to db product
$marca = $_POST['marca'];
$prodotto = $_POST['prodotto'];
$peso = $_POST['peso'];
$prezzo = $_POST['prezzo'];
$IDSupermarket = $_POST['supermarketID'];
echo $marca . ' ' . $prodotto . ' ' . $peso . ' ' . $prezzo . '<br><br>';

$status = $statusMsg = '';
if (isset($_POST["submit"])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database

            $insert1 = $db->query("INSERT into prodotti (Nome, Marca,Peso, product_image) VALUES ('$prodotto','$marca','$peso','$imgContent');");

            $ID_Prodotto = $db->query("SELECT IDProdotto FROM `prodotti` WHERE Nome='$prodotto';");

            $insert2 = $db->query("INSERT into prezzi-per-supermercato (IDProdotto, IDSupermercato,Prezzo) VALUES ('$ID_Prodotto','$IDSupermarket','$prezzo');");

            //TODO fix Object of class mysqli_result could not be converted to string (line 35)

            /*$query = "INSERT into prodotti (Nome, Marca,Peso) VALUES ('$prodotto','$marca','$peso')";
            $insert = mysqli_query($GLOBALS['$db'], $query);*/

            if ($insert1) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            } else if ($insert1) {
                $statusMsg = "File upload failed, please try again.";
            } else {
                $statusMsg = "Product not added";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}

// Display status message
echo $statusMsg;



//TODO original page read urlParams and shou query result
