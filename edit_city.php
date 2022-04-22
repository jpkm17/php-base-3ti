<?php
include 'connect.php';
include 'checklogin.php';

$id = $_GET['idCity'];
$nameCity = $_GET['nameCity'];

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
    <h1>Editar Cidade</h1>
    <form method="POST">
        <label> Selecione a cidade: </label><br>
        <select name="city">
        <?php
        echo "<option value=$>$nameCity</option>";

        $sqlCity= mysqli_query($con, "select * from city");
                                    
        while($item = mysqli_fetch_assoc($sqlCity))
        {
            $nomeItem = utf8_encode($item['nameCity']);
            $idCity = $item['idCity'];
            echo "                                
                <option value=$idCity>$nomeItem</option>                                
            ";
        }
        ?>
        </select>
        <br>
        <br>
        <input type="text" name="newName" placeholder="Novo nome da cidade">
        <input type="submit" name="edit" value="Confirmar">
    </form>
</body>
</html>

<?php

if(isset($_POST['edit'])){
    $newCityName = $_POST['newName'];
    $i = "update city set nameCity = '$newCityName' where idCity='$id'";
    mysqli_query($con, $i);
    header('location: city.php');
}

?>