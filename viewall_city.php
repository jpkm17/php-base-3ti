<?php
include 'connect.php';
?>

<a href="reg_city.php">Adicionar Cidade</a>
<table border='1'>
    <tr>
        <th>
            ID
        </th>
        <th>
           City
        </th>
        <th>
            Excluir
        </th>
    </tr>

<?php
$sq="select * from city";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $f['idCity']?>
        </td>
        <td>
            <?php echo $f['nameCity']?>
        </td>
        <td>
            <a href="delete_city.php">Remover</a>
        </td>
    </tr>
    <?php
}
?>