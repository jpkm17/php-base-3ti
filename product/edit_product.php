<?php
include '../connect.php';

$id = $_GET['id'];
$nomeProduto = $_GET['nomeProduto'];
$preço = $_GET['preço'];
$nomeCategoria = $_GET['categoria']

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Editar produto</h1>
    <form method="POST">
        <label> Selecione o produto: </label><br>
        <select name="produto">

            <?php
            echo "<option value=>--Selecione --</option>";


            $sqlCity = mysqli_query($con, "select * from produto");

            while ($item = mysqli_fetch_assoc($sqlCity)) {
                $nomeItem = utf8_encode($item['nomeProduto']);
                $idProduto = $item['idProduto'];
                echo "                                
                <option value=$idProduto>$nomeItem</option>                                
            ";
            }
            ?>
        </select>


        <select name="categoria">

            <?php
            echo "<option value=>--Selecione --</option>";

            $sqlCity = mysqli_query($con, "select * from categoria");

            while ($item = mysqli_fetch_assoc($sqlCity)) {
                $nomeItem = utf8_encode($item['nomeCategoria']);
                $idCategoria = $item['idCategoria'];
                echo "                                
                <option value=$idCategoria>$nomeItem</option>                               ";
            }
            ?>
        </select>

        <br>
        <br>
        <input type="text" name="newName" placeholder="Novo Produto">
        <input type='number' name="newPrice" placeholder="Novo preço">
        <input type="submit" name="edit" value="Confirmar">
    </form>
</body>

</html>

<?php

if (isset($_POST['edit'])) {
    $novoProduto = $_POST['newName'];
    $novoPreço = $_POST['newPrice'];
    $novoCategoria = $_POST['categoria'];
    $i = "update produto set nomeProduto = '$novoProduto', preçoProduto='$novoPreço', fk_idCategoria='$novoCategoria' where idProduto='$id'";
    mysqli_query($con, $i);
    header('location: viewall_product.php');
}

?>