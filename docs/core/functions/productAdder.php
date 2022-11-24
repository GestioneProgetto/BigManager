<?php
include_once 'core/index.php';

$marca = $_POST['marca'];
$prodotto = $_POST['prodotto'];
$peso = $_POST['peso'];
$prezzo = $_POST['prezzo'];
$IDSupermarket = $_POST['supermarketID'];
$category = $_POST['categoria'];
echo $marca . ' ' . $prodotto . ' ' . $peso . ' ' . $prezzo . ' ' . $category . '<br><br>';

$status = $statusMsg = '';
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
        $result = $db->query("SELECT * FROM `prezzi-per-supermercato` WHERE IDProdotto='$prodotto' AND IDSupermercato='$IDSupermarket'");

        $product = mysqli_fetch_assoc($result);

        if ($product) {
            $_SESSION['query_result']="product_already_exist";
            header('Location: /supermarket?id=' . $IDSupermarket);
            die('product already exist');
        }

        $insert1 = $db->query("INSERT into prodotti (Nome, Marca,Peso, product_image, ID_Categoria) VALUES ('$prodotto','$marca','$peso','$imgContent', '$category');");

        $ID_Prodotto = mysqli_fetch_all($db->query("SELECT IDProdotto FROM `prodotti` WHERE Nome='$prodotto';"))[0][0];

        echo $ID_Prodotto . ' - ' . $IDSupermarket . ' v';

        $insert2 = $db->query("INSERT INTO `prezzi-per-supermercato` (`IDProdotto`, `IDSupermercato`, `Prezzo`) VALUES ('$ID_Prodotto','$IDSupermarket','$prezzo');");

        if ($insert1 && $insert2) {
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

// Display status message
echo $statusMsg;

header('Location: /supermarket?id=' . $IDSupermarket);
