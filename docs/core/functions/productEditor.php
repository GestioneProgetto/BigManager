<?php
ini_set('display_errors', '1');
include_once 'core/index.php';
$marca = "";
$prodotto = "";
$category = "";
$peso = "";
$prezzo = "";
$IDSupermarket = $_POST['supermarketID'];
$IDProdotto = $_POST['productID'];
$priceEdit = "";
$dataToEdit = [];

if(isset($_POST['prodotto'])) {
    $prodotto = $_POST['prodotto'];
    array_push($dataToEdit, " Nome = '$prodotto' ");
}
if(isset($_POST['marca'])) {
    $marca = $_POST['marca'];
    array_push($dataToEdit, " Marca = '$marca' ");
}
if(isset($_POST['peso'])) {
    $peso = $_POST['peso'];
    array_push($dataToEdit, " Peso = '$peso' ");
}
if(isset($_POST['categoria'])) {
    $category = $_POST['categoria'];
    array_push($dataToEdit, " ID_Categoria = '$category' ");
}
if(isset($_POST['prezzo'])) {
    $prezzo = $_POST['prezzo'];
    $priceEdit = "UPDATE `prezzi-per-supermercato` SET Prezzo = '$prezzo' WHERE IDProdotto='$IDProdotto' AND IDSupermercato='$IDSupermarket'";
}

echo "<br>";
echo $marca . '-' . $prodotto . '-' . $peso . '-' . $prezzo . '-' . $category . ' | ' . $IDProdotto . '-' . $IDSupermarket . '<--<br><br>';
$result = $db->query("SELECT * FROM `prezzi-per-supermercato` WHERE IDProdotto='$IDProdotto' AND IDSupermercato='$IDSupermarket'");

$product = mysqli_fetch_assoc($result);

if($product) {
    echo var_dump($product) . '<-- query result2<br>';

    if(count($dataToEdit) !=0){
        $query = "UPDATE `prodotti` SET ";
        for ($i = 0; $i < count($dataToEdit); $i++){
            $query .= $dataToEdit[$i];
            if($i != count($dataToEdit)-1)
                $query .= ",";
        }
        $query .= " WHERE IDProdotto='$IDProdotto'";
        echo $query . "<br>";
        $insert1 = $db->query($query);
    }

    if($priceEdit != ""){
        echo $priceEdit . "<br>";
        $db->query($priceEdit);
    }

    $_SESSION['query_result']="done";
    header('Location: /supermarket?id=' . $IDSupermarket);
}else {
    $_SESSION['query_result']="product_not_exist";
    header('Location: /supermarket?id=' . $IDSupermarket . '&productID=' . $IDProdotto);
}