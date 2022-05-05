<?php
include '../connect.php';

if(isset($_POST['produto'])){

    $fk_idCategoria=$_POST['idCategoria'];
    $i = "insert into produto(fk_idCategoria) values('$fk_idCategoria')";
    mysqli_query($con, $i);
}

if(isset($_POST['produto'])){

    $preçoProduto=$_POST['preçoProduto'];
    $i = "insert into produto(preçoProduto) values('$preçoProduto')";
    mysqli_query($con, $i);
}

if(isset($_POST['produto'])){

    $nomeProduto=$_POST['nomeProduto'];
    $i = "insert into produto(nomeProduto) values('$nomeProduto')";
    mysqli_query($con, $i);
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
                        Id Categoria
                        <input type="number" name="idCategoria" min='1' max='4'>
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