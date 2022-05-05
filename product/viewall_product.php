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
        <th>
        Remover
        </th>
        <th>
        Editar
        </th>
    </tr>

<?php
$sq="select * from produto as p inner join categoria as c on c.idCategoria = p.fk_idCategoria";
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
            <?php echo $f['preçoProduto']?>
        </td>
        
        <td>
            <?php echo $f['nomeCategoria'] ?>
        </td>
        <td>
            <a href="delete_product.php?id=<?php echo $f['idProduto'];?>">Remover</a>
        </td>
        <td>
            <a href="edit_product.php?id=<?php echo $f['idProduto']?>&nomeProduto=<?php echo $f['nomeProduto']?>&preço=<?php echo $f ['preçoProduto']?>&categoria= <?php echo $f ['nomeCategoria'] ?>"> Editar</a>
        </td>
    </tr>
    <?php
}
?>