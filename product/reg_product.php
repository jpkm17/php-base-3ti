<?php
include '../connect.php';

if (isset($_POST['produto'])) {
    $nomeProduto = $_POST['nomeProduto'];
    $preçoProduto = $_POST['preçoProduto'];
    $idCategoria = $_POST['categoria'];
    $i = "insert into produto(fk_idCategoria, nomeProduto, preçoProduto) values('$idCategoria', '$nomeProduto', '$preçoProduto');";
    mysqli_query($con, $i);
    header('location:viewall_product.php');
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Nome Produto
                    <input type="text" name="nomeProduto">
                </td>
            </tr>
            <tr>
                <td>
                    Preço
                    <input type="number" name="preçoProduto">
                </td>
            </tr>
            <tr>
                <td>
                    Categoria
                    <select name="categoria">

                        <?php
                        echo '<option value="" disable> --Selecione --</option>';

                        $sqlCity = mysqli_query($con, "select * from categoria");

                        while ($item = mysqli_fetch_assoc($sqlCity)) {
                            $nomeItem = utf8_encode($item['nomeCategoria']);
                            $idCategoria = $item['idCategoria'];
                            echo "<option value=$idCategoria>$nomeItem</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="submit" name="produto">
                </td>
            </tr>
        </table>
</body>

</html>