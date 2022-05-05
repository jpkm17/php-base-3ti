<?php
include '../connect.php';
?>

<a href="reg_city.php"></a>
<table border='1'>
    <tr>
        <th>
        ID
        </th>
        <th>
        Nome
        </th>
        <th>
        Preço
        </th>
        <th>
        Categoria
        </th>
    </tr>

<?php
$sq="select * from produto";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $f['idProduto']?>
        </td>
        <td>
            <?php echo $f['nomeProduto']?>
        </td>
        <td>
            <a href="delete_product.php?id=<?php echo $f['idProduto'];?>">Remover</a>
        </td>

        <td>
            <?php echo $f['fk_idCategoria'] ?>
        </td>
        <td>
            <a href="edit_product.php?id=<?php echo $f['idProduto']?>&nomeProduto=<?php echo $f['nomeProduto'] ?>">Editar</a>
        </td>
    </tr>
    <?php
}
?>