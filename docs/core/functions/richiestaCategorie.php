<?php
include_once 'core/index.php';
function richiestaCategorie()
{
    $sql = "SELECT * FROM `categorie`";
    $result = $GLOBALS['db']->query($sql);
$i=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $i++;
?>

            <div id="<?php  echo $row['nome_categoria']?>" class="categoria">
                <A href=" <?php echo "/visualizza?categoria=".$row['nome_categoria']?> ">
                    <img id="carneImg" src="<?php echo $row['category_image']; ?>">
                </A>
                <?php  echo $row['nome_categoria']?>
            </div>

<?php
            if ($i % 3 == 0) {
                echo '</div> <div class="rowcategoria">';
            }
        }
    } else {
        echo "0 results";
    }
}
?>